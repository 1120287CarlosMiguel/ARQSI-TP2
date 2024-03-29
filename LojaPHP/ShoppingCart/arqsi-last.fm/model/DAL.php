<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAL {

    private $DB_NAME = 'i120287'; //arqsi i100916
    private $DB_HOST = 'phpdev2.dei.isep.ipp.pt'; // phpdev2.dei.isep.ipp.pt localhost
    private $DB_USER = 'i120287'; //i100916 root
    private $DB_PASS = '6883037'; // 8410845

    function db_connect() {
        $mysqli = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
        if (mysqli_connect_errno())
            return NULL;
        return $mysqli;
    }

    
    // Guarda numa BD o tipo de request e o tipo (1-URl do pedido,2-pequisas,3-Tag selecionada 4-limiteTags 5-mbid (indenficador do ID musica))
    // a BD tem função NOW() para guardar a horar 
    function logInsert($request, $type){
        $mysqli = $this->db_connect();
        $sqlquery = "INSERT INTO `LojaPHP`.`Last.fmLog` (eventTime,request,type)
                         VALUES (NOW(),'$request','$type')";
        $result = $mysqli->query($sqlquery);
        return $result;
    }
    
    function logReaderAll(){
        $mysqli = $this->db_connect(); 
        if ($mysqli) {
            $strquery = "SELECT * FROM `Last.fmLog`"; 
            $recordset = $mysqli->query($strquery); 
            return $recordset;
        }
        return null;
    }
    
    
    function logReaderType($type){
        $mysqli = $this->db_connect(); 
        if ($mysqli) {
            $strquery = "SELECT * FROM `Last.fmLog` WHERE type='$type'"; 
            $recordset = $mysqli->query($strquery); 
            return $recordset;
        }
        return null;
    }
}

?>