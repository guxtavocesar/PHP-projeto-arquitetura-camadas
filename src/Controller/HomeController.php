<?php

require_once(__DIR__."/../utils/RenderView.php");

use \Utils\RenderView;

class HomeController extends RenderView{

    public function index()
    {
        $this->renderView('home', [
            'title' => 'HomePage',
            'user' => 'Gustavo César'
        ]);
    }

    public function show($id)
    {
        echo "USER: $id[0]";
    }
}