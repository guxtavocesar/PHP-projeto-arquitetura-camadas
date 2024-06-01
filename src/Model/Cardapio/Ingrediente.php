<?php

namespace Model\Cardapio;

class Ingrediente{

    private ?int $id;
    private ?int $idIngrediente;
    private ?int $qtdeIngrediente;

    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getIdIngrediente(){
        return $this->idIngrediente;
    }

    public function setIdIngrediente(int $idIngrediente){
        $this->idIngrediente = $idIngrediente;
    }

    public function getQtdeIngrediente(){
        return $this->qtdeIngrediente;
    }

    public function setQtdeIngrediente(int $qtdeIngrediente){
        $this->qtdeIngrediente = $qtdeIngrediente;
    }
}