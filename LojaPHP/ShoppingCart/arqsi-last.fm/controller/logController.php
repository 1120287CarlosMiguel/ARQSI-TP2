<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'DAL.php');


class log {
    
    private $objLog;
    
    public function __construct() {
        $this->objLog = new DAL() ;
    }
    
    // Inser um Log
    function logInsert($request, $type){
        if($this->objLog->logInsert($request, $type)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    // Vai buscar um array com todos os Logs
    function logReadAll() {
        if($this->logReaderShow($this->objLog->logReaderAll())){
            return TRUE;
        }
        return FALSE;         
    }
    
    // vai buscar um array com todos os Logs de um certo tipo
    function logReaderType($type){
        if($this->logReaderShow($this->objLog->logReaderType($type))){
            return TRUE;
        }
        return FALSE;
    }
    
    // Funçao UI para mostar um array de resultados de Logs
    private function logReaderShow($recordset){
        if ($recordset->num_rows > 0) {
            echo "<br>";
            while ($row = $recordset->fetch_assoc()) {
                echo $row['eventTime'] . " - " . $row['type'] . " - " . $row['request'] ."<br>";
            }
            return TRUE;
        }
        echo "Sem valores no Log";
        return FALSE;
    }

    
}


?>