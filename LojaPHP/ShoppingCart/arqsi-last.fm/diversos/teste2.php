<?php

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'logController.php');

$temp2= new log();

$temp2->logInsert("www.sapo2.pt", "2");

$temp2->logReadAll();

$temp2->logReaderType(2);

?>


