<?php

namespace Model\Cardapio;

class Cardapio{

    private ?int $id;
    private ?string $descricao;
    private ?float $valorCusto;
    private ?float $valorVenda;
    private ?int $idCategoria;

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
    
    public function getValorCusto(){
        return $this->valorCusto;
    }

    public function setValorCusto(float $valorCusto){
        $this->valorCusto = $valorCusto;
    }

    public function getValorVenda(){
        return $this->valorVenda;
    }

    public function setValorVenda(float $valorVenda){
        $this->valorVenda = $valorVenda;
    }

    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setIdCategoria(int $idCategoria){
        $this->idCategoria = $idCategoria;
    }
}