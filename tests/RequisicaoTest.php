<?php

use App\Formato;
use App\Requisicao;
use App\Conta;
use App\SerializadorDeConta;
use PHPUnit\Framework\TestCase;

class RequisicaoTest extends TestCase
{
    public function testRequisicaoXML()
    {
        $requisicao = new Requisicao(Formato::$XML);
        $conta = new Conta('Filipe Cristian', 9000);

        $serializadorDeConta = new SerializadorDeConta();
        $result = $serializadorDeConta->serializarConta($requisicao, $conta);

        $exppected = '<conta><titular>Filipe Cristian</titular><saldo>9000</saldo></conta>';
        $this->assertEquals($exppected, $result);
    }

    public function testRequisicaoCSV()
    {
        $requisicao = new Requisicao(Formato::$CSV);
        $conta = new Conta('Filipe Cristian', 9000);

        $serializadorDeConta = new SerializadorDeConta();
        $result = $serializadorDeConta->serializarConta($requisicao, $conta);
        $exppected = 'Filipe Cristian;9000';
        $this->assertEquals($exppected, $result);
    }

    public function testRequisicaoPorCento()
    {
        $requisicao = new Requisicao(Formato::$PORCENTO);
        $conta = new Conta('Filipe Cristian', 9000);

        $serializadorDeConta = new SerializadorDeConta();
        $result = $serializadorDeConta->serializarConta($requisicao, $conta);
        $exppected = 'Filipe Cristian%9000';
        $this->assertEquals($exppected, $result);
    }
}