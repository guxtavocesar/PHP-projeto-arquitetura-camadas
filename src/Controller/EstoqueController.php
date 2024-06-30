<?php

namespace Controller;

require_once(ROOT."/src/utils/RenderView.php");

require_once(ROOT."/src/BLL/Fornecedor.php");
require_once(ROOT."/src/BLL/Produto.php");

require_once(ROOT."/src/Model/Produto.php");

use \Utils\RenderView;

class EstoqueController extends RenderView{

    public function index()
    {
        $bllProduto = new \BLL\Produto();

        $params = array(
            'produtos' => $bllProduto->selectAll()
        );
        
        $this->renderView('estoque/', 'listar', $params);
    }

    public function loadEstoqueIncluir()
    {
        $fornecedor = new \BLL\Fornecedor();

        $bllProduto = new \BLL\Produto();

        // Validando chamada via POST para efetuar INSERT do PRODUTO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $produto = new \MODEL\Produto();
        
            $produto->setDescricao($_POST['descricao']);
            $produto->setEstoqueAtual($_POST['quantidadeAtual']);
            $produto->setEstoqueMaximo($_POST['quantidadeMaxima']);
            $produto->setValorCusto(number_format($_POST['valorCusto'], 2));
            $produto->setValorVenda(number_format($_POST['valorVenda'], 2));
            $produto->setIdFornecedor($_POST['fornecedor']);
            $produto->setMarca($_POST['marca']);
        
            $bllProduto->insert($produto);
        }

        $params = array(
            'fornecedores' => $fornecedor->selectAll()
        );

        $this->renderView('estoque/', 'incluir', $params);
    }

    public function loadEstoqueEditar($args)
    {
        $bllProduto = new \BLL\Produto();

        $fornecedor = new \BLL\Fornecedor();

        // Validando chamada via POST para efetuar UPDATE do PRODUTO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $produto = new \MODEL\Produto();
        
            $produto->setId($_POST['idProduto']);
            $produto->setDescricao($_POST['descricao']);

            $produto->setEstoqueAtual($_POST['quantidadeAtual']);
            $produto->setEstoqueMaximo($_POST['quantidadeMaxima']);

            $produto->setValorCusto(number_format($_POST['valorCusto'], 2));
            $produto->setValorVenda(number_format($_POST['valorVenda'], 2));

            $produto->setMarca($_POST['marca']);
            $produto->setIdFornecedor($_POST['fornecedor']);
        
            $bllProduto->update($produto);
        }

        $params = array(
            'produto'  => $bllProduto->selectBy($args[0]),
            'fornecedores' => $fornecedor->selectAll()
        );

        $this->renderView('estoque/', 'editar', $params);
    }
}