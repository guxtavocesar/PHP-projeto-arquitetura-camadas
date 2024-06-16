<?php

namespace Controller;

require_once(__DIR__."/../utils/RenderView.php");

use \Utils\RenderView;

class LoginController extends RenderView {

    public function index($args)
    {
        $this->renderView('login/', 'login', [
            'title' => 'HomePage',
            'user' => 'Gustavo César'
        ]);
    }
}