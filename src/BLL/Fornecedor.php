<?php

namespace BLL;

require_once(ROOT.'/src/DAL/Fornecedor.php');

class Fornecedor{

    public function selectAll()
    {
        $dalFornecedor = new \DAL\Fornecedor();
        return $dalFornecedor->selectAll();
    }
}