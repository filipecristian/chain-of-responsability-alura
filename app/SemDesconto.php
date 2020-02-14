<?php

namespace App;

class SemDesconto implements IDesconto
{

    public function desconta(Orcamento $orcamento): float
    {
        return 0.0;
    }

    public function setProximo(IDesconto $desconto): void
    {
    }
}