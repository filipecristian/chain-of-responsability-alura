<?php

namespace App;

class Orcamento
{
    private float $value;
    private array $items;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(Item $item) : void
    {
        $this->items[] = $item;
    }

}