<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'SuggestionController.php');


$objSuggestionController = new SuggestionController();

echo "<div>";
echo "<h2>Os CD's Mais vendidos nesta loja</h2>";
$objSuggestionController->getTopCD();
echo "</div>";

?>