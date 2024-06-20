<?php

namespace Model;

class Venda{

    private ?string $dataHora;
    private ?int $numeroMesa;
    private ?int $idFuncionario;
    private ?int $idIngrediente;
    private ?int $quantidade;
    private ?float $valorTotal;
    private ?string $status;

    public function getDataHora(){
        return $this->dataHora;
    }

    public function setDataHora(string $dataHora){
        $this->dataHora = $dataHora;
    }

    public function getNumeroMesa(){
        return $this->numeroMesa;
    }

    public function setNumeroMesa(int $numeroMesa){
        $this->numeroMesa = $numeroMesa;
    }

    public function getIdFuncionario(){
        return $this->idFuncionario;
    }

    public function setIdFuncionario(int $idFuncionario){
        $this->idFuncionario = $idFuncionario;
    }

    public function getIdIngrediente(){
        return $this->idIngrediente;
    }

    public function setIdIngrediente(int $idIngrediente){
        $this->idIngrediente = $idIngrediente;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade){
        $this->quantidade = $quantidade;
    }

    public function getValorTotal(){
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal){
        $this->valorTotal = $valorTotal;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus(string $status){
        $this->status = $status;
    }
}