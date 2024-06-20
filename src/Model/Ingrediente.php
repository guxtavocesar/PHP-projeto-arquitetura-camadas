<?php

namespace Model;

class Ingrediente{

    private int $id;
    private ?string $descricao;
    private ?string $marca;
    private int $idFornecedor;
    private string $fornecedor;
    private ?float $valorCusto;
    private ?float $valorVenda;
    private ?int $estoqueAtual;
    private ?int $estoqueMaximo;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca(string $marca)
    {
        $this->marca = $marca;
    }

    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

    public function setIdFornecedor(int $idFornecedor)
    {
        $this->idFornecedor = $idFornecedor;
    }

    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    public function setFornecedor(string $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    public function getValorCusto()
    {
        return $this->valorCusto;
    }

    public function setValorVenda(int $valorVenda)
    {
        $this->valorVenda = $valorVenda;
    }

    public function getValorVenda()
    {
        return $this->valorVenda;
    }

    public function setValorCusto(int $valorCusto)
    {
        $this->valorCusto = $valorCusto;
    }

    public function getEstoqueAtual()
    {
        return $this->estoqueAtual;
    }

    public function setEstoqueAtual(int $estoqueAtual)
    {
        $this->estoqueAtual = $estoqueAtual;
    }

    public function getEstoqueMaximo()
    {
        return $this->estoqueMaximo;
    }

    public function setEstoqueMaximo(int $estoqueMaximo)
    {
        $this->estoqueMaximo = $estoqueMaximo;
    }
}