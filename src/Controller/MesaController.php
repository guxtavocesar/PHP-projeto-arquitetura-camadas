<?php

namespace Controller;

require_once(__DIR__."/../utils/RenderView.php");

use \Utils\RenderView;

class MesaController extends RenderView{

    public function index()
    {
        $this->renderView('mesa/', 'buscar_mesa', []);
    }

    public function loadViewInfoMesa($args){

        $params = [
            'numeroMesa' => $args[0]
        ];

        $this->renderView('mesa/', 'info_mesa', $params);
    }

    public function helloHttp()
    {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Hello PHP!!']);
    }
}