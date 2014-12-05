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
echo "<pre>";
print_r($_POST);
echo "</pre>";

$qtdALbumEnough = TRUE;


//VAlidar se existe CD's suficentes para satisfazer a compra
if(isset($_POST)){
    for ($i=1; $i<=$_POST["totalItems"]; $i++)
    {
        $itemNumber = $_POST['item_number_'.$i];
        $quantity = $_POST['quantity_'.$i];
        
        $album = new Album($itemNumber);
        if(!($album->getQtd()<=$quantity)){
            //Entao podes comprar
            $qtdALbumEnough=FALSE;
            echo "Não existe CD's suficente deste album ".$album->getTitle()." só existem ".$album->getQtd();
        }
    }
}


if($qtdALbumEnough){
    $objOrder = new Order();
    $objOrder->creatOrder($utilizadorID);
    $totalPrice=0;
    for ($i=1; $i<=$_POST["totalItems"]; $i++)
    {
        $itemNumber = $_POST['item_number_'.$i];
        $quantity = $_POST['quantity_'.$i];
        $album = new Album($itemNumber);
        $price = $album->getPrice();
        $objOrder->addOrderDetail($itemNumber, $qtd, $price);
        $totalPrice=$price;
    }
    $objOrder->updateOrderPrecoTotal($totalPrice);
    
    $arrayOrderDatail = $objOrder->getAllOrderDetails();
    
    foreach($arrayOrderDatail as $orderDetail){
        echo $orderDetail->getAlbumObject()->getTitle()." $orderDetail->getQtd() $orderDetail->getPreco()()";
    }
    
}