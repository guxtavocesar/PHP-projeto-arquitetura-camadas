<?php

namespace Controller;

require_once(ROOT."/src/utils/RenderView.php");

use \Utils\RenderView;

class FuncionarioController extends RenderView {

    public function showFuncionario()
    {
        // Validando chamada via POST para efetuar o LOGOUT do USUÁRO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if ($_POST['logout'] == "true") {
                
                session_destroy();
        
                header('location: ' .HOST);
            }
        }

        $this->renderView('funcionario/', 'detalhes', []);
    }
}