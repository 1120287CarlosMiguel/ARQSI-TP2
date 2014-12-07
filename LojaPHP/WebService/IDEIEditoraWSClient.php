<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IDEIEditoraWSClient {

    private $WSDL = "http://localhost:44864/EditoraWebService.svc?wsdl";

//Funcao para chamar via AJAX para retornar catalogo(JSON)
    function __getCatalogo() {
        try {
            $client = new SoapClient("http://localhost:44864/EditoraWebService.svc?wsdl");

            $result = $client->GetCatalogo();

            echo "$result->GetCatalogoResult";
        } catch (Exception $ex) {
            echo "Editora n�o acessivel";
        }
    }

    function __getAPI_Key($user, $password) {
        
        try{

            $client = new SoapClient("http://localhost:44864/EditoraWebService.svc?wsdl");

            $params = array("username" => $user,
                            "password" => $password);

            $result = $client->GetAPI_Key($params);

            echo "$result->GetAPI_KeyResult";
        }  catch (Exception $ex) {
            echo "Editora n�o acessivel";
        }
    }

}
