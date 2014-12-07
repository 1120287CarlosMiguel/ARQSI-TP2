<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'LoginController.php');
$objLoginController = new UserRegistedController();

if ($objLoginController->logout()) {
    header("Location: ../ShoppingCart/default.htm"); /* Redirect browser */
    exit();
}