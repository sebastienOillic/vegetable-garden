<?php

function getIniJsonValues() : Object
{
    $fileContents = file_get_contents(__DIR__.'/../ini.json');
    return json_decode($fileContents);
}

function getTotalQuantityHarvested(App\Entities\Vegetable $vegetable, Doctrine\ORM\EntityManager $em){
    $qb = $em->createQueryBuilder();
    $qb->select('MAX(h._quantity) AS total, v._id')
        ->from('App\Entities\Harvest', 'h')
        ->innerJoin("h._vegetable", 'v')
        ->where('v._id = ?1')
        ->groupBy('v._id')
        ->setParameter(1, $vegetable->getId());
    $query = $qb->getQuery();
    $res = $query->getResult();
    if (count($res) == 0) {
        return 0;
    }
    return $res[0]['total'];
}