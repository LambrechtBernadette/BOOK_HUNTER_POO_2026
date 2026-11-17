<?php


namespace App\Models;

//classe instanciable car j'aurai des "new" book

class Book {
public $id, $isbn, $title, $resume, $cover, $publicated_at, $created_at, $author_id, $category_id, $notation; 
 
private $author, $category, $tags;

public function __get(string $property): mixed {

    $setterName='set' .ucfirst($property);
    if(method_exists($this, $setterName)) $this->$setterName();
    return $this->$property;
    
}

private function setAuthor(): void{

$this->author= AuthorsManager::findOneById($this->author_id);

}

private function setCategory(): void{
    $this->category = CategoriesManager::findOneById
    ($this->category_id);    
}           

private function setTags(): void{
    $this->tags = TagsManager::findAllByBookId($this->id);
 
}           

}


// si pas de getter et private il faut faire un return



