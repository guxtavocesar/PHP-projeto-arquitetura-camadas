<?php

namespace BLL;

require_once(ROOT.'/src/MODEL/Ingrediente.php');
require_once(ROOT.'/src/DAL/Ingrediente.php');

class Ingrediente{

    public function insert(\MODEL\Ingrediente $ingrediente)
    {
        $dalIngrediente = new \DAL\Ingrediente();
        $dalIngrediente->insert($ingrediente);
    }

    public function selectAll()
    {
        $dalIngrediente = new \DAL\Ingrediente();
        return $dalIngrediente->selectAll();
    }
}