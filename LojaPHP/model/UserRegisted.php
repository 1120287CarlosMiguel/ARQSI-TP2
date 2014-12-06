<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'User.php';

class UserRegisted extends User{
    
    //CONSTRUCTORES
    //Verifica com quantos argumentos é passado e escolhe o constructor
    function __construct(){
        $a = func_get_args();
        $i = func_num_args();
	if(method_exists($this,$f='__construct'.$i)){
            call_user_func_array(array($this,$f),$a);
	}
    }
	
    function __construct0(){
        $this->dal = new DAL();
    }
	
    function __construct1($id){
        $this->dal = new DAL();
        if($this->setID($id)){
            $this->populatedData($id);
        }
    }
    
    public function register($username, $password,$name,$LastName){
        $fields="UserID, Password, Name, LastName, Permissions";
        $value="'$username', '$password', '$name', '$LastName','2'";
        $result = $this->dal->insert("User",$fields,$value);
        $this->setUserID($username); //get ultimo ID inserido
        return $result;
    }
    
    

    
    
}