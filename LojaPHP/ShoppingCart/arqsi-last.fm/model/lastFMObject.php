<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include_once (dirname(__FILE__) . '../config.php');

class modelLastFM {
    
    private $api_key = "1337a0720d826238352626d6366c9e34";
    
    function artistGetTopTags($artist) {
        $respostaXML = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=artist.gettoptags&artist=$artist&api_key=$this->api_key");

        // criar um objecto DOMDocument e inicializá-lo com a string XML recebida 
        $newXML = new DOMDocument('1.0', 'ISO-8859-1');
        $newXML->loadXML($respostaXML);
        // navegar no XML com os métodos que já conhece, mas com uma sintaxe PHP para 
        // aceder a objectos(->)
        $nodelist = $newXML->getElementsByTagName("name");
        
        $listaTopTags = array();
        for ($i=0;$i<$nodelist->length;$i++) 
        {    
            $tagNode=$nodelist->item($i); 
            $tagValue = $tagNode->nodeValue;
            $listaTopTags[]=$tagValue;

        } 
        
        return $listaTopTags;
    }
    
    function artistGetTopTagsJSON($artist) {
        $respostaJSON = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=artist.gettoptags&artist=$artist&api_key=$this->api_key&format=json");
        return $respostaJSON;
    }
}
