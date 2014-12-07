<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../WebService/IDEIEditoraWSClient.php';

if(isset($_GET['metodo']) && $_GET['metodo']="NewOrder")
{
    $client = new IDEIEditoraWSClient();
    $orderID = $client->__createOrder($_GET['Total']);
    
    echo "$orderID";
}
 else {
    $postJSON = file_get_contents("php://input");

    $request = json_decode($postJSON);

    $orderID = $request->orderID;
    $albumID = $request->albumID;
    $price = $request->price;
    $qnt = $request->qnt;

    $client = new IDEIEditoraWSClient();
    $client->__addOrderDetail($orderID, $qnt, $price, $albumID);
}
