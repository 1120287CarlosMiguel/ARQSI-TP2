<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$flagShowRegiste=TRUE;
$msgErro="";
if(isset($_POST["submit"])){
    include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'UserResgistedController.php');
    $objUserResgistedController = new UserRegistedController();
    
    if($objUserResgistedController->checkPostResgiter()){
        if($objUserResgistedController->register($_POST["username"], $_POST["password"], $_POST["name"], $_POST["lastName"])){
            echo "<div align='center'><h1>Registo com sucesso</h1>";
            echo "<div><img src='../img/Dancing_Banana.gif'></div>";
            echo "<h3><a href='Login.php'>Voltar ao Login</a></h3></div>";
            $flagShowRegiste=FALSE;
        }else{
            $msgErro="Erro a inserir os dados na base de dados";
        }
    }else{
        //deve prencher todos os campos
        $msgErro=$objUserResgistedController->getMsgErroResgister();
    } 
}

if($flagShowRegiste){
?>
<!doctype html>
<html>
    <head>


        <link href="../Library/Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <form name="form1" method="POST" >
            <div class="container-fluid">
                <section class="container">
                    <div class="container-page">				
                        <div class="col-md-6">
                            <h3 class="dark-grey">Registration</h3>
                            
                            <?php
                                if($msgErro==!""){
                                    echo'<div class="alert alert-warning">';

                                    echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';

                                    echo '<strong>Atenção! </strong>'.$msgErro;
                                    echo '</div>';
                                } 
                           ?>
                            <div class="form-group col-lg-12">
                                <label>Username</label>
                                <input type="" name="username" class="form-control" id="username" value="">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Nome</label>
                                <input type="" name="name" class="form-control" id="name" value="">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Apelido</label>
                                <input type="" name="lastName" class="form-control" id="lastName" value="">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" id="password" value="">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Email Address</label>
                                <input type="" name="" class="form-control" id="" value="">
                            </div>


                        </div>

                        <div class="col-md-6">
                            <h3 class="dark-grey">Terms and Conditions</h3>
                            <p>
                                A clicar em "Registar" esta acordar com os termos e condições da Loja de CDs, acorda tambem que a nota minima para este trabalho é um 16.
                            </p>
                            <p>
                                A expectativa deste trabalho é de receber um 20.
                            </p>
                            <p>
                                Neste site não existe dinheiro verdadeiro pelo que todas as compras seram virtuais, algo parecido com o monopolio mas ate o monopolio é mais real porque tem notas falsas em papel.
                            </p>

                            <button type="submit" class="btn btn-primary" name="submit">Registar</button>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </body>
</html>
<?php
} 
?>