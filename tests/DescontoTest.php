<?php


use App\DescontoPorMaisDeQuinhentosReais;
use App\Desconto5Itens;
use App\Item;
use App\Orcamento;
use App\SemDesconto;
use PHPUnit\Framework\TestCase;

class DescontoTest extends TestCase
{
    public function testDesconto5Itens()
    {
        $orcamento = new Orcamento(3000);
        $orcamento->addItem(new Item('10kg de Areia', 500));
        $orcamento->addItem(new Item('10kg de Cimento', 500));
        $orcamento->addItem(new Item('10kg de Cimento', 500));
        $orcamento->addItem(new Item('10kg de Cimento', 500));
        $orcamento->addItem(new Item('10kg de Cimento', 500));
        $orcamento->addItem(new Item('10kg de Cimento', 500));

        $desconto5Itens = new Desconto5Itens();
        $desconto500Reias = new DescontoPorMaisDeQuinhentosReais();

        $desconto5Itens->setProximo($desconto500Reias);

        $desconto = $desconto5Itens->desconta($orcamento);

        $this->assertEquals(300.00, $desconto);
    }

    public function testDescontoPorMaisDeQuinhentosReais()
    {
        $orcamento = new Orcamento(600);
        $orcamento->addItem(new Item('15kg de Areia', 600));

        $desconto5Itens = new Desconto5Itens();
        $desconto500Reias = new DescontoPorMaisDeQuinhentosReais();

        $desconto5Itens->setProximo($desconto500Reias);

        $desconto = $desconto5Itens->desconta($orcamento);

        $this->assertEquals(42.00, $desconto);
    }

    public function testSemDesconto()
    {
        $orcamento = new Orcamento(25);
        $orcamento->addItem(new Item('Saco de Cimento', 25));

        $desconto5Itens = new Desconto5Itens();
        $desconto500Reias = new DescontoPorMaisDeQuinhentosReais();
        $semDesconto = new SemDesconto();

        $desconto5Itens->setProximo($desconto500Reias);
        $desconto500Reias->setProximo($semDesconto);

        $desconto = $desconto5Itens->desconta($orcamento);

        $this->assertEquals(0.00, $desconto);
    }
}