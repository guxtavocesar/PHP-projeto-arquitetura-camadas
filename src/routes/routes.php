<?php

$routes = [

    '/' => 'MesaController@index',

    '/login' => 'LoginController@index',
    
    # Rotas referentes à mesa
    '/mesa' => 'MesaController@index',
    '/mesa/detalhes' => 'MesaController@index',
    '/mesa/detalhes/{id}' => 'MesaController@loadViewInfoMesa',

    '/mesa/hello' => 'MesaController@helloHttp'
];