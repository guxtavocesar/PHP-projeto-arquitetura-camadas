<?php

namespace Model\Funcionario;

class Funcionario{

    private ?int $id;
    private ?string $nome;
    private ?string $dataNascimento;
    private ?string $cpf;
    private ?string $senha;
    private ?int $idTipoFuncionario;

    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    public function setDataNascimento(string $dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf(string $cpf){
        $this->cpf = $cpf;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha(string $senha){
        $this->senha = $senha;
    }

    public function getIdTipoFuncionario(){
        return $this->idTipoFuncionario;
    }

    public function setIdTipoFuncionario(int $idTipoFuncionario){
        $this->idTipoFuncionario = $idTipoFuncionario;
    }
}