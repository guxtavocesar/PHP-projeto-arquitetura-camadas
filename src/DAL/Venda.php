<?php

namespace DAL;

require_once(ROOT.'/src/Model/Venda.php');

require_once(ROOT.'/src/DAL/Conexao/Conexao.php');
require_once(ROOT.'/src/DAL/Produto.php');

class Venda{

    public function getVendaById($idMesa)
    {
        $sql = 'SELECT a.*, b.Descricao, b.ValorVenda
                FROM venda AS a
                LEFT JOIN produto AS b ON b.IdProduto = a.IdProduto
                WHERE (a.NumeroMesa = ?)
                AND   (Status = "ABE")';
        
        $con = \DAL\Conexao\Conexao::conectar();

        $query = $con->prepare($sql);

        $query->execute(array($idMesa));
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        $con = \DAL\Conexao\Conexao::desconectar();

        if(!$result) return;

        foreach($result as $row){

            $venda = new \MODEL\Venda();

            $venda->setIdVenda($row['IdVenda']);
            $venda->setIdFuncionario($row['IdFuncionario']);
            $venda->setIdProduto($row['IdProduto']);
            $venda->setNumeroMesa($row['NumeroMesa']);
            $venda->setQuantidade($row['Quantidade']);
            $venda->setValorTotal($row['Quantidade'], $row['ValorVenda']);
            $venda->setStatus($row['Status']);
            
            $venda->produto->setDescricao($row['Descricao']);

            $listaVenda[] = $venda;
        }

        return $listaVenda;
    }

    public function insertVenda(\MODEL\Venda $venda)
    {
        $sql = "INSERT INTO venda (
                    IdFuncionario,
                    IdProduto,
                    NumeroMesa,
                    Quantidade,
                    ValorTotal,
                    Status
                )
                VALUES (
                    {$venda->getIdFuncionario()},
                    {$venda->getIdProduto()},
                    {$venda->getNumeroMesa()},
                    {$venda->getQuantidade()},
                    {$venda->getValorTotal()},
                    '{$venda->getStatus()}'
                )";

        $con = \DAL\Conexao\Conexao::conectar();

        $con->query($sql);

        // Dando baixa no estoque após o INSERT
        $dalProduto = new \DAL\Produto();
        $produto = $dalProduto->selectBy($venda->getIdProduto());

        $estoqueAtualizado = $produto->getEstoqueAtual() - $venda->getQuantidade();

        $sqlBaixa = "UPDATE produto SET EstoqueAtual = $estoqueAtualizado
                     WHERE IdProduto = {$venda->getIdProduto()}
                    ";

        $result = $con->query($sqlBaixa);

        $con = \DAL\Conexao\Conexao::desconectar();

        return $result;
    }

    public function getTotalVendasByMesa($idMesa)
    {
        $sql = 'SELECT ROUND(SUM(ValorTotal), 2) AS totalVenda FROM venda WHERE NumeroMesa = ? AND Status = "ABE"';

        $con = \DAL\Conexao\Conexao::conectar();

        $query = $con->prepare($sql);

        $query->execute(array($idMesa));

        $result = $query->fetch(\PDO::FETCH_ASSOC);
        return $result['totalVenda'];
    }

    public function finalizarVenda($idMesa)
    {
        $sql = 'UPDATE venda SET Status = "FEC" WHERE NumeroMesa = ? AND Status = "ABE"';

        $con = \DAL\Conexao\Conexao::conectar();

        $query = $con->prepare($sql);

        $result = $query->execute(array($idMesa));

        return $result;
    }
}