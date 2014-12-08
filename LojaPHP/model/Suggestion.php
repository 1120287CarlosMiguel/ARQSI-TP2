<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'DAL.php';

class Suggestion {
    
    private $dal;
    
    public function __construct() {
        $this->dal = new DAL();
    }
    
    public function getTopCD(){
        $strquery = "select AlbumID, count(*) from OrderDetail group by AlbumID order by count(*) desc limit 3";
        $recordset = $this->dal->query($strquery);
        if($recordset){
            return $recordset;
        }
        return NULL;
    }
    
}
        
?>