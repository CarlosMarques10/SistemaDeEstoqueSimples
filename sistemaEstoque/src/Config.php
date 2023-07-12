<?php
namespace src;

class Config {
    const BASE_DIR = '/sistemaEstoque/public';

    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost:3307';
    const DB_DATABASE = 'sistema_estoque';
    CONST DB_USER = 'root';
    const DB_PASS = '';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';
}