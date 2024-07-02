<?php

namespace Core\Core;

use Controller;

class Core
{
    public function run($routes)
    {
        // Definindo URL padrão para ROTAS
        $url = '/';

        // Recuperando ROTAS
        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        // Removendo '/' caso haja uma ROTA diferente da padrão
        ($url != '/') ? $url = rtrim($url, '/') : $url;   

        // Flag de controle para ROTAS
        $routerFound = false;

        // Percorrendo as ROTAS do sistema
        foreach($routes as $path => $controller){

            // Definindo REGEX para recuperar paramêtros da ROTA via {id}
            $pattern = '#^'.preg_replace('/{id}/', '([\w-]+)', $path).'$#';

            // Validando Match da ROTA, ou seja, ela é compativel com a ROTA atual do foreach
            if(preg_match($pattern, $url, $matches)){

                // Removendo do início dos parâmetros a URL da ROTA, permanecendo apenas os parâmetros {id}
                array_shift($matches);

                // ROTA encontrada
                $routerFound = true;

                // Com a ROTA encontrada, é recuperado o CONTROLLER e o MÉTODO correspondente à ela
                [$currentController, $action] = explode('@', $controller);

                // Requerindo CONTROLLER da ROTA
                require_once(ROOT."/src/Controller/$currentController.php");

                // Recuperando a CLASSE do CONTROLLER para uso no código
                $className = "\Controller\\" . $currentController;

                // Instanciando CONTROLLER da ROTA
                $newController = new $className();

                // Chamando MÉTODO do CONTROLLER da ROTA
                $newController->$action($matches);
            }
        }

        // Caso a ROTA não seja encontrada
        if(!$routerFound){

            // Requerindo CONTROLLER padrão de NOTFOUND
            require_once(ROOT."/src/Controller/NotFoundController.php");
            
            $controller = new \Controller\NotFoundController();
            $controller->index();
        }
    }
}