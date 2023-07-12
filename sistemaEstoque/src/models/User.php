<?php
namespace src\models;
use \core\Model;

class User extends Model {

    private $number;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

}