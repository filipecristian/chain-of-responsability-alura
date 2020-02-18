<?php

namespace App;

class RespostaXML implements IResposta
{
    private IResposta $proximo;

    public function responde(Requisicao $req, Conta $conta)
    {
        if ($req->getFormato() == Formato::$XML) {
            return sprintf(
                "<conta><titular>%s</titular><saldo>%s</saldo></conta>",
                $conta->getTitular(),
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