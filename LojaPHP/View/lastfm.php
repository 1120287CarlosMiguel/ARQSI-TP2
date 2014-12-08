<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    
    <!DOCTYPE html>
<html lang="en" ng-app="lastfm-app">
<head>
    <meta charset="utf-8">
    <title>Recent Tracks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap-responsive.min.css">
</head>
<body>
    <div class="container" ng-controller="RecentTracksController">
        <ul class="thumbnails">
            <li class="span4" ng-repeat="song in songs">
                <a class="thumbnail" href="{{song.url}}" title="{{song.artist['#text']}} - {{song.name}}" style="display: block;">
                    <div class="media">
                        <div class="pull-left" href="#">
                            <img class="media-object" src="{{song.image[2]['#text']}}">
                        </div>
                        <div class="media-body">
                            <strong>{{song.artist['#text']}}</strong><br />
                            {{song.name}}<br />
                            <em>{{song.date['#text']}}</em>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../Library/Bootstrap/css/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script>
    <script src="lastfm.js"></script>
</body>
</html>
