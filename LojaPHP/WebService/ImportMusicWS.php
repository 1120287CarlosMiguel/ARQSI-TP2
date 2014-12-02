<?php
require_once('../Library/nusoap.php');
$ns="urn:ImportMusicWS";

$WSDL_uri="http://uvm075.dei.isep.ipp.pt/ImportMusic/Server.php?wsdl";

$client = new soapclient ( $WSDL_uri,'wsdl' );  
if ( $client->getError() ) {
print "<h2>Soap Constructor Error:</h2><pre>".
$client->getError()."</pre>";
}
$params=array("shopName"=>"LojaPHP", "album"=>"Ola","qnt"=>3);

$result = $client->call( "notify_sale", array("parameters"=>$params), $ns);

print "<h2>Result: </h2><pre>". $result["rowNumber"] ."</pre>";
print_r( $result);
print '<h2>Details:</h2><hr />'.
'<h3>Request</h3><pre>' .
htmlspecialchars( $client->request, ENT_QUOTES) .'</pre>'.
'<h3>Response</h3><pre>' .
htmlspecialchars( $client->response, ENT_QUOTES) .'</pre>';

?>
