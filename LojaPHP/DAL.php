<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAL {
    
    private $DB_NAME = 'LojaPHP';
    private $DB_HOST = 'uvm075.dei.isep.ipp.pt';
    private $DB_USER = 'root';
    private $DB_PASS = 'q1w2e3r4t5y6';
    
    //funcao para conecao com  base de dados
    function db_connect() {
        $mysqli = new mysqli($this->DB_HOST,  $this->DB_USER,  $this->DB_PASS, $this->DB_NAME);
        
        if(mysqli_connect_errno())
        {
            echo "$err";
            return NULL;
        }
        
        return $mysqli;
    }
    
}

