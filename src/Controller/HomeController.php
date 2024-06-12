<?php

namespace Controller;

require_once(__DIR__."/../utils/RenderView.php");

use \Utils\RenderView;

class HomeController extends RenderView{

    public function index()
    {
        $this->renderView('home/', 'home', []);
    }
}