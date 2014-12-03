<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Data Access Layer
class DAL {

    private $DB_NAME = 'LojaPHP'; //arqsi i100916
    private $DB_HOST = 'localhost'; // phpdev2.dei.isep.ipp.pt localhost
    private $DB_USER = 'root'; //i100916 root
    private $DB_PASS = ''; // 8410845

    var $link = "";
    
    public function __construct() {
        $this->db_connect();
    }
    
    public function db_connect() {
        $mysqli = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
        if (mysqli_connect_errno()){
            //log
            return NULL; 
        }
        $this->link=$mysqli;
        return $mysqli;
    }
    
    
    public function query($query){
        //$this->query = $query;
        $result = mysqli_query($this->link,$query);
  	if ($result)
  	{			
            return $result;
	} else {
            return 0;
  	}
    }
    

    /*
    // Guarda numa BD o tipo de request e o tipo (1-URl do pedido,2-pequisas,3-Tag selecionada 4-limiteTags 5-mbid (indenficador do ID musica))
    // a BD tem função NOW() para guardar a horar 
    function logInsert($request, $type){
        $mysqli = $this->db_connect();
        $sqlquery = "INSERT INTO `i120287`.`Last.fmLog` (eventTime,request,type)
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
     * 
     * 
     */
}

?>