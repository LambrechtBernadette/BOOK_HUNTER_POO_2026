<?php


namespace App\Models;

//classe instanciable car j'aurai des "new" book

class Book{
public $id, $isbn, $title, $resume, $cover, $publicated_at, $created_at, $author_id, $category_id; 
 
public $author, $category, $tags;
    
}


// si pas de getter et private il faut faire un return



