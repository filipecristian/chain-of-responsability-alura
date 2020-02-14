<?php


use PHPUnit\Framework\TestCase;
use App\Item;

class ItemTest extends TestCase
{
    public function testCreateItem()
    {
        $name = 'Blusa de Frio';
        $price = 250.49;

        $item = new Item($name, $price);
        $this->assertEquals($name, $item->getName());
        $this->assertEquals($price, $item->getPrice());
    }
}