<?php

namespace BLL;

require_once(ROOT.'/src/Model/Ingrediente.php');
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

    public function selectBy($id)
    {
        $dalIngrediente = new \DAL\Ingrediente();
        return $dalIngrediente->selectBy($id);
    }

    public function update(\MODEL\Ingrediente $ingrediente)
    {
        $dalIngrediente = new \DAL\Ingrediente();
        return $dalIngrediente->update($ingrediente);
    }

    public function deleteBy($id)
    {
        $dalIngrediente = new \DAL\Ingrediente();
        $dalIngrediente->deleteBy($id);
    }    
}