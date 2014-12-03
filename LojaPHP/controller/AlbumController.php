<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// ../model/Album.php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Album.php');
//include_once '../model/Album.php';




/*
The result of validad login 
 {
    "success": 1,
    "userData": [
        {
            "loginSatatus": "activated",
			"loginIdUser": "1",
			"loginIdPerson": "1",
            "loginName": "james"
        }
    ]
}
*/
 
/*
// array for JSON response
$response = array();

// check for post data
$obj = new ClassBand();

if (sizeof($obj->listAllBands()) > 0) {

  	// looping through all results
    // products node
    $response["bands"] = array();
  
  	$listIdBands = $obj->listAllBands();
	
    foreach($listIdBands as $idBand){
	$objBand = new ClassBand($idBand);
        // temp user array
        $product = array();
	$product["idBand"] = $objBand->getID();
        $product["name"] = $objBand->getName();
        $product["description"] = $objBand->getDescription();
        $product["profilePhoto"] = $objBand->getProfilePhoto();
        $product["nationality"] = $objBand->getNationality();
	$product["genre"] = $objBand->getGenre();
 
        // push single product into final response array
        array_push($response["bands"], $product);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
  
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Don't exist result for all the band";
 
    // echoing JSON response
    echo json_encode($response);
}
*/


$objAlbum = new Album();
$objAlbum->getAllAlbuns();
$numItems= count($objAlbum->getAllAlbuns());
$i=0;
foreach($objAlbum->getAllAlbuns() as $album){
    if (is_object($album) && $album instanceof Album) {
        //new product("1", "Rock or Bust", 16, "AC DC", "Rock"),
        echo 'new product("'.$album->getID().'", "'.$album->getTitle().'", '.$album->getPrice().' ,"'.$album->getArtist().'", "'.$album->getGenre().'", "'.$album->getUrl().'")';
        if(!(++$i === $numItems)){echo ",\xA";}
    }
}