<?php

    $proxy = new SoapClient("http://localhost:2865/EditoraWebService.svc?wsdl");
    
    $result = $proxy->GetCatalogo();
    
    echo $result->GetCatalogoResult;

?>

