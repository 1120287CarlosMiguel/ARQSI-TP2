<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'UserRegisted.php');

class UserRegistedController{
    
    private $objUser;
    private $msgErroResgister="";
            
    function __construct(){
       $this->objUser = new UserRegisted(); 
    }
    
    public function login($userID,$password){
        if($this->objUser->login($userID, $password)){
            session_start();
            $_SESSION["login"]=TRUE;
            $_SESSION["login_UserID"]=$this->objUser->getUserID();
            $_SESSION["login_Name"]=$this->objUser->getName();
            $_SESSION["login_LastName"]=$this->objUser->getLastName();
            $_SESSION["login_Permissions"]=$this->objUser->getPermissions();
            return TRUE;
        }
        return FALSE;
    }
    
    public function logout(){
        session_start();
        session_destroy();
        return TRUE;
    }
    
    
    
    
}