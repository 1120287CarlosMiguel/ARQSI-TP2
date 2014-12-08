<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Library'.DIRECTORY_SEPARATOR.'nusoap.php');

class ImportMusicWSClient {

    private $ns="urn:ImportMusicWS";
    private $WSDL_uri="http://uvm075.dei.isep.ipp.pt/ImportMusic/Server.php?wsdl";


    public function __construct() {
        ;
    }
    
    public function notifySale($albumTitle,$qtd){
        $client = new nusoap_client($this->WSDL_uri,'wsdl');  
        if ( $client->getError() ) {
            print "<h2>Soap Constructor Error:</h2><pre>".
            $client->getError()."</pre>";
        }
        $params=array("shopName"=>"LojaPHP", "album"=>$albumTitle,"qnt"=>$qtd);
        $result = $client->call( "notify_sale", array("parameters"=>$params), $this->ns);
        return $result;
    }
}
 

?>