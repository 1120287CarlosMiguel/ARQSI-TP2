<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'UserRegisted.php');

class UserRegistedController{
    
    private $objUserRegisted;
    private $msgErroResgister="";
            
    function __construct(){
       $this->objUserRegisted = new UserRegisted; 
    }
    
    public function checkPostResgiter(){
        if(isset($_POST)){
            if(!isset($_POST["username"]) || !isset($_POST["name"]) || !isset($_POST["lastName"]) || !isset($_POST["password"])){
                $this->msgErroResgister= "Um dos campos chegou vazio </br>";
                return FALSE;
            }
            $required = array('username', 'name', 'lastName', 'password');
            foreach($required as $field) {
                if (empty($_POST[$field])) {
                    $this->msgErroResgister= "Deve prencher todos os campos </br>";
                    return FALSE;
                }
            }
            return TRUE;
        }
        return FALSE;
    }

    
    
    
    public function register($username, $password,$name,$LastName){
        $result = $this->objUserRegisted->register($username, $password, $name, $LastName);
        if($result){
            return TRUE;
        }
        return FALSE;
    }
    
    public function getID(){
        return $this->objUserRegisted->getID();
    }
    
    public function getMsgErroResgister(){
        return $this->msgErroResgister;
    }
    
    
}

?>