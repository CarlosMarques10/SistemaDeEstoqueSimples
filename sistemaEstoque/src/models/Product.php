<?php
namespace src\models;
use \core\Model;
use \core\Database;

class Product extends Model {

    private $cod;
    private $name;
    private $price;
    private $quantity;
    private $min_quantity;

    
    public function getCod()
    {
        return $this->cod;
    }

    public function setCod($cod)
    {
        $this->cod = $cod;

        return $this;
    }

  
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }


    public function getMin_quantity()
    {
        return $this->min_quantity;
    }

    public function setMin_quantity($min_quantity)
    {
        $this->min_quantity = $min_quantity;

        return $this;
    }

    

    public function verifyCod($cod){

        $p = Product::select()->where('cod', $cod)->execute();

        if(count($p) > 0){
            return true;
        }else{
            return false;
        }
    }


    public function adicionarProduto($cod,$name,$price,$quantity,$min_quantity){
        
        $p = Product::insert([
            'cod' => $cod,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'min_quantity' => $min_quantity
        ])->execute();
        
    }


    public function getProducts($busca = null){

        $data = array();
        $pdo = Database::getInstance();

        if(!empty($busca)){
            $sql = $pdo->prepare("SELECT * FROM products WHERE name LIKE :name OR cod = :cod");
            $sql->bindValue(':name', '%'.$busca.'%');
            $sql->bindValue(':cod', $busca);
            $sql->execute();
        }else{
            $sql = $pdo->query("SELECT * FROM products");
        }

        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
        }
        return $data; 
    }


    public function getProduct($id){
        
        $p = Product::select()->where('id', $id)->one();
        return $p;
    }

    public function editarProduto($cod,$name,$price,$quantity,$min_quantity,$id){

        $p = Product::update()
                ->set('cod', $cod)
                ->set('name', $name)
                ->set('price', $price)
                ->set('quantity', $quantity)
                ->set('min_quantity', $min_quantity)
                ->where('id', $id)
            ->execute();
    }


    public function getLowQuantityProducts(){
        
        $data = array();
        $pdo = Database::getInstance();

        $sql = $pdo->query("SELECT * FROM products WHERE quantity < min_quantity");

        if($sql->rowCount()>0){
            $data = $sql->fetchAll();
        }
        return $data;
    }





    
}