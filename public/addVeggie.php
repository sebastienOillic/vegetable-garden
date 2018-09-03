<?php
require_once __DIR__.'/../bootstrap.php';
require_once __DIR__.'/../src/functions.php';

use App\Entities\Vegetable;

// session_start();

$jsonValues = getIniJsonValues();
//check values format and presence
if ($_POST['name'] != NULL && $_POST['type'] != NULL && $_POST['surface'] != NULL && $_POST['PH'] != NULL && is_numeric($_POST['surface']) && is_numeric($_POST['PH'])) {
    //parsing values
    $vegName = trim($_POST['name']);
    $vegPH = (int)trim($_POST['PH']);
    $vegSurface = (int)trim($_POST['surface']);
    $vegType = array_search($_POST['type'], $jsonValues->vegTypes);

    //check input values validity
    if ($vegType !== false && $vegPH <= 14 && $vegPH >= 0 && $vegSurface > 0) {
        //Ask to register veg
        $em->persist(
            new Vegetable(
                $vegPH,
                $vegSurface,
                htmlentities($vegName),
                $jsonValues->vegTypes[$vegType]
            )
        );
    }
// die();
}
// execute the actions asked in the db.
$em->flush();
// var_dump($_SESSION['params'][$fruitName]);
// unset($_SESSION['params'][$fruitName]);
header('Location:/public/params.php');