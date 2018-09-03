<?php
require_once '../templates/menu.php';
require_once __DIR__.'/../bootstrap.php';
require_once __DIR__.'/../src/functions.php';

?>

<br />
<h2>Votre simulateur de jardinage</h2>

<table class="table">
    <tr>
        <th>Légume</th>
        <th>Au potager</th>
        <th>Récoltés</th>
    </tr>
<?php
$qb = $em->createQueryBuilder();
$qb->select('v')
    ->from('App\Entities\Vegetable', 'v')
    ->OrderBy('v._name');
$query = $qb->getQuery();
$res = $query->getResult();
$percent = 0;
// var_dump($res);
foreach ($res as $index => $veg) {
    $total = getTotalQuantityHarvested($veg, $em);
    if ($percent == 0) {
        $class = 'btn-success';
    } else {
        $class = 'btn-primary';
        if ($percent != 100) {
            $class .= ' disabled';
        }

    }
    ?>
    <tr>
        <td> <?= $veg->getName()?></td>
        <td>
        <?=$veg->getQuantity()?>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?=$percent?>" aria-valuenow="<?=$percent?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        <br/>
        <a class="btn pull-right <?=$class?>" href="treat.php?id=<?=$veg->getId()?>&mode=<?=$percent == 0  ? 'plant' : 'harvest'?>" role="button">
        <?=$percent == 0  ? 'Semer / Planter' : 'Récolter'?></a></td>
        </td>
        <td><?=$total?></td>
    </tr>
    <?php
}
?>
    <tr>
        <td>Carotte</td>
        <td>40
<div class="progress">
  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<br />
            <a class="btn btn-primary pull-right disabled" href="#" role="button">Récolter</a></td>
        <td>90</td>
    </tr>
    <tr>
        <td>Tomate</td>
        <td>10&nbsp;

<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<br />
<a class="btn btn-primary pull-right" href="#" >Récolter</a></td>
        <td>34</td>
    </tr>
    <tr>
        <td>Pomme de terre</td>
        <td>13&nbsp;

          <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
<br />
                <a class="btn btn-primary pull-right disabled" href="#">Récolter</a>
        </td>
        <td>40</td>
    </tr>
    <tr>
        <td>Epinard</td>
        <td>
            <a class="btn btn-success pull-right" href="#">Semer / Planter</a>
        </td>
        <td>40</td>
    </tr>
</table>

</body>
</html>
