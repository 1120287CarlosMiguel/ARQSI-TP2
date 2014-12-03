<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './DAL.php';

class Album {
    
    private $albumID, $title, $price, $artist, $genre, $url; 
    private $dal;
    
    //CONSTRUCTORES
    //Verifica com quantos argumentos é passado para o constructor
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
        if($this->setID($ID)){
            $this->populatedData($id);
        }
    }
            
    
    public function getID() {return $this->albumID;}
    public function setID($ID) {
        $strquery = "SELECT * FROM Album WHERE AlbumID =".$ID;
        if($result = $this->dal->query($strquery)){
            $this->albumID = $ID;
            return true;
        }
        return false;
    }
    
    public function getTitle() {return $this->title;}
    public function setTitle($ID) {$this->title = $ID;}
    
    public function getPrice() {return $this->price;}
    public function setPrice($ID) {$this->price = $ID;}
    
    public function getArtist() {return $this->artist;}
    public function setArtist($ID) {$this->artist = $ID;}
    
    public function getGenre() {return $this->genre;}
    public function setGenre($ID) {$this->genre = $ID;}
    
    public function getUrl() {return $this->url;}
    public function setUrl($ID) {$this->url = $ID;}
    
    public function queryAlbuns() {
        $mysqli = $this->dal; if ($mysqli) {
            $strquery = "SELECT * FROM Album"; 
            $recordset = $mysqli->query($strquery); 
            return $recordset;
        }
        return null;
    }
    
    public function getAllAlbuns(){
        if($result = $this->queryAlbuns()){
            $arryTemp = array();
            while($row = mysqli_fetch_assoc($result)){
                array_push($arryTemp,new Album($row["AlbumID"]));	
            }
            return $arryTemp;	
        } 
    }
    
    private function populatedData($id){
        $strquery = "SELECT * FROM Album WHERE AlbumID =".$id;
        $result = $this->dal->query($strquery);
        $recordObj = mysqli_fetch_assoc($result);
        $this->setTitle($recordObj["title"]);
        $this->setArtist($recordObj["artist"]);
        $this->setGenre($recordObj["genre"]);
        $this->setPrice($recordObj["price"]);
        $this->setUrl($recordObj["url"]);
    }
    
    
}