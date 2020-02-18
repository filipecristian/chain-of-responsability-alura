<?php

namespace App;

class RespostaPorCento implements IResposta
{
    private IResposta $proximo;

    public function __construct(IResposta $proximo)
    {
        $this->proximo = $proximo;
    }

    public function responde(Requisicao $req, Conta $conta)
    {
        if ($req->getFormato() == Formato::$PORCENTO) {
            return sprintf(
                '%s%s%s',
                $conta->getTitular(),
                '%',
                $conta->getSaldo()
            );
        }
        return $this->proximo->responde($req, $conta);
    }
}