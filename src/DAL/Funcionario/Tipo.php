<?php

namespace DAL\Funcionario;

require_once(ROOT.'/src/DAL/Conexao/Conexao.php');
require_once(ROOT.'/src/Model/Funcionario/Tipo.php');

class Tipo{

    public function selectAll()
    {
        $sql = "SELECT * FROM tipo_funcionario";

        $con = \DAL\Conexao\Conexao::conectar();

        $result = $con->query($sql);
        $con = \DAL\Conexao\Conexao::desconectar();

        foreach($result as $row) {
            
            $tipo = new \MODEL\Funcionario\Tipo();

            $tipo->setId($row["IdTipoFuncionario"]);
            $tipo->setDescricao($row["Descricao"]);

            $listaTipos[] = $tipo;
        }

        return $listaTipos;
    }
}