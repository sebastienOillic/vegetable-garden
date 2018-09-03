<?php

namespace App\Entities;
/**
 * @Entity
 * @Table(name="vegetable")
 */
class Vegetable
{
    /** 
     * @Id
     * @Column(name="id",type="integer") 
     * @GeneratedValue
     * */
    private $_id;
    /** @Column(name="ph",type="integer") */
    private $_PH;
    /** @Column(name="surface",type="integer") */
    private $_surface;
    /** @Column(name="name",type="string",length=255) */
    private $_name;
    /** @Column(name="type",type="string",length=255) */
    private $_type;

    public function __construct($PH, $surface, $name, $type){
        $this->_type = $type;
        $this->_surface = $surface;
        $this->_name = $name;
        $this->_PH = $PH;
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
     * Get PH.
     *
     * @return int
     */
    public function getPH()
    {
            return $this->_PH;
    }
    /**
     * Set PH.
     *
     * @param int $PH
     * 
     * @return \Vegetable
     */
    public function setPH($PH)
    {
            $this->_PH = $PH;

            return $this;
    }
    /**
     * Get Surface.
     *
     * @return int
     */
    public function getSurface()
    {
            return $this->_surface;
    }
    /**
     * Set Surface.
     *
     * @param int $PH
     * 
     * @return \Vegetable
     */
    public function setSurface($surface)
    {
        $this->_surface = $surface;

        return $this;
    }
    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * Set name.
     *
     * @param string $name
     * 
     * @return \Vegetable
     */
    public function setName($name)
    {
        $this->_name = $name;

        return $this;
    }
    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * Set type.
     *
     * @param string $type
     * 
     * @return \Vegetable
     */
    public function setType($type)
    {
        $this->_type = $type;

        return $this;
    }


    /**
     * Return the number of vegetable one get per harvest 
     * based on the vegetable's PH, surface and type
     * 
     * @return int the quantity of vegetables given per harvest.
     */
    public function getQuantity() :int
    {
        switch ($this->_type) {
        case 'racine':
            if ($this->_PH < 4) {
                $multiplier = 20;
            } else if ($this->_PH <= 10) {
                $multiplier = 35;
            } else {
                $multiplier = 18;
            }
            break;
        case 'feuille':
            if ($this->_PH < 4) {
                $multiplier = 30;
            } else if ($this->_PH <= 11) {
                $multiplier = 55;
            } else {
                $multiplier = 28;
            }
            break;
        case 'fruit':
            if ($this->_PH < 5) {
                $multiplier = 10;
            } else if ($this->_PH <= 10) {
                $multiplier = 13;
            } else {
                $multiplier = 9;
            }
            break;
        }
        return $this->_surface * $multiplier;
    }
}
