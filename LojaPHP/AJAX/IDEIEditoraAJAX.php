<?php

include '../WebService/IDEIEditoraWSClient.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['metodo'])) {
    $metodo = $_GET['metodo'];
    
    $cliente = new IDEIEditoraWSClient();

    if ($metodo == "GetCatalogo") 
    {
        $result = $cliente->__getCatalogo();

        echo "$result";
    }
}
 else {
     echo "Erro no pedido!!!";
}

