<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../model/DAL.php';

$dal = new DAL();

if(isset($_GET['metodo']) && $_GET['metodo'] === "newOrder")
{
    $id = $dal->__editora_Order_Insert();
    echo $id;
}
else
{

//por ser enviado por post angular manda ficheiro JSON
$postJSON = file_get_contents("php://input");

$request = json_decode($postJSON);

$id = $request->albumID;
$title = $request->title;
$price = $request->price;
$quantidade = $request->qnt;
$artista = $request->art;
$genre = $request->gen;
$image = $request->image;
$orderID = $request->orderID;

$dal->__editora_Order_Detail_Insert($id, $title, $price, $quantidade, $artista, $genre, $image, $orderID);

}
