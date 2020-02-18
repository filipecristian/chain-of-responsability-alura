<?php

namespace App;

interface IResposta
{
    public function responde(Requisicao $req, Conta $conta);
    public function setProxima(IResposta $resposta);
}