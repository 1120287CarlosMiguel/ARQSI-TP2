<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// /../model/lastFMObjecto.php
// DIRECTORY_SEPARATOR é para evitar problemas com barras que sao difrentes Windows e Unix
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'lastFMObject.php');


class lastFM {
    
    private $objModelLastFM;
    
    function __construct(){
        $this->objModelLastFM = new modelLastFM;
    }
    
    function artistGetTopTags($artist) {
        
        //Aqui tratar informação e prepara para ser enviado ao UI
        return $this->objModelLastFM->artistGetTopTags($artist);
    }
}


?>