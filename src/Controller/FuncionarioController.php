<?php

namespace Controller;

require_once(__DIR__."/../utils/RenderView.php");

use \Utils\RenderView;

class FuncionarioController extends RenderView {

    public function index() {

        $this->renderView('login/','cadastro', []);
    }
}