<?php

namespace BLL\Funcionario;

require_once(ROOT.'/src/DAL/Funcionario/Tipo.php');

class Tipo{

    public function selectAll()
    {
        $dalTipoFuncionario = new \DAL\Funcionario\Tipo();

        return $dalTipoFuncionario->selectAll();
    }
}