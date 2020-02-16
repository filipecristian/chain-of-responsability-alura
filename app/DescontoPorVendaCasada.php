<?php

namespace App;

class DescontoPorVendaCasada implements IDesconto
{
    private IDesconto $proximo;

    public function desconta(Orcamento $orcamento): float
    {
        if ($this->existe('LAPIS', $orcamento) ||
            $this->existe('CANETA' ,$orcamento)) {
            return $orcamento->getValue() * 0.05;
        }
        return $this->proximo->desconta($orcamento);
    }

    public function setProximo(IDesconto $proximo): void
    {
        $this->proximo = $proximo;
    }

    private function existe($nomeDoItem, Orcamento $orcamento): bool
    {
        foreach ($orcamento->getItems() as $item) {
            if (strtoupper($item->getName()) == strtoupper($nomeDoItem)) return true;
        }
        return false;
    }
}