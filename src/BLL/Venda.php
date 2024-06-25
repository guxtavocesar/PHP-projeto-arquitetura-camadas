<?php

namespace BLL;

require_once(ROOT.'/src/DAL/Venda.php');
require_once(ROOT.'/src/Model/Venda.php');

class Venda{
    public function getVendaById($idMesa)
    {
        $dalVenda = new \DAL\Venda();
        return $dalVenda->getVendaById($idMesa);
    }

    public function insertVenda(\MODEL\Venda $venda)
    {
        $dalVenda = new \DAL\Venda();
        $dalVenda->insertVenda($venda);
    }
    public function getTotalVendasByMesa($idMesa)
    {
        $dalVenda = new \DAL\Venda();
        return $dalVenda->getTotalVendasByMesa($idMesa);
    }

    public function finalizarVenda($idMesa)
    {
        $dalVenda = new \DAL\Venda();
        return $dalVenda->finalizarVenda($idMesa);
    }
}