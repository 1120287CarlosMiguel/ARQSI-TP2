<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$metodo = $_GET['metodo'];

if($metodo == "GetCatalogo") 
{
    $cliente = new IDEIEditoraWSClient();
    $result = $cliente->__getCatalogo();
    if(!$result)
        echo "Empty File";
    
    echo "$result";
}
