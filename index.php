<?php 

// Definindo CONSTANTES de HOST e ROOT para facilitar manipulação de diretórios e links no código
define('HOST', 'http://'.$_SERVER['HTTP_HOST'].'/coffee-manager');
define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/coffee-manager');

require_once(ROOT.'/src/routes/routes.php');
require_once(ROOT.'/src/Core/Core.php');

use Core\Core;

$core = new Core\Core();
$core->run($routes);