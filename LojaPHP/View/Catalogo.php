<html ng-app="Catalogo">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-15"/>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
        <script src="../controller/CatalogoController.js"></script>
        <link href="../Library/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body data-spy="scroll" data-target=".bs-sidebar">

        <div class="navbar  navbar-fixed-top navbar-default  bs-docs-nav">
            <div class="navbar-inner">
                <div class="container"><div class="row"><div class="col-sm-1 col-md-1 logo-position-1 col-logo">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle btn_navbar_custom btn btn-default">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button><a class="navbar-brand navbar-brand-link" href="/" style="color: #0066CC">IDEIEditora</a>		
                            </div>
                        </div>
                        <div class="col-sm-11 col-md-11 logo-position-1 col-nav">
                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">?</span>
                                        <input ng-model="tit" type="text" class="form-control" placeholder="Filtrar album...">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="navbar-top-fixed-space " style="margin-top: 50px;">
            <div class="clearfix"></div>
        </div>

        <div class="bs-docs-header bs-header" style="background: #0066CC" id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-lg-8">
                        <h1 style="color: #FFF">Cat�logo</h1>
                    </div>
                </div>	
            </div>
        </div>

        <div class="container m-top-20" ng-controller="CatalogoController" ng-init="getAlbuns()">
            <br/>
            <div class="row ">
                <div class="col-md-12">
                </div>							
            </div>
            <div class="row ">
                <div class="col-md-12">

                    <div class="cc-cart-links btn-group">
                        <ul class="nav nav-pills">
                            <li class="active">
                                <a href="#" ng-click="checkoutCarts()"><i class="glyphicon glyphicon-shopping-cart"></i> &nbsp;Ver Carrinho	&nbsp;&nbsp;&nbsp;<span class="badge pull-right">{{carrinho.length}}</span>
                                </a>
                            </li>
                        </ul>
                    </div><br><br>		
                </div>							
            </div>
            <br/>
            <div>
                <div id="container" ng-if="albuns.length != 0">
                    <div id="sidebar1">
                        <div class="row" >
                            <div class="col-sm-6 col-md-4" data-ng-repeat="alb in albuns | filter:tit track by $index">
                                <div class="thumbnail">
                                    <img ng-src="{{alb.AlbumArtUrl}}"/>
                                    <div class="caption">
                                        <h4>{{alb.Title}}</h4>
                                        <p>{{alb.Artist.Name}}</p>
                                        <p>{{alb.Genre.Name}}</p>
                                        <p>{{alb.Price| currency:"&euro;"}}</p>
                                        <p>Qnt: <input type="number" style="max-width: 50px" name="qntInp" ng-model="qnt$index"
                                                       min="0" ng-change="changeQntProd($index, qnt$index)" value="0" required></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div ng-if="mensagem.length != 0">{{mensagem}}</div>
                </div>
            </div>
            <div class="modal fade" id="checkout">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span></button>
                            <h4 class="modal-title"><b>Carrinho</b></h4>
                        </div>
                        <div class="modal-body" style="overflow-y: scroll; height: 300px">
                            <table ng-if="carrinho.length > 0" border="0" class="ccm-core-commerce-cart table" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th class="ccm-core-commerce-cart-name">Nome</th>
                                        <th class="ccm-core-commerce-cart-quantity">Quantidade</th>
                                        <th class="ccm-core-commerce-cart-quantity">Pre�o Uni.</th>
                                        <th class="ccm-core-commerce-cart-quantity">Pre�o</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>



                                    </tr>
                                    <tr ng-repeat="ord in carrinho">
                                        <td class="ccm-core-commerce-cart-thumbnail"><img class="ccm-output-thumbnail" src="{{ord.AlbumArtUrl}}"  width="94" height="90"></td>
                                        <td class="ccm-core-commerce-cart-name">{{ord.Title}}			</td>
                                        <td class="ccm-core-commerce-cart-quantity">{{qntProdtuto[ord.Title]}}</td>
                                        <td class="ccm-core-commerce-cart-price">{{ord.Price| currency:"&euro;"}}</td>
                                        <td class="ccm-core-commerce-cart-price">{{ord.Price * qntProdtuto[ord.Title]| currency:"&euro;"}}</td>
                                        <td class="ccm-core-commerce-cart-remove"><a href="#" onclick="remove">
                                                <img src="../Icons/1417740562_delete-16.png" width="16" height="16">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="ccm-core-commerce-cart-subtotal">
                                        <td colspan="3">&nbsp;</td>
                                        <td class="ccm-core-commerce-cart-price">{{getTotal() | currency:"&euro;"}}</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                </tbody></table>
                        </div>
                        <div class="modal-footer">
                            <input type="button" ng-click="exitCheckout()" style="float: left" value="< Return to Shopping" class="ccm-core-commerce-cart-buttons-checkout btn btn-default">
                            <input ng-if="carrinho.length > 0" ng-click="insertEditoraOrder();editoraOrderCheckOut()" type="button" style="float: right" class="ccm-core-commerce-cart-buttons-checkout btn btn-success" value="Check Out">
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <p><a href="../ShoppingCart/default.php">Voltar a loja</a></p>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../Library/Bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>