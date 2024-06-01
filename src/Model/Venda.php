<?php

namespace Model\Venda;

class Venda{

    private ?string $dataHora;
    private ?int $numeroMesa;
    private ?int $idFuncionario;
    private ?int $idCardapio;
    private ?int $quantidade;
    private ?float $valorTotal;

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

    public function getIdCardapio(){
        return $this->idCardapio;
    }

    public function setIdCardapio(int $idCardapio){
        $this->idCardapio = $idCardapio;
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
}