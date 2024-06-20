<?php

namespace DAL;

require_once(ROOT.'/src/MODEL/Venda.php');

class Venda{

    public function getVendas(int $id)
    {
        $sql = 'SELECT * FROM venda WHERE NumeroMesa = ? AND Status = "ABE"';

        
    }
}