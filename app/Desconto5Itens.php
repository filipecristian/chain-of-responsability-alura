<?php

namespace App;

/**
 * Class Desconto5Itens
 * @package App
 */
class Desconto5Itens implements IDesconto
{
    /**
     * @var IDesconto
     */
    private IDesconto $proximo;

    /**
     * @param Orcamento $orcamento
     * @return IDesconto|float
     */
    public function desconta(Orcamento $orcamento) : float
    {
        if (count($orcamento->getItems()) > 5) {
            return $orcamento->getValue() * 0.1;
        }
        return $this->proximo->desconta($orcamento);
    }

    /**
     * @param IDesconto $proximo
     */
    public function setProximo(IDesconto $proximo) : void
    {
        $this->proximo = $proximo;
    }
}