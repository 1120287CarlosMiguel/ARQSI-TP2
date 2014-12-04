angular.module('Catalogo', [])
  .controller('CatalogoController', function($scope,$http) {
                    
                    $scope.carrinho = new Array();
                    
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
                            prod = new Array($scope.albuns[index],qnt);
                            $scope.carrinho[index] = prod;
                        }
                        else
                        {
                            $scope.carrinho.splice(index,1);
                        }
                    }
                    
                    $scope.checkoutCarts = function () {
                        $("#checkout").modal("show");
                        $("#checkout").css("z-index","1500");
                    }
          
              }
  );