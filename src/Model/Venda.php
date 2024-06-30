<?php

namespace Model;

require_once(ROOT.'/src/Model/Produto.php');

class Venda{

    private ?int $idVenda;
    private ?int $numeroMesa;
    private ?int $idFuncionario;
    private ?int $idProduto;
    private ?int $quantidade;
    private ?float $valorTotal;
    private ?string $status;

    public \MODEL\Produto $produto;

    public function __construct()
    {
        $this->produto = new \MODEL\Produto();
    }

    public function getIdVenda()
    {
        return $this->idVenda;
    }

    public function setIdVenda(int $idVenda)
    {
        $this->idVenda = $idVenda;
    }

    public function getNumeroMesa()
    {
        return $this->numeroMesa;
    }

    public function setNumeroMesa(int $numeroMesa)
    {
        $this->numeroMesa = $numeroMesa;
    }

    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    public function setIdFuncionario(int $idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;
    }

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function setIdProduto(int $idProduto)
    {
        $this->idProduto = $idProduto;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($quantidade, $valorProduto)
    {
        $this->valorTotal = ($quantidade * $valorProduto);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}