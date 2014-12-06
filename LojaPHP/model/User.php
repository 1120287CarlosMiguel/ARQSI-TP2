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
    
    private function getPassword() {return $this->password;}
    private function setPassword($ID) {$this->password = $ID;}
    
    public function getName() {return $this->name;}
    public function setName($ID) {$this->name = $ID;}
    
    public function getLastName() {return $this->lastName;}
    public function setLastName($ID) {$this->lastName = $ID;}
    
    public function getPermissions() {return $this->permissions;}
    public function setPermissions($ID) {$this->permissions = $ID;}
    
    protected function populatedData($id){
        $strquery = "SELECT * FROM User WHERE UserID =".$id;
        $result = $this->dal->query($strquery);
        $recordObj = mysqli_fetch_assoc($result);
        $this->setPassword($recordObj["Password"]);
        $this->setName($recordObj["Name"]);
        $this->setLastName($recordObj["LastName"]);
        $this->setPermissions($recordObj["Permissions"]);
    }

}