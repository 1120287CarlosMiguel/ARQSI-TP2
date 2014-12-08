<?php
session_start();
if (isset($_SESSION["login"])) {
    ?>
    <!doctype html>
    <html ng-app="AngularStore">
        <head>
            <title>Loja Musica</title>

            <!-- jQuery, Angular -->
            <script src="../Library/jquery.min.js" type="text/javascript" ></script>
            <script src="../Library/angular.min.js" type="text/javascript"></script>

            <!-- Bootstrap -->
            <link href="../Library/Bootstrap/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css"/>

            <!-- AngularStore app -->
            <script src="js/product.js" type="text/javascript"></script>
            <script src="js/store.php" type="text/javascript"></script>
            <script src="js/shoppingCart.js" type="text/javascript"></script>
            <script src="js/app.js" type="text/javascript"></script>
            <script src="js/controller.js" type="text/javascript"></script>
            <link href="css/style.css" rel="stylesheet" type="text/css"/>
        </head>

        <body>

            <!-- 
                bootstrap fluid layout
                (12 columns: span 10, offset 1 centers the content and adds a margin on each side)
            -->
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span10 offset1">
                        <div style="background-color:#2E8BCC;">
                            <h1 style="color: white">
                                <img src="img/logotipo.png" height="75" width="75" alt="logo" style="margin-left: 140px"/>
                                A sua Loja de Musica 
                            </h1>
                            <div style="margin-left: 30px">
                                <spam class="text-info" style="color: white">
                                    Bem-vindo <?php echo $_SESSION["login_Name"] . " " . $_SESSION["login_LastName"]; 
                                    if($_SESSION["login_Permissions"]=="1"){
                                            echo " <a style='color: white' href='../View/Catalogo.php'>  Consultar Catalogo</a>";
                                        } ?><br />
                                </spam>
                                <spam><a href="../View/Logout.php" style="color: white">Logout</a></spam>
                            </div>
                        </div>
                        <div ng-view></div>
                    </div>
                </div>
            </div>
            
            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span10 offset1">
                        <div style="background-color:#2E8BCC; text-align: center;">
                            <?php
                            include_once '../View/SuggestionTopCD.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-left: 300px;">
                <iframe src="arqsi-last.fm/trabalho1.html" width="600" height="600" frameBorder="0" style="overflow-x: hidden; overflow-y: hidden;"></iframe>
            </div>


        </body>
    </html>

    <?php
} else {
    echo "<div align='center'><h1>Acesso Negado</h1>";
    echo "<div><img src='../img/magic-word.gif'></div>";
    echo "<h3><a href='../view/Login.php'>Fazer o Login</a></h3></div>";
}
?>