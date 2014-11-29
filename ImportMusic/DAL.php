<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DAL { 
    
    private $DB_NAME = 'ImportMusic';
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = 'q1w2e3r4t5y6';
    
    //funcao para conecao com  base de dados
    function db_connect() {
        $mysqli = new mysqli($this->DB_HOST,  $this->DB_USER,  $this->DB_PASS, $this->DB_NAME);
        
        if(mysqli_connect_errno())
        {
            return NULL;
        }
        
        return $mysqli;
    }
    
    //Funcao para inserir compra no import music
    function sale_Insert($shopName,$album,$quantity) {
        $mysqli = $this->db_connect();

        $sName = $mysqli->real_escape_string($shopName);
        $alb = $mysqli->real_escape_string($album);
        $qnt = $mysqli->real_escape_string($quantity);
        
        echo "vou iserir";
        $query = "INSERT INTO `MusicShopSales`(`ShopName`,`Album`,`Quantity`) VALUES ('$sName','$alb',$qnt)";
        
        $resutl = $mysqli->query($query);
        
        $mysqli->close();
        
        return $resutl;
    }
}

?>

