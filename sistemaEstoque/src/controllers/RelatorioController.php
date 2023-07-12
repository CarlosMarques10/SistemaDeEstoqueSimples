<?php
namespace src\controllers;

use \core\Controller;
use src\models\Login;
use src\models\Product;

class RelatorioController extends Controller {

    private $loggedUser;

    public function __construct(){

        $login = new Login();
        $this->loggedUser = $login->checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
        
    }

    public function index() {

        $data = array();
        $p = new Product();

        $data['list'] = $p->getLowQuantityProducts();
        $data['loggedUser'] = $this->loggedUser;

        $this->render('relatorio', $data);
    }

}