<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'DAL.php';
include_once 'OrderDetails.php';


class Order {
    
    private $orderID, $precoTotal, $utilizadorID; 
    private $dal;
    private $arrayObjOrderDetails;
    
    //CONSTRUCTORES
    //Verifica com quantos argumentos ao passado para o constructor
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
        if($this->setOrderID($id)){
            $this->populatedData($id);
        }
    }
    
    public function getOrderID() {
        if(!isset($this->orderID)){
            $this->dal->logQuery("nao existe ID selecionado na ordem");
            return NULL;
        }
        return $this->orderID;}
    public function setOrderID($ID) {$this->orderID = $ID;}
    
    public function getPrecoTotal() {return $this->precoTotal;}
    public function setPrecoTotal($ID) {$this->precoTotal = $ID;}
    
    public function getUtilizadorID() {return $this->utilizadorID;}
    public function setUtilizadorID($ID) {$this->utilizadorID = $ID;}
    
    public function getAllOrderDetails(){
        $arrayObjOrderDetail = array();
        $strquery = "SELECT OrderDetailID FROM OrderDetail WHERE OrderID =".$this->getOrderID();
        $result = $this->dal->query($strquery);
        while ($row = $result->fetch_assoc()) {
            $objOrderDetail = new OrderDetails($row["OrderDetailID"]);
            array_push($arrayObjOrderDetail, $objOrderDetail);
        }
        return $arrayObjOrderDetail;
    }

    private function populatedData($id){
        $strquery = "SELECT * FROM Order WHERE OrderID =".$id;
        $result = $this->dal->query($strquery);
        $recordObj = mysqli_fetch_assoc($result);
        $this->setOrderID($recordObj["OrderID"]);
        $this->setPrecoTotal($recordObj["PrecoTotal"]);
        $this->setUtilizadorID($recordObj["UtilizadorID"]);
    }
    
    public function creatOrder($utilizadorID){
        $fields="OrderID, PrecoTotal, UtilizadorID";
        $value="NULL, '0', '$utilizadorID'";
        $this->dal->insert("Order",$fields,$value);
        $id=$this->dal->insertID(); //get ultimo ID inserido
        $this->setOrderID($id);
        return TRUE;
    }
    
    public function updateOrderPrecoTotal($precoTotal){
        if($this->dal->update("Order","PrecoTotal",$precoTotal,"OrderID", $this->getOrderID())){
            $this->setPrecoTotal($precoTotal);
            return TRUE;
        }
        $this->dal->logQuery("erro fazer update do preco na order");
        return FALSE;
    }

    public function addOrderDetail($albumID, $qtd, $price){
        $orderDetails = new OrderDetails();
        if($this->getOrderID()){
            if($orderDetails->saveNewDetail($this->getOrderID(), $albumID, $qtd, $price)){
                return TRUE;
            }
        }
        $this->dal->logQuery("Erro adicionar uma ordem com detail");
        return FALSE;
    }
    
    
}