<?php
require_once __DIR__.'/../bootstrap.php';
require_once __DIR__.'/../src/functions.php';

Use App\Entities\Vegetable;

$jsonValues = getIniJsonValues();
// var_dump($jsonValues);
// var_dump($_POST);
if (!empty($_POST)) {

    foreach ($_POST as $key => $value) {
        $qb = $em->createQueryBuilder();
        $split = explode('_', $key);
        // var_dump($split);
        // $_SESSION['params'][$split[0]][$split[1]] = $value;
        $qb
            ->select('v')
            ->from('App\Entities\Vegetable', 'v')
            ->where('v._id = ?1')
            ->setParameter(1, (int)$split[0]);
        $query = $qb->getQuery();
        $res = $query->getResult();
        if ($res != null) {
            $functionName = 'set';
            switch ($split[1]){
            case 'surface':
                $valid = (is_numeric($value) && (int)$value > 0 ? (int)$value : false);
                $functionName .= 'Surface';
                break;
            case 'PH':
                $valid = (is_numeric($value) && (int)$value >= 0 && $value <= 14 ? (int)$value : false);
                $functionName .= 'PH';
                break;
            case 'type':
                // var_dump($value);
                $valid = (array_search($value, $jsonValues->vegTypes)  !== false)? $value : false;
                // var_dump($valid);
                $functionName .= 'Type';
                break;
            }

            if ($valid != false) {
                $res[0]->$functionName($value);
            }
            $em->persist($res[0]);
            $em->flush();
        }
        // var_dump($res);
    }
}
header("Location:/public/params.php");
die();