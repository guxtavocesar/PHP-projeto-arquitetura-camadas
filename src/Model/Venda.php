<?php

namespace Model;

require_once(ROOT.'/src/MODEL/Ingrediente.php');

class Venda{

    private ?int $idVenda;
    private ?int $numeroMesa;
    private ?int $idFuncionario;
    private ?int $idIngrediente;
    private ?int $quantidade;
    private ?float $valorTotal;
    private ?string $status;

    public \MODEL\Ingrediente $ingrediente;

    public function __construct()
    {
        $this->ingrediente = new \MODEL\Ingrediente();
    }

    public function getIdVenda(){
        return $this->idVenda;
    }

    public function setIdVenda(int $idVenda){
        $this->idVenda = $idVenda;
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

    public function setValorTotal($quantidade, $valorProduto){
        $this->valorTotal = ($quantidade * $valorProduto);
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus(string $status){
        $this->status = $status;
    }
}