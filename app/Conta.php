<?php

namespace App;

class Conta
{
    private string $titular;
    private float $saldo;

    public function __construct(string $titular, float $saldo)
    {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    /**
     * @return string
     */
    public function getTitular(): string
    {
        return $this->titular;
    }

    /**
     * @return float
     */
    public function getSaldo(): float
    {
        return $this->saldo;
    }
}