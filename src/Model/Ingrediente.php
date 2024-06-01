<?php

namespace Model\Ingrediente;

class Ingrediente{

    private ?int $id;
    private ?string $descricao;
    private ?string $marca;
    private ?int $idFornecedor;
    private ?float $valorCusto;
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

    public function setMarca(int $marca)
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

    public function getValorCusto()
    {
        return $this->valorCusto;
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