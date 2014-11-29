<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Album {
    
    private $albumID, $title, $price, $artist, $genre; 
            
    public function __construct() {
        ;
    }
    
    public function getID() {return $this->albumID;}
    public function setID($ID) {$this->albumID = $ID;}
    
    public function getTitle() {return $this->title;}
    public function setTitle($ID) {$this->title = $ID;}
    
    public function getPrice() {return $this->price;}
    public function setPrice($ID) {$this->price = $ID;}
    
    public function getArtist() {return $this->artist;}
    public function setArtist($ID) {$this->artist = $ID;}
    
    public function getGenre() {return $this->genre;}
    public function setGenre($ID) {$this->genre = $ID;}
    
    
}