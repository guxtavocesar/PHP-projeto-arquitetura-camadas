<?php

$routes = [

    # Rota padrão
    '/' => 'MesaController@index',

    # Rotas referentes ao login e cadastro
    '/login' => 'LoginController@indexLogin',
    '/cadastro' => 'LoginController@indexCadastro',

    # Rotas referentes ao funcionário
    '/funcionario/detalhes' => 'FuncionarioController@showFuncionario',
    
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