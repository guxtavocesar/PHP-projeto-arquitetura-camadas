<?php

namespace Controller;

require_once(__DIR__."/../utils/RenderView.php");
require_once(__DIR__."/../BLL/Fornecedor.php");
require_once(__DIR__."/../BLL/Ingrediente.php");

require_once(__DIR__."/../Model/Ingrediente.php");

use \Utils\RenderView;

class EstoqueController extends RenderView{

    public function index()
    {
        $bllIngrediente = new \BLL\Ingrediente();

        $params = array(
            'ingredientes' => $bllIngrediente->selectAll()
        );
        
        $this->renderView('estoque/', 'estoque', $params);
    }

    public function loadEstoqueIncluir()
    {
        $fornecedor = new \BLL\Fornecedor();

        $params = array(
            'fornecedores' => $fornecedor->selectAll()
        );

        $this->renderView('estoque/', 'estoque_incluir', $params);
    }

    public function loadEstoqueExcluir($args) 
    {
        $bllIngrediente = new \BLL\Ingrediente();

        $params = array(
            'codigo' => $bllIngrediente->selectBy($args[0])
        );

        $this->renderView('estoque/', 'estoque_excluir', $params);
    }

    public function loadEstoqueEditar($args)
    {

        $bllIngrediente = new \BLL\Ingrediente();

        $fornecedor = new \BLL\Fornecedor();

        $params = array(
            'ingrediente'  => $bllIngrediente->selectBy($args[0]),
            'fornecedores' => $fornecedor->selectAll()
        );

        $this->renderView('estoque/', 'estoque_editar', $params);
    }
}