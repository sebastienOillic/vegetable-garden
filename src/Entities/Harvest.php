<?php

namespace App\Entities;
/**
 * @Entity
 * @Table(name="harvest")
 */
class Harvest
{
    /** 
     * @Id
     * @Column(name="id",type="integer") 
     * @GeneratedValue
     * */
    private $_id;
    /**
     * @ManyToOne(targetEntity="Vegetable")
     * @JoinColumn(name="vegetable_id",referencedColumnName="id")
     */
    private $_vegetable;
    /** @Column(name="harvest_date",type="datetime") */
    private $_harvestDate;
    /** @Column(name="quantity", type="integer") */
    private $_quantity;


    public function __construct(\DateTime $harvestDate, App\Entities\Vegetable $vegetable, int $quantity)
    {
        $this->_harvestDate = $harvestDate;
        $this->_vegetable = $vegetable;
        $this->_quantity = $quantity;
    }
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set harvestDate.
     *
     * @param \DateTime $harvestDate
     *
     * @return Harvest
     */
    public function setHarvestDate($harvestDate)
    {
        $this->_harvestDate = $harvestDate;

        return $this;
    }

    /**
     * Get harvestDate.
     *
     * @return \DateTime
     */
    public function getHarvestDate()
    {
        return $this->_harvestDate;
    }

    /**
     * Set quantity.
     *
     * @param int $quantity
     *
     * @return Harvest
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * Set vegetableId.
     *
     * @param \Vegetable|null $vegetableId
     *
     * @return Harvest
     */
    public function setVegetable(\Vegetable $vegetableId = null)
    {
        $this->_vegetable = $vegetableId;

        return $this;
    }

    /**
     * Get vegetableId.
     *
     * @return \Vegetable|null
     */
    public function getVegetable()
    {
        return $this->_vegetableId;
    }
}
