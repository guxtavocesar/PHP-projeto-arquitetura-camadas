<?php

namespace BLL;

require_once(ROOT.'/src/Model/Produto.php');
require_once(ROOT.'/src/DAL/Produto.php');

class Produto{

    public function insert(\MODEL\Produto $produto)
    {
        $dalProduto = new \DAL\Produto();
        $dalProduto->insert($produto);
    }

    public function selectAll()
    {
        $dalProduto = new \DAL\Produto();
        return $dalProduto->selectAll();
    }

    public function selectBy($id)
    {
        $dalProduto = new \DAL\Produto();
        return $dalProduto->selectBy($id);
    }

    public function update(\MODEL\Produto $produto)
    {
        $dalProduto = new \DAL\Produto();
        return $dalProduto->update($produto);
    }  
}