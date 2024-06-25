<?php

$routes = [

    '/' => 'MesaController@index',

    '/login' => 'LoginController@index',
    '/login/showFuncionario' => 'FuncionarioController@showFuncionario',
    
    # Rotas referentes ao funcionario
    '/cadastro' => 'FuncionarioController@index',
    
    # Rotas referentes à mesa
    '/mesa' => 'MesaController@index',
    '/mesa/detalhes' => 'MesaController@index',
    '/mesa/detalhes/{id}' => 'MesaController@loadViewInfoMesa',
    '/mesa/adicionar/{id}' => 'MesaController@loadViewAddProduto',
    '/mesa/finalizar/{id}' => 'MesaController@finalizarMesa',

    # Rotas referentes ao estoque
    '/estoque' => 'EstoqueController@index',
    '/estoque/incluir' => 'EstoqueController@loadEstoqueIncluir',
    '/estoque/editar/{id}' => 'EstoqueController@loadEstoqueEditar',
];