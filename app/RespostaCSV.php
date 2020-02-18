<?php

namespace App;

class RespostaCSV implements IResposta
{
    private IResposta $proximo;

    public function __construct(IResposta $proximo)
    {
        $this->proximo = $proximo;
    }

    public function responde(Requisicao $req, Conta $conta)
    {
        if ($req->getFormato() == Formato::$CSV) {
            return sprintf(
                '%s;%s',
                $conta->getTitular(),
                $conta->getSaldo()
            );
        }
        return $this->proximo->responde($req, $conta);
    }
}