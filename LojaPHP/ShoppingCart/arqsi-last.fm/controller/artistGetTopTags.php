<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'lastFMObject.php');

$objModelLastFM = new modelLastFM;
$artist = isset($_GET['artist']);
echo ($objModelLastFM->artistGetTopTagsJSON($artist));


//em vez de passar o JSON podia se passar um texto em HTLM ja tratado 
// em que o javascript so tinha que mostar esse HTML.

?>