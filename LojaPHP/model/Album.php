<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Album.php');

include_once 'DAL.php';

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
        $this->dal = new DAL();
        if($this->setID($id)){
            $this->populatedData($id);
        }
    }
            
    
    public function getID() {return $this->albumID;}
    public function setID($ID) {
        $strquery = "SELECT * FROM Album WHERE AlbumID =".$ID;
        $result = $this->dal->query($strquery);
        if($result){
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
        $this->setTitle($recordObj["Title"]);
        $this->setArtist($recordObj["Artista"]);
        $this->setGenre($recordObj["Genero"]);
        $this->setPrice($recordObj["Price"]);
        $this->setUrl($recordObj["ImageURL"]);
    }
    
    
}