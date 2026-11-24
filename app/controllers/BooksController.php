<?php
namespace App\Controllers;
use \App\Models\BooksManager;

abstract class BooksController {

public static function indexAction()
{
    $books = BooksManager::findAll();
    
    GLOBAL $title, $content;
    $title = "Books";
    ob_start();
    include __DIR__ . '/../views/books/index.php';
    $content = ob_get_clean();

}

public static function showAction(int $id): void
{

    $book = BooksManager::findOneById($id);

    GLOBAL $title, $content;
    $title = $book->title;
    ob_start();
    include __DIR__ . '/../views/books/show.php';
    $content = ob_get_clean();

}

}
