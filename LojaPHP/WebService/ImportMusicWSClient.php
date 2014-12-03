<?php
require_once('../Library/nusoap.php');
$ns="urn:ImportMusicWS";

$WSDL_uri="http://uvm075.dei.isep.ipp.pt/ImportMusic/Server.php?wsdl";

$client = new nusoap_client($WSDL_uri,'wsdl' );  
if ( $client->getError() ) {
print "<h2>Soap Constructor Error:</h2><pre>".
$client->getError()."</pre>";
}
$params=array("shopName"=>"LojaPHP", "album"=>"Ola","qnt"=>3);

$result = $client->call( "notify_sale", array("parameters"=>$params), $ns);

?>
