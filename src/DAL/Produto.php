<?php

namespace DAL;

require_once(ROOT.'/src/Model/Produto.php');

class Produto{

    public function insert(\MODEl\Produto $produto)
    {
        $sql = "INSERT INTO produto(
                    Descricao,
                    Marca,
                    ValorCusto,
                    ValorVenda,
                    EstoqueAtual,
                    EstoqueMaximo,
                    IdFornecedor
                )
                VALUES(
                   '{$produto->getDescricao()}',
                   '{$produto->getMarca()}',
                   '{$produto->getValorCusto()}',
                   '{$produto->getValorVenda()}',
                   '{$produto->getEstoqueAtual()}',
                   '{$produto->getEstoqueMaximo()}',
                   '{$produto->getIdFornecedor()}'
                )
        
               ";

        $con = \DAL\Conexao\Conexao::conectar();

        $con->query($sql);

        $con = \DAL\Conexao\Conexao::desconectar();
    }

    public function selectAll()
    {
        $sql = 'SELECT a.*, b.Nome AS NomeFornecedor
                FROM produto AS a
                LEFT JOIN fornecedor AS b ON a.IdFornecedor = b.IdFornecedor';

        $con = \DAL\Conexao\Conexao::conectar();

        $result = $con->query($sql);
        $con = \DAL\Conexao\Conexao::desconectar();

        foreach($result as $row){

            $produto = new \MODEL\Produto();

            $produto->setId($row['IdProduto']);
            $produto->setMarca($row['Marca']);
            $produto->setDescricao($row['Descricao']);
            $produto->setFornecedor($row['NomeFornecedor']);
            $produto->setValorCusto($row['ValorCusto']);
            $produto->setValorVenda($row['ValorVenda']);
            $produto->setEstoqueAtual($row['EstoqueAtual']);
            $produto->setEstoqueMaximo($row['EstoqueMaximo']);

            $listaProduto[] = $produto;
        }

        return $listaProduto;
    }

    public function selectBy($id)
    {
        $sql = 'SELECT * FROM produto WHERE IdProduto = ?';

        $con = \DAL\Conexao\Conexao::conectar();
        $query = $con->prepare($sql);

        $query->execute(array($id));
        $result = $query->fetch(\PDO::FETCH_ASSOC);

        $con = \DAL\Conexao\Conexao::desconectar();

        $produto = new \MODEL\Produto();

        $produto->setId($result['IdProduto']);
        $produto->setDescricao($result['Descricao']);
        $produto->setMarca($result['Marca']);
        $produto->setValorCusto($result['ValorCusto']);
        $produto->setValorVenda($result['ValorVenda']);
        $produto->setEstoqueAtual($result['EstoqueAtual']);
        $produto->setEstoqueMaximo($result['EstoqueMaximo']);
        $produto->setIdFornecedor($result['IdFornecedor']);

        return $produto;
    }

    public function update(\MODEL\Produto $produto)
    {
        $sql = 'UPDATE produto 
                SET Descricao = ?, 
                    Marca = ?, 
                    ValorCusto = ?, 
                    ValorVenda = ?, 
                    EstoqueAtual = ?, 
                    EstoqueMaximo = ?, 
                    IdFornecedor = ?
                WHERE IdProduto = ?';

        $con = \DAL\Conexao\Conexao::conectar();
        
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $produto->getDescricao(), 
            $produto->getMarca(),
            $produto->getValorCusto(),
            $produto->getValorVenda(),
            $produto->getEstoqueAtual(),
            $produto->getEstoqueMaximo(),
            $produto->getIdFornecedor(),
            $produto->getId()
        ));

        $con = \DAL\Conexao\Conexao::desconectar();

        return $result;
    }
}