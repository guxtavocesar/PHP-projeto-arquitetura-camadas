<?php

namespace DAL;

require_once(ROOT.'/src/MODEL/Ingrediente.php');

class Ingrediente{

    public function insert(\MODEl\Ingrediente $ingrediente)
    {
        $sql = "INSERT INTO ingrediente(Descricao, Marca, ValorCusto, ValorVenda, EstoqueAtual, EstoqueMaximo, IdFornecedor)
                VALUES(
                   '{$ingrediente->getDescricao()}',
                   '{$ingrediente->getMarca()}',
                   '{$ingrediente->getValorCusto()}',
                   '{$ingrediente->getValorVenda()}',
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

            $ingrediente->setId($row['IdIngrediente']);
            $ingrediente->setDescricao($row['Descricao']);
            $ingrediente->setMarca($row['Marca']);
            $ingrediente->setValorCusto($row['ValorCusto']);
            $ingrediente->setValorVenda($row['ValorVenda']);
            $ingrediente->setEstoqueAtual($row['EstoqueAtual']);
            $ingrediente->setEstoqueMaximo($row['EstoqueMaximo']);
            $ingrediente->setFornecedor($row['NomeFornecedor']);

            $listaIngrediente[] = $ingrediente;
        }

        return $listaIngrediente;
    }

    public function selectBy($id)
    {
        $sql = 'SELECT * FROM ingrediente WHERE IdIngrediente = ?';

        $con = \DAL\Conexao\Conexao::conectar();
        $query = $con->prepare($sql);

        $query->execute(array($id));
        $result = $query->fetch(\PDO::FETCH_ASSOC);

        $con = \DAL\Conexao\Conexao::desconectar();

        $ingrediente = new \MODEL\Ingrediente();

        $ingrediente->setId($result['IdIngrediente']);
        $ingrediente->setDescricao($result['Descricao']);
        $ingrediente->setMarca($result['Marca']);
        $ingrediente->setValorCusto($result['ValorCusto']);
        $ingrediente->setValorVenda($result['ValorVenda']);
        $ingrediente->setEstoqueAtual($result['EstoqueAtual']);
        $ingrediente->setEstoqueMaximo($result['EstoqueMaximo']);
        $ingrediente->setIdFornecedor($result['IdFornecedor']);

        return $ingrediente;
    }

    public function update(\MODEL\Ingrediente $ingrediente){

        $sql = 'UPDATE ingrediente 
                SET Descricao = ?, 
                    Marca = ?, 
                    ValorCusto = ?, 
                    ValorVenda = ?, 
                    EstoqueAtual = ?, 
                    EstoqueMaximo = ?, 
                    IdFornecedor = ?
                WHERE IdIngrediente = ?';

        $con = \DAL\Conexao\Conexao::conectar();
        
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $ingrediente->getDescricao(), 
            $ingrediente->getMarca(),
            $ingrediente->getValorCusto(),
            $ingrediente->getValorVenda(),
            $ingrediente->getEstoqueAtual(),
            $ingrediente->getEstoqueMaximo(),
            $ingrediente->getIdFornecedor(),
            $ingrediente->getId()
        ));

        $con = \DAL\Conexao\Conexao::desconectar();

        return $result;
    }
}