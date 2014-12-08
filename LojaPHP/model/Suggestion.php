<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
class Suggestion {
    
    public function __construct() {
        ;
    }
    
    public function getTopCD(){
        $strquery = "select AlbumID, count(*) from OrderDetail group by AlbumID order by count(*) desc limit 3";
        $result = $this->dal->query($strquery);
        if($result){
            return $recordset;
        }
        return NULL;
    }
    
}
        
?>