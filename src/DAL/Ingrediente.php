<?php

namespace DAL;

require_once(ROOT.'/src/MODEL/Ingrediente.php');

class Ingrediente{

    public function insert(\MODEl\Ingrediente $ingrediente)
    {
        $sql = "INSERT INTO ingrediente(Descricao, Marca, ValorCusto, EstoqueAtual, EstoqueMaximo, IdFornecedor)
                VALUES(
                   '{$ingrediente->getDescricao()}',
                   '{$ingrediente->getMarca()}',
                   '{$ingrediente->getValorCusto()}',
                   '{$ingrediente->getEstoqueAtual()}',
                   '{$ingrediente->getEstoqueMaximo()}',
                   '{$ingrediente->getIdFornecedor()}'
                )
        
               ";

        $con = \DAL\Conexao\Conexao::conectar();

        $con->query($sql);

        $con = \DAL\Conexao\Conexao::desconectar();
    }

    public function selectAll()
    {
        $sql = 'SELECT a.*, b.Nome AS NomeFornecedor
                FROM ingrediente AS a
                LEFT JOIN fornecedor AS b ON a.IdFornecedor = b.IdFornecedor';

        $con = \DAL\Conexao\Conexao::conectar();

        $result = $con->query($sql);
        $con = \DAL\Conexao\Conexao::desconectar();

        foreach($result as $row){

            $ingrediente = new \MODEL\Ingrediente();

            $ingrediente->setId( $row['IdIngrediente']);
            $ingrediente->setDescricao($row['Descricao']);
            $ingrediente->setMarca($row['Marca']);
            $ingrediente->setValorCusto($row['ValorCusto']);
            $ingrediente->setEstoqueAtual($row['EstoqueAtual']);
            $ingrediente->setEstoqueMaximo($row['EstoqueMaximo']);
            $ingrediente->setFornecedor($row['NomeFornecedor']);

            $listaIngrediente[] = $ingrediente;
        }

        return $listaIngrediente;
    }
}