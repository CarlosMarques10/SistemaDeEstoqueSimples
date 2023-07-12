<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@logar');
$router->post('/login', 'LoginController@logarAction');
$router->get('/cadastro', 'LoginController@cadastro');
$router->post('/cadastro', 'LoginController@cadastroAction');
$router->get('/addProduct', 'HomeController@addProduct');
$router->post('/addProduct', 'HomeController@addProductAction');
$router->get('/edit/{id}', 'HomeController@edit');
$router->post('/edit/{id}', 'HomeController@editAction');
$router->get('/report', 'RelatorioController@index');
$router->get('/search', 'HomeController@index');
$router->get('/sair', 'LoginController@sair');