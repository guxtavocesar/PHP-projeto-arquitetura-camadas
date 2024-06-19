<?php

namespace BLL\Funcionario;

require_once(ROOT.'/src/DAL/Funcionario/Funcionario.php');

class Funcionario{

    public function selectAll()
    {
        $dalFuncionario = new \DAL\Funcionario\Funcionario;
        return $dalFuncionario->selectAll();
    }

    public function insert(\MODEL\Funcionario\Funcionario $funcionario)
    {
        $dalFuncionario = new \DAL\Funcionario\Funcionario;
        $dalFuncionario->insert($funcionario);
    }

}