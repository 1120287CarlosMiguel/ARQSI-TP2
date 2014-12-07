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
    else if($metodo == "GetAPI_Key") 
    {
        $result = $cliente->__getAPI_key("cfmm1994@gmail.com","20cfmm94");
        
        echo "$result";
    }
}
 else {
     echo "Erro no pedido!!!";
}

