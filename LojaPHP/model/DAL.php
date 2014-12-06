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
    
    function  __editora_Order_Insert() {
        $mysqli = $this->db_connect();
        
        $query = "INSERT INTO `editoraorder`(`Editora`) VALUES ('IDEIEditora')";
        
        $mysqli->query($query);
        $id = $mysqli->insert_id;
        
        return $id;
    }
    
    function __editora_Order_Detail_Insert($id,$title,$price,$qnt,$art,$gen,$image,$orderID) {
        
        $mysqli = $this->db_connect();
        
        $id = $mysqli->real_escape_string($id);
        $title = $mysqli->real_escape_string($title);
        $price = $mysqli->real_escape_string($price);
        $qnt = $mysqli->real_escape_string($qnt);
        $art = $mysqli->real_escape_string($art);
        $gen = $mysqli->real_escape_string($gen);
        $image = $mysqli->real_escape_string($image);
        
        $query = "INSERT INTO `album`(`AlbumID`, `Title`, `Price`, `Quantidade`, `Artista`, `Genero`, `ImageURL`) VALUES ($id,'$title',$price,$qnt,'$art','$gen','$image') ON DUPLICATE KEY UPDATE Quantidade=Quantidade + $qnt";
        
        $mysqli ->query($query);
        
        $query = "INSERT INTO `editoraorderdetail`(`EditoraOrderID`, `AlbumID`) VALUES ($orderID,$id)";
        $mysqli->query($query);
        
        $mysqli ->close();
    }
    
    //$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
    public function insert($table,$filds,$value){
        //$this->query = $query;
        $query="INSERT INTO ".$this->DB_NAME.".".$table." (".$filds.") VALUES (".$value.")";
        $result = mysqli_query($this->link,$query);
  	if ($result)
  	{
            //echo "<br/>sucesso $query <br>\n";
            return TRUE;
	} else {
            echo "<br/>log erro $query <br>\n";
            return FALSE;
  	}
    }
    
    
    //UPDATE MyGuests SET lastname='Doe' WHERE id=2
    public function update($table,$filds,$value,$where,$whereID){
        //$this->query = $query;
        $query="UPDATE $this->DB_NAME.$table SET $filds='$value' WHERE $where='$whereID'";
        $result = mysqli_query($this->link,$query);
  	if ($result)
  	{			
            return TRUE;
	} else {
            echo "<br/>log erro $query <br>\n";
            return FALSE;
  	}
    }
    
    
    // Tell us what was the last id number inserted on the database
    // this mean that we can use it if we creat new person and we need to know the id of this person to associated to user
    public function insertID(){
	return mysqli_insert_id($this->link);
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