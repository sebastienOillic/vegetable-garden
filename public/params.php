<?php
require_once __DIR__.'/../templates/menu.php';
require_once __DIR__.'/../src/functions.php';
require_once __DIR__.'/../bootstrap.php';

use App\Entities\Vegetable;

$jsonValue = getIniJsonValues();
$tableTypes = $jsonValue->vegTypes;
?>
<br/>
<h2>Paramètrage de votre potager</h2>

<form class="table" action='treatingParams.php' method="POST">
    <table class="table">
        <tr>
            <th>Légume</th>
            <th>Surface allouée (m2)</th>
            <th>PH</th>
            <th>Type</th>
        </tr>
        <?php
        //fetch all vegs
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
            ->select('v')
            ->from('App\Entities\Vegetable', 'v')
            ->orderBy('v._name');
        $query = $queryBuilder->getQuery();
        $res = $query->getResult();
        // var_dump($res);
        //create a row for each veg fetched
        foreach ($res as $key => $veg) {
            $str = '<tr>';
            //name
            $str .= '<td>'.$veg->getName().'</td>';
            //surface
            $str .= '<td><input type="number" class="form-control" name="'.$veg->getId().'_surface" require_onced value=';
            $str .= $veg->getSurface();
            //PH
            $str .= '></td><td><input type="number" class="form-control" name="'.$veg->getId().'_PH" require_onced value=';
            $str .= $veg->getPH();
            //type select
            $str .= '></td></td><td><select class="form-control" name ='.$veg->getId().'_type >';
            foreach ($tableTypes as $type) {
                $str .= '<option value = "'.$type.'" ';
                $str .= ($type == $veg->getType() ? 'selected' : '');
                $str .= '>'.ucfirst($type).'</option>';
            }  
            $str .= '</select></td>';
            $str .= '</td></tr>';
            echo $str;
        }
        ?>
        <tr>
            <td colspan="4">
                <input type="submit" value="Sauvegarder le paramètrage" class="btn btn-primary">
            </td>
        </tr>
    </table>
</form>

<table class="table">
<form action="/public/addVeggie.php" method="post">
<tr><th>Légume</th>
<th>Surface</th>
<th>PH</th>
<th>Type</th>
</tr>
<tr><td><input type="text" name="name" class="form-control" require_onced></td>
<td><input type="number" name="surface" class="form-control" require_onced></td>
<td><input type="number" name="PH" class="form-control" require_onced></td>
<td>
<select name="type" class="form-control">
<option style="display:none"></option>
<?php 
foreach ($tableTypes as $type) {
    echo '<option value = "'.$type.'">'.ucfirst($type).'</option>';
}  
?>
</select>
</td>
</tr>
<td colspan="3">
<input type="submit" value="Ajouter un légume" class="btn btn-success">
</td>
</form>
</table>
</body>
</html>
