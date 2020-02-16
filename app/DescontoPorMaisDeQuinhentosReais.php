<?php

namespace App;

/**
 * Class DescontoPorMaisDeQuinhentosReais
 * @package App
 */
class DescontoPorMaisDeQuinhentosReais implements IDesconto
{
    /**
     * @var IDesconto
     */
    private IDesconto $proximo;

    /**
     * @param Orcamento $orcamento
     * @return float
     */
    public function desconta(Orcamento $orcamento) : float
    {
        if ($orcamento->getValue() > 500) {
            return $orcamento->getValue() * 0.07;
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