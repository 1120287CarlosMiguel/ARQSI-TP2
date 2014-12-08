<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$api_key = "1337a0720d826238352626d6366c9e34";

if(isset($_GET["location"])){$location=$_GET["location"];}else{$location="Porto";}
if(isset($_GET["distance"])){$distance=$_GET["distance"];}else{$distance="5";}
if(isset($_GET["page"])){$page=$_GET["page"];}else{$page="1";}
if(isset($_GET["limit"])){$limit2=$_GET["limit"];}else{$limit2="10";}
$urlLocation = urlencode($location);

// distance (Optional) : Find events within a specified radius (in kilometres)
// page (Optional) : The page number to fetch. Defaults to first page.
// limit (Optional) : The number of results to fetch per page. Defaults to 10.
function getGeoEvent($location, $distance, $page, $limit){
    $urlLocation = urlencode($location);
    global $api_key;
    $respostaJSON = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=geo.getevents&location=$urlLocation&$distance&page=$page&limit=$limit&api_key=$api_key&format=json");

    $listaEventos = json_decode($respostaJSON, true);
}

function getGeoEventPages($location, $distance){
    $urlLocation = urlencode($location);
    global $api_key;
    $respostaJSON = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=geo.getevents&location=$urlLocation&$distance&api_key=$api_key&format=json");
    $listaEventos = json_decode($respostaJSON, true);
    
    $total=$listaEventos["events"]["@attr"]["total"];
    return $total;        
}



$nr = getGeoEventPages($location, $distance); // Get total of Num rows from the database query
if (isset($_GET['page'])) { // Get pn from URL vars if it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['page']); // filter everything but numbers for security(new)
    //$pn = ereg_replace("[^0-9]", "", $_GET['pn']); // filter everything but numbers for security(deprecated)
} else { // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
}
//This is where we set how many database items to show on each page
$itemsPerPage = $limit2;
// Get the value of the last page in the pagination result set
$lastPage = ceil($nr / $itemsPerPage);
// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
if ($pn < 1) { // If it is less than 1
    $pn = 1; // force if to be 1
} else if ($pn > $lastPage) { // if it is greater than $lastpage
    $pn = $lastPage; // force it to be $lastpage's value
}
// This creates the numbers to click in between the next and back buttons
// This section is explained well in the video that accompanies this script
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage;
// Now we are going to run the same query as above but this time add $limit onto the end of the SQL syntax
// $sql2 is what we will use to fuel our while loop statement below


$respostaJSON = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=geo.getevents&location=$urlLocation&$distance&page=$page&limit=$limit2&api_key=$api_key&format=json");
$listaEventos = json_decode($respostaJSON, true);


function getGeoEventArray($location, $distance, $page, $limit2){
    $urlLocation = urlencode($location);
    global $api_key;
    $respostaJSON = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=geo.getevents&location=$urlLocation&$distance&page=$page&limit=$limit2&api_key=$api_key&format=json");
    $listaEventos = json_decode($respostaJSON, true);
    
    $listaLocalizacoes = '[';
    foreach ($listaEventos["events"]["event"] as $key => $value) {
        $nameEvent = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $value["title"]);
        if (isset($value["venue"]["location"]["geo:point"]["geo:lat"])) {
            $lat = $value["venue"]["location"]["geo:point"]["geo:lat"];
            $long = $value["venue"]["location"]["geo:point"]["geo:long"];
        } else {
            $lat="";
            $long="";
        }
        $listaLocalizacoes=$listaLocalizacoes."['".$nameEvent."', ".$lat.", ".$long."],\r\n";
    }
    
    $listaLocalizacoes = substr_replace($listaLocalizacoes ,"",-3);
    $listaLocalizacoes=$listaLocalizacoes."];";
    return $listaLocalizacoes;
}

    

//////////////////////////////// END Adam's Pagination Logic ////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Adam's Pagination Display Setup /////////////////////////////////////////////////////////////////////
$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
    }
    // Lay in the clickable numbers display here between the Back and Next links
    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> Next</a> ';
    }
}
///////////////////////////////////// END Adam's Pagination Display Setup ///////////////////////////////////////////////////////////////////////////
// Build the Output Section Here
$outputList = '';


foreach ($listaEventos["events"]["event"] as $key => $value) {
            $name = $value["title"];
            $url = $value["url"];
            $outputList .= '<h3>' . $name . ' </h3><a href="'.$url.'"> link</a><hr />';
    }

?>
<html>
<head>
<title>Pagination</title>

  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>


<style type="text/css">
<!--
.pagNumActive {
    color: #000;
    border:#060 1px solid; background-color: #D2FFD2; padding-left:3px; padding-right:3px;
}
.paginationNumbers a:link {
    color: #000;
    text-decoration: none;
    border:#999 1px solid; background-color:#F0F0F0; padding-left:3px; padding-right:3px;
}
.paginationNumbers a:visited {
    color: #000;
    text-decoration: none;
    border:#999 1px solid; background-color:#F0F0F0; padding-left:3px; padding-right:3px;
}
.paginationNumbers a:hover {
    color: #000;
    text-decoration: none;
    border:#060 1px solid; background-color: #D2FFD2; padding-left:3px; padding-right:3px;
}
.paginationNumbers a:active {
    color: #000;
    text-decoration: none;
    border:#999 1px solid; background-color:#F0F0F0; padding-left:3px; padding-right:3px;
}
-->
</style>
</head>
<body>
   <div style="margin-left:64px; margin-right:64px;">
     <h2>Total Items: <?php echo $nr; ?></h2>
   </div>
      <div style="margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;"><?php echo $paginationDisplay; ?></div>
      
      
      
      <div id="map" style="width: 300px; height: 230px;" ></div>
  <script type="text/javascript">

    <?php
    echo "var locations = ".getGeoEventArray($location, $distance, $page, $limit2);
    ?>        
        
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: new google.maps.LatLng(locations[0][1], locations[0][2]),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
  
  
  
  
  
      <div style="margin-left:64px; margin-right:64px;"><?php print "$outputList"; ?></div>
      <div style="margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;"><?php echo $paginationDisplay; ?></div>
</body>
</html> 
