<?php

namespace Utils;

class RenderView{

    /*
     * Método renderizador de view
     * @param string $path Caminho pages dentro da View
     * @param string $view Nome da view para ser renderizada
     * @param array $args Array associativo com os argumentos que serão usados na view
     */
    public function renderView($path, $view, $args)
    {
        extract($args);

        require_once(ROOT."/src/View/pages/{$path}{$view}.php");
    }
}