<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Formulario Geo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <style>
            .div {
                background-color: rgb(230,0,0);
                width: 300px;
                height: 500px;
                padding: 15px;
                margin: 25px;
            }
            .divSemCor {
                width:auto;
                height:30%;
                overflow:scroll;
                position: relative;
                overflow-x: hidden;
                overflow-y: auto;
                top:-80px;
            }

            #numberTracks {
                 width: 50px;                 
            }

            .AcordiaoLargura{
                width: 250px;
            }
            

            input{
                border-radius: 5px;
            }

            select {
                padding:3px;
                margin: 0;
                -webkit-border-radius:4px;
                -moz-border-radius:4px;
                border-radius:4px;
                -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
                -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
                box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
                background: #f8f8f8;
                color:#888;
                border:none;
                outline:none;
                display: inline-block;
                -webkit-appearance:none;
                -moz-appearance:none;
                appearance:none;
                cursor:pointer;
            }


            /* Acordiao*/

            /*  Basic stucture
            =====================*/
            #accordion{margin:100px auto;width:280px;}
            #accordion ul{list-style:none;margin:0;padding:0;}
            .accordion{display:none;}
            .accordion:target{display:block;}
            #accordion ul li a{text-decoration:none;display:block;padding:10px;}
            .accordion{padding:2px;}





            /*  Colors 
            ====================*/
            #accordion ul{
                /*box-shadow*/
                -webkit-box-shadow:0 4px 5px #BDBDBD;
                -moz-box-shadow:0 4px 5px #BDBDBD;
                box-shadow:0 4px 5px #BDBDBD;
                /*border-radius*/
                -webkit-border-radius:5px;
                -moz-border-radius:5px;
                border-radius:5px;
            }
            #accordion ul li a{
                background: #fff;
                border-bottom: 1px solid #E0E0E0;
                color: #999;
                width: 250px;
            }
            .accordion{
                width:auto;
                background:#fdfdfd;
                color:#999;
            }
            .accordion:target{
                border-top:4px solid #999999;
				border-bottom: 4px solid #999999;
            }
			
			.paragrafoEstrutura{

                padding: 10px 5px; 
                background: #dddddd;
                width: 300px;
                border-radius: 25px;
            }
			
			.paragrafoLista{
				border-style: solid;
   				border-width: 1px;
				top:-80px;
			}
			
			.imagemLista{
				width:21px;
				height:21px;
			}

        </style>
    </head>
    <body><div class="div">
            <p align="center" class="paragrafoEstrutura"><img src="lastfm_logo@2x.png" alt=""/></p>

            <div align="right" class="paragrafoEstrutura" style="padding: 10px 10px">
                <form action="geo.php" method="get">
                    Cidade <input type="text" name="location"><br>
                    Distancia (km) <input type="number" name="distancia" value="5"><br>
                    Limite resultados <input type="number" name="limit" value="10"><br><br>
                    <input type="submit" onclick="MakeXMLHTTPCallforTag()" value="Submit">
                </form>
            </div>


        </div>
    </body>
</html>