<?php

namespace Controller;

require_once(ROOT."/src/utils/RenderView.php");

use \Utils\RenderView;

class LoginController extends RenderView {

    public function indexLogin($args)
    {
        $this->renderView('login/', 'login', []);
    }

    public function indexCadastro()
    {
        $this->renderView('login/','cadastro', []);
    }
}