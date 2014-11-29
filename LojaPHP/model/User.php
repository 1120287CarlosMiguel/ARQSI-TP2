<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {
    
    private $userID, $pass;

    public function getID() {return $this->userID;}
    public function setID($ID) {$this->userID = $ID;}
    
    private function getPass() {return $this->pass;}
    private function setPass($ID) {$this->pass = $ID;}
    
}