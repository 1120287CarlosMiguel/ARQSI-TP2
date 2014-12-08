<?php
include '../controller/logController.php';
/**
 * This script will return info of song in this order
 * nameOfSong;ImageAlbum;AlbumName;ArtistName;ArtistImage,Album1;Album2;Album3;TopTrack
 */
$api_key = "1337a0720d826238352626d6366c9e34";
$tag = $_GET["tag"];
$numbTracks = $_GET["numberTracks"];
$log = new log();


//$tag = "female voices";
//$numbTracks = 1;

$resposta = getTopTrack($tag, $numbTracks);

echo "$resposta";

function getTopTrack($tag, $numbTracks) {
    global $log;
    $urlTag = urlencode($tag);
    global $api_key;
    $request = "method=tag.getTopTracks&tag=$urlTag&format=json";
    $respostaJSON = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=tag.getTopTracks&tag=$urlTag&api_key=$api_key&format=json");

    $log->logInsert($request, "1");
    
    $listaTrack = json_decode($respostaJSON, true);
    $i = 0;
    $resposta = "";

    foreach ($listaTrack["toptracks"]["track"] as $key => $value) {
        if ($i < $numbTracks) {
            $name = $value["name"];
            $artist = $value["artist"]["name"];
            if (isset($value["image"][0])) {
                $smallArtistImage = $value["image"][0]["#text"];
            } else {
                $smallArtistImage = "";
            }
            $album = getMusicInfo($name, $artist);
            $nomeTopAlbum = getTopAlbum($artist);
            $nomeTopTrack = getArtistTopTrack($artist);

            $resposta .= $name . ";" . $album . ";" . $artist . ";" . $smallArtistImage . ";" . $nomeTopAlbum.$nomeTopTrack."<br>";
            $i++;
        } else {
            break;
        }
    }

    return $resposta;
}

function getTopAlbum($artist) {
    global $api_key, $log;
    $urlArtist = urlencode($artist);
    $request = "method=artist.getTopAlbums&artist=$urlArtist&format=json&page=1&limit=3";
    $respostaTopAlbum = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=artist.getTopAlbums&artist=$urlArtist&api_key=$api_key&format=json&page=1&limit=3");
    
    $log->logInsert($request, "1");
    
    $listaAlbum = json_decode($respostaTopAlbum, true);
    $nomeAlbum = "";
    for ($j = 0; $j < 3; $j++) {
        if (isset($listaAlbum["topalbums"]['album'][$j]["name"])) {
            $nomeAlbum .= $listaAlbum["topalbums"]['album'][$j]["name"] . ";";
        }
    }

    return $nomeAlbum;
}

function getArtistTopTrack($artist) {
    global $api_key, $log;
    $urlArtist = urlencode($artist);
    
    $request = "method=artist.getTopTracks&artist=$urlArtist&format=json&page=1&limit=1";
    $respost_json = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=artist.getTopTracks&artist=$urlArtist&api_key=$api_key&format=json&page=1&limit=1");
    $log->logInsert($request, "1");
    $topTrack = json_decode($respost_json, true);
    
    if(isset($topTrack["toptracks"]["track"]["name"])) {
        $nome = $topTrack["toptracks"]["track"]["name"];
    }
    
    return $nome;
}

function getMusicInfo($track,$artist) {
    global $api_key, $log;
    $urlTrack = urlencode($track);
    $urlArtist = urlencode($artist);
    
    $request = "method=track.getInfo&artist=$urlArtist&track=$urlTrack&format=json";
    $respost_json = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=track.getInfo&artist=$urlArtist&track=$urlTrack&api_key=$api_key&format=json");
    
    $log->logInsert($request, "1");
    
    $infoTrack = json_decode($respost_json, true);
    
    $album = "";
    $mbidAlbum= "";
    
    if(isset($infoTrack["track"]["album"]["title"])) {
        $album = $infoTrack["track"]["album"]["title"];
    }
    if(isset($infoTrack["track"]["album"]["mbid"])) {
        $mbidAlbum = $infoTrack["track"]["album"]["mbid"];
    }
    
    $image = "http://ia700708.us.archive.org/11/items/mbid-".$mbidAlbum."/mbid-".$mbidAlbum."_thumb250.jpg";
    
    $info = $image .";". $album;
    return $info;    
}
?>

