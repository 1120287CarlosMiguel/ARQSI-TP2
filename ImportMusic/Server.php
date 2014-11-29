<?php

//call library
require_once('./Library/nusoap-0.9.5/lib/nusoap.php');
$URL       = "www.test.com";
$namespace = $URL . '?wsdl';
//using soap_server to create server object
$server    = new soap_server;
$server->configureWSDL('ImportMusic', $namespace);

//register a function that works on server
$server->register('NotifyOrder');

// create the function
function NotifyOrder($shopName,$album,$quantity)
{
    $dal = new DAL();
    
    if(!$shopName || !$album || !$quantity)
    {
        return new soap_fault("Nome = $shopName Album=$album Quantidade=$quantity");
    }
    
    $res = $dal->order_Insert($shopName, $album, $quantity);
    
    return $res;
}
// create HTTP listener

if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
exit();
?>