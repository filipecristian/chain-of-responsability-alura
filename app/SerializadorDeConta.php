<?php

namespace App;

class SerializadorDeConta
{
    public function serializarConta(Requisicao $requisicao, Conta $conta)
    {
        $respostaXML = new RespostaXML();
        $respostaCSV = new RespostaCSV();
        $respostaPorCento = new RespostaPorCento();
        $semReposta = new SemResposta();

        $respostaXML->setProxima($respostaCSV);
        $respostaCSV->setProxima($respostaPorCento);
        $respostaPorCento->setProxima($semReposta);

        return $respostaXML->responde($requisicao, $conta);
    }
}