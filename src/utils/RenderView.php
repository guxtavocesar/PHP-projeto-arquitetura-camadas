<?php

namespace Utils;

class RenderView{

    /*
     * Método renderizador de view
     * @param string $view Nome da view para ser renderizada
     * @param array $args Array associativo com os argumentos que serão usados na view
     */
    public function renderView($view, $args)
    {
        extract($args);

        require_once(__DIR__."/../VIEW/Home/$view.php");
    }
}