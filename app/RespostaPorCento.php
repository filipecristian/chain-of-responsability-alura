<?php

namespace App;

class RespostaPorCento implements IResposta
{
    private IResposta $proximo;

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

    public function setProxima(IResposta $proximo)
    {
        $this->proximo = $proximo;
    }
}