<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/


include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'PaymentController.php');

$paymentController = new PaymentController();

if (isset($_POST)) {
    //Se login valido enta segue
    if ($paymentController->checkOut()) {

        echo "<br><h1>Comprado com sucesso</h1><br>";
        echo "Preço total pago " . $paymentController->getPrecoTotal() . "\n<br>";
        $arrayOrderDatail = $paymentController->getAllOrderDetails();

        foreach ($arrayOrderDatail as $orderDetail) {
            echo "Album ".$paymentController->getAlbumTitle($orderDetail->getAlbumID())." quantidade: " . $orderDetail->getQtd() . " preço: " . $orderDetail->getPreco() . "<br>\n";
        }
    } else {
        echo "Erro na compra ".$paymentController->getError();
    }
}else{
    echo 'Ups!!! - Nenhuma compra foi feita';
    
}
?>