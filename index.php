<?php 

define('HOST', 'http://'.$_SERVER['HTTP_HOST'].'/hub/PHP-projeto-arquitetura-camadas');

define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/hub/PHP-projeto-arquitetura-camadas');


require_once(ROOT.'/src/routes/routes.php');
require_once(ROOT.'/src/Core/Core.php');

use Core\Core;

spl_autoload_register(function ($file){

    if(file_exists(ROOT."/utils/$file.php")){
        require_once(ROOT."/utils/$file.php");
    }
    else if(file_exists(ROOT."/models/$file.php")){
        require_once(ROOT."/models/$file.php");
    }
});

$core = new Core\Core();
$core->run($routes);

