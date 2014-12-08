<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// ../model/Album.php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Album.php');
//../model/Order.php;
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Order.php');
//../model/OrderDetails.php;
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'OrderDetails.php');



/*
 Array
(
    [buy] => compraAlbum
    [totalItems] => 3
    [item_number_1] => 3
    [item_name_1] => Back in Black
    [quantity_1] => 3
    [amount_1] => 5.55
    [item_number_2] => 2
    [item_name_2] => The Dark Side of the Moon
    [quantity_2] => 2
    [amount_2] => 15.00
    [item_number_3] => 1
    [item_name_3] => Thriller
    [quantity_3] => 7
    [amount_3] => 10.99
)
 */




class PaymentController {

    private $objOrder;
    private $msgError="";


    public function __construct() {

    }
    
    public function checkOut(){
        if($this->validateEnoughCDs()){
            return ($this->makeOrder());
        }
        return FALSE;
    }


    //VAlidar se existe CD's suficentes para satisfazer a compra
    //Mas antes disso valida se existe um cliente activo
    private function validateEnoughCDs(){
        if(!isset($_SESSION["login"])){
            return FALSE;
        }
        if(isset($_POST)){
            for ($i=1; $i<=$_POST["totalItems"]; $i++)
            {
                $itemNumber = $_POST['item_number_'.$i];
                $quantity = $_POST['quantity_'.$i];
                $album = new Album($itemNumber);
                if($album->getQtd()<=$quantity){
                     $this->msgError=" não existe CD's suficente deste album ".$album->getTitle()." só existem ".$album->getQtd()." e estão a tentar ser comprados ".$quantity;
                    return FALSE;
                }
            }
            return TRUE;
        }
        return FALSE;
    }
    
    private function makeOrder(){
        $objOrder = new Order();
        $objOrder->creatOrder($_SESSION["login_UserID"]); //$utilizadorID ALERTA por aqui Sessisao user
        $totalPrice = 0;
        for ($i = 1; $i <= $_POST["totalItems"]; $i++) {
            $itemNumber = $_POST['item_number_' . $i];
            $quantity = $_POST['quantity_' . $i];
            $album = new Album($itemNumber);
            $price = $album->getPrice();
            $objOrder->addOrderDetail($itemNumber, $quantity, $price);
            $totalPrice= $totalPrice+$price*$quantity;
        }
        $objOrder->updateOrderPrecoTotal($totalPrice);
        $this->objOrder=$objOrder;
        return true;
    }
    
    //retorna array com todas as ordens com details
    public function getAllOrderDetails(){
        return $this->objOrder->getAllOrderDetails();
    }
    
    public function getPrecoTotal(){
        return $this->objOrder->getPrecoTotal();
    }

    public function getError(){
        return $this->msgError;
    }
    
    public function getAlbumTitle($id){
        $albumObj = new Album($id);
        return $albumObj->getTitle();
    }
    
    
}
