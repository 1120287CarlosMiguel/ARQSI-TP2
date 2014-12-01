<?php
// Pull in the NuSOAP code
require_once('./Library/nusoap.php');

// Create the server instance
$server = new soap_server;
// Initialize WSDL support
$server->configureWSDL('ImportMusicWS', 'urn:ImportMusicWS', '', 'document');

$in = array('shopName' => 'xsd:string',
            'album' => 'xsd:string',
            'qnt' => 'xsd:int');

$out = array('rowNumber' => 'xsd:int');
// registar serviço
$server->register("notify_sale", $in, // parâmetros de entrada
        $out, // parâmetross de saída
        'urn:ImportMusicWS', // namespace
        $server->wsdl->endpoint . '#' . "Add", // soapaction
        'document', // style
        'literal', // use
        'N/A' // documentation
);

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

// Define the method as a PHP function
function notify_Sale($shopN, $alb,$qnt) {
    
    include 'DAL.php';
    
    $dal = new DAL();
    
    $result = $dal->sale_Insert($shopN, $alb, $qnt);
    
    return array('rowNumber' => $result);
}

// Use the request to (try to) invoke the service
?>
