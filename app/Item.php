<?php

namespace App;

/**
 * Class Item
 * @package App
 */
class Item
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var float
     */
    private float $price;

    /**
     * Item constructor.
     * @param $name
     * @param $price
     */
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice() : float
    {
        return $this->price;
    }
}