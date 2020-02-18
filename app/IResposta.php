<?php

namespace App;

interface IResposta
{
    public function responde(Requisicao $req, Conta $conta);
}