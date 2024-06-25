<?php

namespace DAL;

require_once(ROOT.'/src/Model/Mesa.php');
require_once(ROOT.'/src/DAL/Conexao/Conexao.php');

class Mesa{

    public function selectById($idMesa)
    {
        $sql = 'SELECT * FROM mesa WHERE IdMesa = ?';

        $con = \DAL\Conexao\Conexao::conectar();

        $query = $con->prepare($sql);

        $query->execute(array($idMesa));

        $result = $query->fetch(\PDO::FETCH_ASSOC);

        $con = \DAL\Conexao\Conexao::desconectar();

        if(!$result) return;

        $mesa = new \MODEL\Mesa();
        $mesa->setNumeroMesa($result['IdMesa']);
        $mesa->setDescricao($result['Descricao']);

        return $mesa;
    }

}