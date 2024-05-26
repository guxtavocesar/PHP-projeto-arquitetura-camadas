<?php

require_once(__DIR__.'/src/routes/routes.php');
require_once(__DIR__.'/src/CORE/Core.php');

use Core\Core;

spl_autoload_register(function ($file){

    if(file_exists(__DIR__."/utils/$file.php")){
        require_once(__DIR__."/utils/$file.php");
    }
    else if(file_exists(__DIR__."/models/$file.php")){
        require_once(__DIR__."/models/$file.php");
    }
});

$core = new Core\Core();
$core->run($routes);



