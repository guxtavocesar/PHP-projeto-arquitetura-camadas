<?php

namespace Core\Core;

use Controller;

class Core
{
    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/') : $url;   

        $routerFound = false;

        foreach ($routes as $path => $controller){

            $pattern = '#^'.preg_replace('/{id}/', '([\w-]+)', $path).'$#';

            if(preg_match($pattern, $url, $matches)){

                array_shift($matches);

                $routerFound = true;

                [$currentController, $action] = explode('@', $controller);

                require_once(__DIR__."/../Controller/$currentController.php");

                $className = "\Controller\\" . $currentController;

                $newController = new $className();
                $newController->$action($matches);
            }
        }

        if(!$routerFound){

            require_once(__DIR__."/../Controller/NotFoundController.php");
            $controller = new \Controller\NotFoundController();
            $controller->index();
        }
    }
}