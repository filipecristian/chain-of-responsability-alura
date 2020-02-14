<?php


use App\Item;
use App\Orcamento;
use PHPUnit\Framework\TestCase;

class OrcamentoTest extends TestCase
{
    public function testCreateOrcamento()
    {
        $orcamento = new Orcamento(1000);
        $orcamento->addItem(new Item('10kg de Areia', 500));
        $orcamento->addItem(new Item('10kg de Cimento', 500));

        $this->assertEquals(2, count($orcamento->getItems()));
    }
}