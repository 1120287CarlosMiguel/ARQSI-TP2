angular.module('Catalogo', [])
  .controller('CatalogoController', function($scope,$http) {
                    
                    $scope.carrinho = new Array();
            
                    $scope.qntProdtuto = new Array();
                    
                    $scope.resposta = false;
                    
                    $scope.id = 0;
                    
                    $scope.editoraID = 0;
                    
                    $scope.getAlbuns = function () {
                                
                                var response = $http.get('../AJAX/IDEIEditoraAJAX.php?metodo=GetCatalogo');
                                
                                response.success(function(data, status, headers, config) {
                                    if(typeof data === 'string')
                                        $scope.mensagem = data;
                                    else
                                        $scope.albuns = data;
                                })
                                
                                response.error(function(data,status,headers,config) {
                                    $respostaJSON = data.title;
                                    $scope.mensagem = "Erro";
                                })
                    };
                    
                    $scope.changeQntProd = function (index,qnt) {
                        if(qnt > 0) {
                            if($scope.carrinho.indexOf($scope.albuns[index]) === -1)
                            {
                                $scope.carrinho.push($scope.albuns[index]);
                            }
                            $scope.qntProdtuto[$scope.albuns[index].Title] = qnt;
                        }
                        else
                        {
                            $scope.carrinho.splice($scope.carrinho.indexOf($scope.albuns[index]),1);
                            $scope.qntProdtuto[$scope.albuns[index].Title] = qnt;
                        }
                    }
                    
                    $scope.getTotal = function () {
                        var total = 0.0;
                        for(i=0;i<$scope.carrinho.length;i++) {
                            var precoUni = $scope.carrinho[i].Price;
                            total += precoUni * $scope.qntProdtuto[$scope.carrinho[i].Title];
                        }
                        
                        return total;
                    }
                    
                    $scope.removeAlbum = function (index) {
                        $scope.qntProdtuto.splice($scope.carrinho[index].Title);
                        $scope.carrinho.splice(index,1);
                    }
                    
                    $scope.checkoutCarts = function () {
                        $("#checkout").modal("show");
                        $("#checkout").css("z-index","1500");
                    }
                    
                    $scope.exitCheckout = function () {
                        $("#checkout").modal("hide");
                    }
                    
                    $scope.lojaCheckout = function () {
                        var produtos = "";
                        
                        for(i=0;i < $scope.carrinho.length; i++ ) {
                            
                            var response = $http.post("../AJAX/CatalogoLojaOrderCheckout.php", {albumID : $scope.carrinho[i].AlbumId,
                                                                                title : $scope.carrinho[i].Title,
                                                                                price : $scope.carrinho[i].Price,
                                                                                qnt : $scope.qntProdtuto[$scope.carrinho[i].Title],
                                                                                art : $scope.carrinho[i].Artist.Name,
                                                                                gen : $scope.carrinho[i].Genre.Name,
                                                                                image : $scope.carrinho[i].AlbumArtUrl,
                                                                                orderID : $scope.id});
                                                                            
                            response.success(function(data, status, headers, config) {
                                })
                             
                            response.error(function(data, status, headers, config) {
                                })
                          
                            
                        }
                    }
                    
                    $scope.insertEditoraOrder = function () {
                        var response = $http.get("../AJAX/CatalogoLojaOrderCheckout.php?metodo=newOrder");
                                                                            
                            response.success(function(data, status, headers, config) {
                                    $scope.id = data;
                                    $scope.lojaCheckout();
                                    $scope.exitCheckout();
                                })
                             
                            response.error(function(data, status, headers, config) {
                                return 0;
                            })
                        
                    }
                    
                    $scope.editoraOrderCheckOut = function () {
                        
                        total = $scope.getTotal();
                        
                        var response = $http.get("../AJAX/CatalogoEditoraOrderCheckout.php?metodo=NewOrder&Total="+total);
                        
                        response.success(function(data, status, headers, config) {
                                    $scope.editoraID = data;
                                    $scope.editoraCheckout();
                                })
                             
                        response.error(function(data, status, headers, config) {
                        })
                    }
                    
                    $scope.editoraCheckout = function () {
                        var produtos = "";
                        
                        for(i=0;i < $scope.carrinho.length; i++ ) {
                            
                            var response = $http.post("../AJAX/CatalogoEditoraOrderCheckout.php", {orderID : $scope.editoraID,
                                                                                                   albumID : $scope.carrinho[i].AlbumId,
                                                                                                   price : $scope.carrinho[i].Price * $scope.qntProdtuto[$scope.carrinho[i].Title],
                                                                                                   qnt : $scope.qntProdtuto[$scope.carrinho[i].Title]});
                                                                            
                            response.success(function(data, status, headers, config) {
                                })
                             
                            response.error(function(data, status, headers, config) {
                                })
                          
                            
                        }
                    }
                    
                    
          
              }
  );