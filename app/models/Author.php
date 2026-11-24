<?php
namespace App\Models;

class Author {

public $id, $firstname, $lastname, $biography, $picture, $created_at;

public $notation;
private $books;

public function __get(string $property): mixed {

    $setterName='set' .ucfirst($property);
    if(method_exists($this, $setterName)) $this->$setterName();
    return $this->$property;
    
}

//private function setNotation()

//{
   // $this->notation = AuthorsManager::findNotationByAuthorId($this->id);


//}

private function setBooks(): void
{
    $this->books = BooksManager::findAllByAuthorId($this->id);
}




}

