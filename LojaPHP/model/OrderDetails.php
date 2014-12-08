<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'DAL.php';
include_once 'Album.php';
include_once 'ImportMusicWSClient.php';


class OrderDetails {

    private $orderDetailID, $orderID, $albumID, $qtd, $price; 
    private $dal;
    
    //CONSTRUCTORES
    //Verifica com quantos argumentos ao passado para o constructor
    function __construct(){
        $a = func_get_args();
        $i = func_num_args();
	if(method_exists($this,$f='__construct'.$i)){
            call_user_func_array(array($this,$f),$a);
	}
    }
    
    //Usada para ter acessoa as funcoes genericas
    function __construct0(){
        $this->dal = new DAL();
    }
    
    //Usada para ela prencher se sozinha
    function __construct1($id){
        $this->dal = new DAL();
        $this->setOrderDetailID($id);
        $this->populatedData($id);
    }
    
    //Usado para quando se quer criar uma nova OrderDetail
    function __construct4($orderID,$albumID, $qtd, $price){
        saveNewDetail($orderID,$albumID, $qtd, $price);
    }
    
    
    public function getOrderDetailID() {return $this->orderDetailID;}
    public function setOrderDetailID($ID) {$this->orderDetailID = $ID;}
    
    public function getOrderID() {return $this->orderID;}
    public function setOrderID($ID) {$this->orderID = $ID;}
    
    
    public function getAlbumID() {return $this->albumID;}
    public function setAlbumID($ID) {$this->albumID = $ID;}
    public function getAlbumObject() {return new Album($this->getAlbumID());}
    
        
    public function getQtd() {return $this->qtd;}
    public function setQtd($ID) {$this->qtd = $ID;}
    
    public function getPreco() {return $this->price;}
    public function setPreco($ID) {$this->price = $ID;}
    
    public function saveNewDetail($orderID,$albumID, $qtd, $price){
        $fields="OrderID, AlbumID, Quantidade, Price";
        $value="'$orderID','$albumID', '$qtd', '$price'";
        $this->dal->insert("OrderDetail",$fields,$value);
        //get ultimo ID inserido
        $this->setOrderDetailID($this->dal->insertID());
        $albumObj = new Album($albumID);
        $albumObj->removeAlbum($qtd);
        
        //webservice
        $webService = new ImportMusicWSClient();
        $webService->notifySale($albumObj->getTitle(), $qtd);
       return TRUE;
    }

    private function populatedData($id){
        $strquery = "SELECT * FROM OrderDetail WHERE OrderDetailID =".$id;
        $result = $this->dal->query($strquery);
        $recordObj = mysqli_fetch_assoc($result);
        $this->setOrderID($recordObj["OrderID"]);
        $this->setAlbumID($recordObj["AlbumID"]);
        $this->setQtd($recordObj["Quantidade"]);
        $this->setPreco($recordObj["Price"]);
    }
    
    
    
    
}