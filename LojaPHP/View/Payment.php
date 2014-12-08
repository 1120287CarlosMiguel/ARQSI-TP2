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

session_start();

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'PaymentController.php');

$paymentController = new PaymentController();

if (isset($_POST)) {
    //Se login valido enta segue
    if ($paymentController->checkOut()) {
        echo "<div align='center'>";
        echo "<br><h1>Compra com sucesso</h1><br>";
        echo "Preço total pago " . $paymentController->getPrecoTotal() . "\n<br>";
        $arrayOrderDatail = $paymentController->getAllOrderDetails();

        foreach ($arrayOrderDatail as $orderDetail) {
            echo "Album ".$paymentController->getAlbumTitle($orderDetail->getAlbumID())." quantidade: " . $orderDetail->getQtd() . " preço: " . $orderDetail->getPreco() . "<br>\n";
        }
        
        echo "<br><div><img src='../img/Animated_SuccessKid.gif'></div>";
        echo "<div>(YEAH!!! Mais um passo para o 20!!!)</div>";
        echo "<h3><a href='../ShoppingCart/default.php'>Voltar a Loja</a></h3></div>";
    } else {
        echo "Erro na compra ".$paymentController->getError();
    }
}else{
    echo 'Ups!!! - Nenhuma compra foi feita';
    echo "<h3><a href='../ShoppingCart/default.php'>Voltar a Loja</a></h3>";
    
}
?>