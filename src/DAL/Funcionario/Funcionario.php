<?php

namespace DAL\Funcionario;

require_once(ROOT.'/src/DAL/Conexao/Conexao.php');
require_once(ROOT.'/src/Model/Funcionario/Funcionario.php');

class Funcionario {

    public function selectAll() {
        $sql = "SELECT * FROM funcionario";
        $con = \DAL\Conexao\Conexao::conectar();

        $result = $con->query($sql);
        $con = \DAL\Conexao\Conexao::desconectar();

        foreach ($result as $row) {
            
            $funcionario = new \Model\Funcionario\Funcionario();

            $funcionario->setId($row["IdFuncionario"]);
            $funcionario->setNome($row["Nome"]);
            $funcionario->setDataNascimento($row["Nascimento"]);
            $funcionario->setCpf($row["CPF"]);
            $funcionario->setSenha($row["Senha"]);
            $funcionario->setIdTipoFuncionario($row["IdTipoFuncionario"]);

            $listaFuncionarios[] = $funcionario;
        }

        return $listaFuncionarios;
    }

    public function insert(\MODEL\Funcionario\Funcionario $funcionario) {

        $senha = md5($funcionario->getSenha());

        $sql = "INSERT INTO funcionario (Nome, Nascimento, CPF, senha, IdTipoFuncionario)
                VALUES(
                '{$funcionario->getNome()}',
                '{$funcionario->getDataNascimento()}',
                '{$funcionario->getCpf()}',
                '{$senha}',
                '{$funcionario->getIdTipoFuncionario()}'
                )
                
                ";

        $con = \DAL\Conexao\Conexao::conectar();
        
        $con->query($sql);

        $con = \DAL\Conexao\Conexao::desconectar();
    }
}