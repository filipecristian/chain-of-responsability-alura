<?php

namespace App;

interface IDesconto
{
    public function desconta(Orcamento $orcamento) : float;

    public function setProximo(IDesconto $desconto) : void;
}