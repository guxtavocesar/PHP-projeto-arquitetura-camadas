<?php

namespace DAL;

require_once(ROOT.'/src/DAL/Conexao/Conexao.php');
require_once(ROOT.'/src/MODEL/Fornecedor.php');

class Fornecedor{

    public function selectAll()
    {
        $sql = 'SELECT * FROM fornecedor';
        $con = \DAL\Conexao\Conexao::conectar();

        $result = $con->query($sql);
        $con = \DAL\Conexao\Conexao::desconectar();

        foreach($result as $row){

            $fornecedor = new \MODEL\Fornecedor();
            
            $fornecedor->setId($row['IdFornecedor']);
            $fornecedor->setNome($row['Nome']);

            $listaFornecedor[] = $fornecedor;
        }

        return $listaFornecedor;
    }
}