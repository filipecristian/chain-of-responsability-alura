<?php

namespace App;

class Requisicao
{
    private int $formato;

    public function __construct(int $formato) {
        $this->formato = $formato;
    }

    /**
     * @return int
     */
    public function getFormato() : string
    {
        return $this->formato;
    }

}