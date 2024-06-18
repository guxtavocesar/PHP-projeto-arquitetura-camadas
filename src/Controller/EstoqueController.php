<?php

namespace Controller;

require_once(__DIR__."/../utils/RenderView.php");
require_once(__DIR__."/../BLL/Fornecedor.php");
require_once(__DIR__."/../BLL/Ingrediente.php");

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
}