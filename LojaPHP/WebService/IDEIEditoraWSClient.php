<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IDEIEditoraWSClient {
    
    private $WSDL = "http://localhost:2865/EditoraWebService.svc?wsdl";
    
    //Funcao para chamar via AJAX para retornar catalogo(JSON)
    function  __getCatalogo()
    {
        try {
        $client = new SoapClient("http://localhost:2865/EditoraWebService.svc?wsdl");

        $result = $client->GetCatalogo();

        echo "$result->GetCatalogoResult";
        } catch (Exception $ex) {
            echo "Editora não acessivel";
        }
    }
    
}

