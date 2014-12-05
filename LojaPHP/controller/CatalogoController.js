angular.module('Catalogo', [])
  .controller('CatalogoController', function($scope,$http) {
                    
                    $scope.carrinho = new Array();
            
                    $scope.qntProdtuto = new Array();
                    
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
                            $scope.qntProdtuto[$scope.carrinho[index].Title] = qnt;
                        }
                        else
                        {
                            $scope.carrinho.splice($scope.carrinho.indexOf($scope.albuns[index]),1);
                            $scope.qntProdtuto[$scope.carrinho[index].Title] = qnt;
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
          
              }
  );