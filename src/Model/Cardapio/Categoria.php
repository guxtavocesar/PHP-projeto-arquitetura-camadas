<?php

namespace Model\Cardapio;

class Categoria{

    private ?int $id;
    private ?string $descricao;

    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao(string $descricao){
        $this->descricao = $descricao;
    }
}