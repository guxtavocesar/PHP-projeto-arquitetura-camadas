<?php

namespace Controller;

require_once(__DIR__."/../utils/RenderView.php");

use \Utils\RenderView;

class CardapioController extends RenderView {

    public function index() {

        $this->renderView('cardapio/', 'cardapio',[]);
    }

    public function loadInfoCardapio($args) {

        $params = [
            'categoria' => $args[0]
        ];

        $this->renderView('cardapio/', 'cardapio_info', $params);
    }
}