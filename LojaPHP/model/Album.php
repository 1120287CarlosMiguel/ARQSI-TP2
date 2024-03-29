<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Album.php');

include_once 'DAL.php';

class Album {

    private $albumID, $title, $price, $artist, $genre, $url, $qtd;
    private $dal;

    //CONSTRUCTORES
    //Verifica com quantos argumentos é passado para o constructor
    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    }

    function __construct0() {
        $this->dal = new DAL();
    }

    function __construct1($id) {
        $this->dal = new DAL();
        if ($this->setID($id)) {
            $this->populatedData($id);
        }
    }

    public function getID() {
        return $this->albumID;
    }

    public function setID($ID) {
        $strquery = "SELECT * FROM album WHERE AlbumID =" . $ID;
        $result = $this->dal->query($strquery);
        if ($result) {
            $this->albumID = $ID;
            return true;
        }
        $this->dal->logQuery("erro n�o existe esse album com esse id".$strquery);
        return false;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($ID) {
        $this->title = $ID;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($ID) {
        $this->price = $ID;
    }

    public function getArtist() {
        return $this->artist;
    }

    public function setArtist($ID) {
        $this->artist = $ID;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($ID) {
        $this->genre = $ID;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($ID) {
        $this->url = $ID;
    }

    public function getQtd() {
        return $this->qtd;
    }

    public function setQtd($ID) {
        $this->qtd = $ID;
    }

    public function queryAlbuns() {
        $mysqli = $this->dal;
        if ($mysqli) {
            $strquery = "SELECT * FROM album";
            $recordset = $mysqli->query($strquery);
            return $recordset;
        }
        $this->dal->logQuery("erro fazer query de  album");
        return null;
    }

    public function getAllAlbuns() {
        $result = $this->queryAlbuns();
        if ($result) {
            $arryTemp = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arryTemp, new Album($row["AlbumID"]));
            }
            return $arryTemp;
        }
        $this->dal->logQuery("erro obeter todos os albuns");
    }

    private function populatedData($id) {
        $strquery = "SELECT * FROM album WHERE AlbumID =" . $id;
        $result = $this->dal->query($strquery);
        if ($result) {
            $recordObj = mysqli_fetch_assoc($result);
            $this->setTitle($recordObj["Title"]);
            $this->setArtist($recordObj["Artista"]);
            $this->setGenre($recordObj["Genero"]);
            $this->setPrice($recordObj["Price"]);
            $this->setUrl($recordObj["ImageURL"]);
            $this->setQtd($recordObj["Quantidade"]);
        }
    }

    public function removeAlbum($qtd) {
        $endQtd = $this->getQtd() - $qtd;
        if ($endQtd >= 0) {
            if ($this->dal->update("album", "Quantidade", $this->getQtd() - $qtd, "AlbumID", $this->getID())) {
                $this->setQtd($qtd);
                return TRUE;
            }
        }
        $this->dal->logQuery("erro remover album");
        return FALSE;
    }

    public function addAlbum($qtd) {
        $endQtd = $this->getQtd() + $qtd;
        if ($this->dal->update("album", "Quantidade", $this->getQtd() - $qtd, "AlbumID", $this->getID())) {
            $this->setQtd($qtd);
            return TRUE;
        }
        $this->dal->logQuery("erro adicionar album");
        return FALSE;
    }

    //isVisable para caso Albuns esteja igual a zero e nao ser listado
    public function isVisable() {
        if ($this->getQtd() <= 0) {
            return FALSE;
        }
        return TRUE;
    }

}
