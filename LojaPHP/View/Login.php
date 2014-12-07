<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$msgErro="";
if(isset($_POST["submit"])){
    include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'LoginController.php');
    $objLoginController = new UserRegistedController();
    
    if($objLoginController->login($_POST["userID"],$_POST["password"])){
        header("Location: ../ShoppingCart/default.htm"); /* Redirect browser */
        exit();
    }else{
        $msgErro="Dados do login incorrectos";
    }
}

?>
<!doctype html>
<html>
    <head>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="Login.css" rel="stylesheet">
    </head>
    <body>
        <section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Log In na sua Loja de CD's</h1>
                    <form role="form" name="form1" method="POST" id="login-form" autocomplete="off">
                        <?php
                        if($msgErro==!""){
                            echo'<div class="alert alert-warning">';
                            echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
                            echo '<strong>Atenção! </strong>'.$msgErro;
                            echo '</div>';
                        }
                        ?>
                        <div class="form-group">
                            <label class="sr-only">Username</label>
                            <input name="userID" id="email" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <input type="submit" id="btn-login" name="submit" class="btn btn-custom btn-lg btn-block" value="Log in">
                    </form>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Powered by <strong>Loja CD's</strong></p>
            </div>
        </div>
    </div>
</footer>
    </body>
</html>
