<?php

namespace DAL;

require_once(ROOT.'/src/MODEL/Venda.php');
require_once(ROOT.'/src/DAL/Conexao/Conexao.php');
require_once(ROOT.'/src/DAL/Ingrediente.php');

class Venda{

    public function getVendaById($idMesa)
    {
        $sql = 'SELECT a.*,
                b.Descricao,
                b.ValorVenda
                FROM venda AS a
                LEFT JOIN ingrediente AS b ON b.IdIngrediente = a.IdIngrediente
                WHERE a.NumeroMesa = ?
                AND Status = "ABE"';
        
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
            $venda->setIdIngrediente($row['IdIngrediente']);
            $venda->setNumeroMesa($row['NumeroMesa']);
            $venda->setQuantidade($row['Quantidade']);
            $venda->setValorTotal($row['Quantidade'], $row['ValorVenda']);
            $venda->setStatus($row['Status']);
            
            $venda->ingrediente->setDescricao($row['Descricao']);

            $listaVenda[] = $venda;
        }

        return $listaVenda;
    }

    public function insertVenda(\MODEL\Venda $venda)
    {
        $sql = "INSERT INTO venda (
                    IdFuncionario,
                    IdIngrediente,
                    NumeroMesa,
                    Quantidade,
                    ValorTotal,
                    Status
                )
                VALUES (
                    {$venda->getIdFuncionario()},
                    {$venda->getIdIngrediente()},
                    {$venda->getNumeroMesa()},
                    {$venda->getQuantidade()},
                    {$venda->getValorTotal()},
                    '{$venda->getStatus()}'
                )";

        $con = \DAL\Conexao\Conexao::conectar();

        $con->query($sql);

        // Dando baixa no estoque após o INSERT
        $dalIngrediente = new \DAL\Ingrediente();
        $ingrediente = $dalIngrediente->selectBy($venda->getIdIngrediente());

        $estoqueAtualizado = $ingrediente->getEstoqueAtual() - $venda->getQuantidade();

        $sqlBaixa = "UPDATE ingrediente SET
                        EstoqueAtual = $estoqueAtualizado
                    WHERE IdIngrediente = {$venda->getIdIngrediente()}
                    ";

        $result = $con->query($sqlBaixa);

        $con = \DAL\Conexao\Conexao::desconectar();

        return $result;
    }

    public function getTotalVendasByMesa($idMesa){

        $sql = 'SELECT SUM(ValorTotal) AS totalVenda FROM venda WHERE NumeroMesa = ? AND Status = "ABE"';

        $con = \DAL\Conexao\Conexao::conectar();

        $query = $con->prepare($sql);

        $query->execute(array($idMesa));

        $result = $query->fetch(\PDO::FETCH_ASSOC);
        return $result['totalVenda'];
    }

    public function finalizarVenda($idMesa){

        $sql = 'UPDATE venda SET Status = "FEC" WHERE NumeroMesa = ? AND Status = "ABE"';

        $con = \DAL\Conexao\Conexao::conectar();

        $query = $con->prepare($sql);

        $result = $query->execute(array($idMesa));

        return $result;
    }
}