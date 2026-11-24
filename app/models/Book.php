<?php


namespace App\Models;

//classe instanciable car j'aurai des "new" book

class Book {
private $id, $isbn, $title, $resume, $cover, $publicated_at, $created_at, $author_id, $category_id, $notation; 
 
private $author, $category, $tags;

//Getter magique: getter qui se lance quand j'essaie d'accéder à une propriété private ou je lance
//une propriété qui n'existe pas 

public function __get(string $property): mixed {

    $setterName='set' .ucfirst($property);
    if(method_exists($this, $setterName)) $this->$setterName();
    return $this->$property;
    
}

//dès qu'on a besoin d'un autre table que la principale du modèle, on crée un set 

private function setAuthor(): void {

$this->author= AuthorsManager::findOneById($this->author_id);

}

private function setCategory(): void{
    $this->category = CategoriesManager::findOneById($this->category_id);    
}           

private function setTags(): void{
    $this->tags = TagsManager::findAllByBookId($this->id);
 
}           

}


//


// si pas de getter et private il faut faire un return



