<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IDEIEditoraWSClient {

//Funcao para chamar via AJAX para retornar catalogo(JSON)
    function __getCatalogo() {
        
        $api = $this->__getAPI_Key("cfmm1994@gmail.com", "20cfmm94");
        
        try {
            $client = new SoapClient("http://localhost:44864/EditoraWebService.svc?wsdl");
            
            $params = array("API_key" => $api);
            
            $result = $client->GetCatalogo($params);

            echo "$result->GetCatalogoResult";
        } catch (Exception $ex) {
            echo "Editora não acessivel";
        }
    }

    function __getAPI_Key($user, $password) {
        
        try{
            $client = new SoapClient("http://localhost:44864/EditoraWebService.svc?wsdl");

            $params = array("username" => $user,
                            "password" => $password);

            $result = $client->GetAPI_Key($params);

            return $result->GetAPI_KeyResult;
        } 
        catch (Exception $ex)
        {
            return "";
        }
    }
    
    function __createOrder($total)
    {
        $api = $this->__getAPI_Key("cfmm1994@gmail.com", "20cfmm94");
        
         try{
            $client = new SoapClient("http://localhost:44864/EditoraWebService.svc?wsdl");

            $params = array("API_key" => $api,
                            "total" => $total);

            $result = $client->CreateOrder($params);
            
            echo "$result->CreateOrderResult";
            
        }  catch (Exception $ex) {
            echo "Editora não acessivel";
        }
    }
    
    function __addOrderDetail($orderID, $qnt, $price, $albumID) {
        try{
            $client = new SoapClient("http://localhost:44864/EditoraWebService.svc?wsdl");

            $params = array("orderID" => $orderID,
                            "qnt" => $qnt,
                            "price" => $price,
                            "albumID" => $albumID);
                    
            $result = $client->FinishOrder($params);
        }  catch (Exception $ex) {
        }
    }

}
