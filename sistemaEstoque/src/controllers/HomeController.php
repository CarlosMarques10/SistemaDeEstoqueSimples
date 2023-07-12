<?php
namespace src\controllers;

use \core\Controller;
use src\models\Login;
use src\models\Product;

class HomeController extends Controller {

    private $loggedUser;

    public function __construct(){

        $login = new Login();
        $this->loggedUser = $login->checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
        
    }

    public function index() {

        $p = new Product();

        $busca = '';
        $search = filter_input(INPUT_GET, 'search');

        if(!empty($search)){
            $busca = $search;
        }

        $produtos = $p->getProducts($busca);
        
        
        $this->render('home',[
            'loggedUser' => $this->loggedUser,
            'info' => $produtos
        ]);
    }


    public function addProduct(){

        $msg = '';
        if(!empty($_SESSION['msg'])){
           $msg = $_SESSION['msg'];
           $_SESSION['msg'] = '';
        }

        $this->render('adicionarProduto', ['msg' => $msg, 'loggedUser' => $this->loggedUser]);
    }


    public function addProductAction(){

        $produto = new Product();

        $cod = filter_input(INPUT_POST, 'cod');
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price');
        $quantity = filter_input(INPUT_POST, 'quantity');
        $min_quantity = filter_input(INPUT_POST, 'min_quantity');

        if($cod && $name && $price && $quantity && $min_quantity){
            
            if($produto->verifyCod($cod) === false){
                $produto->adicionarProduto($cod,$name,$price,$quantity,$min_quantity);
                $this->redirect('/');
            }else{
                $_SESSION['msg'] = 'Código inválido ou já cadastrado';
                $this->redirect('/addProduct');

            }
        }
    }


    public function edit($id){
        
        $data = array();
        $p = new Product();

        $data['info'] = $p->getProduct($id);
        

        $this->render('editar', $data);
    }


    public function editAction($id){

        $p = new Product();

        $cod = filter_input(INPUT_POST, 'cod');
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price');
        $quantity = filter_input(INPUT_POST, 'quantity');
        $min_quantity = filter_input(INPUT_POST, 'min_quantity');

        if($cod){
            $p->editarProduto($cod,$name,$price,$quantity,$min_quantity,$id);
            $this->redirect('/');
        }

    }


}