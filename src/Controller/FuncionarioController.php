<?php

namespace Controller;

require_once(ROOT."/src/utils/RenderView.php");

use \Utils\RenderView;

class FuncionarioController extends RenderView {

    public function showFuncionario()
    {
        $this->renderView('funcionario/', 'detalhes', []);
    }
}