<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Suggestion.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Album.php');

class SuggestionController {
    
    private $objSuggestion;
    
    public function __construct() {
        $this->objSuggestion = new Suggestion();
    }
    
    public function getTopCD(){     
        foreach ($this->objSuggestion->getTopCD() as $albumID) {
            $album = new Album($albumID["AlbumID"]);
            if (is_object($album) && $album instanceof Album) {
                echo "<div>".$album->getTitle()." do Artista ".$album->getArtist()."</div>\xA";
            }
        }
    }
    
}


?>