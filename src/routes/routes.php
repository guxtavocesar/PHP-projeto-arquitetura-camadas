<?php

$routes = [
    '/' => 'LoginController@index',
    '/login' => 'LoginController@index',
    '/user/{id}' => 'LoginController@show',
];