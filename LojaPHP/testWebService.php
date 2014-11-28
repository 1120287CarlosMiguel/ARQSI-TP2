<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$client= new SoapClient
('http://www.webservicex.com/globalweather.asmx?WSDL');
$params = array('CityName'=>'Porto','CountryName'=>'Portugal');
$result=$client->GetWeather($params);
echo $result->GetWeatherResult
        

?>