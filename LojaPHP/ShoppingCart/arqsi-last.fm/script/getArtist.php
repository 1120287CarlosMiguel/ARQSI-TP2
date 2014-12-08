<?php
include '../controller/logController.php';

// pedido ao last.fm com a função file_gets_contents 
// a string XML devolvida pelo servidor last.fm fica armazenada na variável $respostaXML 
$api_key = "1337a0720d826238352626d6366c9e34";
$artist = $_GET["artist"];
$request = "method=artist.gettoptags&artist=$artist";
$respostaXML = @file_get_contents("http://ws.audioscrobbler.com/2.0/?method=artist.gettoptags&artist=$artist&api_key=$api_key");
$log = new log();

$log->logInsert($request, "1");

if ($respostaXML) {

    // criar um objecto DOMDocument e inicializá-lo com a string XML recebida 
    $newXML = new DOMDocument('1.0', 'ISO-8859-1');
    $newXML->loadXML($respostaXML);
    // navegar no XML com os métodos que já conhece, mas com uma sintaxe PHP para 
    // aceder a objectos(->)
    $nodelist = $newXML->getElementsByTagName("name");
    $tags = "";
    for ($i = 0; $i < $nodelist->length; $i++) {
        $tagNode = $nodelist->item($i);
        $tagValue = $tagNode->nodeValue;
        $tags.=$tagValue . ",";
    }

    echo $tags;
}
echo "";
?>


