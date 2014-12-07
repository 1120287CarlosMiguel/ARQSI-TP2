<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'DAL.php';

class User {
    
    private $userID, $password, $name, $lastName, $permissions;
    private $dal;
    
    public function getUserID() {return $this->userID;}
    public function setUserID($ID) {$this->userID = $ID;}
    
    protected function getPassword() {return $this->password;}
    protected function setPassword($ID) {$this->password = $ID;}
    
    public function getName() {return $this->name;}
    public function setName($ID) {$this->name = $ID;}
    
    public function getLastName() {return $this->lastName;}
    public function setLastName($ID) {$this->lastName = $ID;}
    
    public function getPermissions() {return $this->permissions;}
    public function setPermissions($ID) {$this->permissions = $ID;}
    
}