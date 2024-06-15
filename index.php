<!DOCTYPE html>
<html lang="pt-br">

<?php 

define('HOST', 'http://'.$_SERVER['HTTP_HOST'].'/hub/PHP-projeto-arquitetura-camadas');

define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/hub/PHP-projeto-arquitetura-camadas');

include_once(__DIR__."/src/View/layout/head.php"); 

?>

<body>

<?php

    include_once(ROOT."/src/View/components/navbar.php");

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

?>

<!-- JS referente ao bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>