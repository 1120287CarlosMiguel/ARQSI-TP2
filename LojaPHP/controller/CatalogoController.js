angular.module('Catalogo', [])
  .controller('CatalogoController', function($scope,$http) {
                    
                    $scope.qntProduto = new Array();
                    
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
                        $scope.qntProduto[index] = qnt;
                    }
          
              }
  );