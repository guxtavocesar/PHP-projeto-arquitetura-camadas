<?php

namespace Model;

class Mesa{

    private ?int $numeroMesa;
    private ?string $descricao;

    public function getNumeroMesa(){
        return $this->numeroMesa;
    }

    public function setNumeroMesa(int $numeroMesa){
        $this->numeroMesa = $numeroMesa;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao(string $descricao){
        $this->descricao = $descricao;
    }
}