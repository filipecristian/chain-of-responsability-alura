<?php

namespace App;

class SerializadorDeConta
{
    public function serializarConta(Requisicao $requisicao, Conta $conta)
    {
        $semReposta = new SemResposta();
        $respostaPorCento = new RespostaPorCento($semReposta);
        $respostaCSV = new RespostaCSV($respostaPorCento);
        $respostaXML = new RespostaXML($respostaCSV);

        return $respostaXML->responde($requisicao, $conta);
    }
}