<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './DAL.php';

echo 'vou criar';

$dal = new DAL();

$var = $dal->__editora_Order_Insert();

echo "$var";

