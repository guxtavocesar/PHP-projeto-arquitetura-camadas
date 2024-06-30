<?php

namespace Controller;

require_once(ROOT.'/src/utils/ValidaAcesso.php');
require_once(ROOT."/src/utils/RenderView.php");

require_once(ROOT."/src/BLL/Venda.php");
require_once(ROOT."/src/BLL/Mesa.php");
require_once(ROOT."/src/BLL/Produto.php");

require_once(ROOT."/src/Model/Venda.php");

use \Utils\RenderView;
use Utils\ValidaAcesso;

class MesaController extends RenderView{

    public function index()
    {
        $this->renderView('mesa/', 'buscar', []);
    }

    public function loadViewInfoMesa($args)
    {        
        $numeroMesa = $args[0];

        $bllMesa  = new \BLL\Mesa();
        $bllVenda = new \BLL\Venda();

        $params = [
            'mesa'   => $bllMesa->selectById($numeroMesa),
            'vendas' => $bllVenda->getVendaById($numeroMesa),
            'totalVendas' => $bllVenda->getTotalVendasByMesa($numeroMesa)
        ];

        $this->renderView('mesa/', 'detalhes', $params);
    }

    public function finalizarMesa($args)
    {
        $numeroMesa = $args[0];

        $bllVenda = new \BLL\Venda();

        if($bllVenda->finalizarVenda($numeroMesa)){

            echo json_encode(['status' => '200', 'message' => 'Mesa finalizada com sucesso!']);
            return;
        }

        echo json_encode(['status' => '500', 'message' => 'Não foi possível finalizar a mesa!']);
    }

    public function loadViewAddProduto($args)
    {
        session_start();

        ValidaAcesso::validarAcesso();

        $numeroMesa = $args[0];

        // Recuperando BLL referente ao produto
        $bllProduto = new \BLL\Produto();
        
        $bllVenda = new \BLL\Venda();
        $message = '';

        // Validando chamada via POST para adicionar VENDA à MESA
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $message = 'Produto adicionado com sucesso';

            $produto = $bllProduto->selectBy($_POST['txtProduto']);

            $venda = new \MODEL\Venda();

            $venda->setIdFuncionario($_SESSION['user']['IdFuncionario']);
            $venda->setNumeroMesa($numeroMesa);
            $venda->setIdProduto($_POST['txtProduto']);
            $venda->setQuantidade($_POST['txtQuantidade']);
            $venda->setValorTotal($_POST['txtQuantidade'], $produto->getValorVenda());

            // Definindo STATUS da VENDA como ABERTA em primeira instância
            $venda->setStatus('ABE');

            // Verificando se a quantidade é maior que o estoque atual
            if($venda->getQuantidade() <= $produto->getEstoqueAtual()){

                $bllVenda->insertVenda($venda);
            }
            else{
                $message = 'Não é possível adicionar quantidade maior que o estoque atual do produto';
            }           
        }

        $params = [
            'numeroMesa' => $numeroMesa,
            'produtos'   => $bllProduto->selectAll(),
            'vendas'     => $bllVenda->getVendaById($numeroMesa),
            'message'    => $message
        ];

        $this->renderView('mesa/', 'adicionar', $params);
    }
}