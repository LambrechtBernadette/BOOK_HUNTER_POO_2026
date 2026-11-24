<?php

namespace App\Controllers;

use App\Models\AuthorsManager;
use App\Models\BooksManager;

abstract class AuthorsController
{
    public static function indexAction(): void
    {
        
        $title = 'Authors';
        $authors = AuthorsManager::findAll();


        global $title, $content;
        ob_start();
        include __DIR__ . '/../views/authors/index.php';
        $content = ob_get_clean();
    }

    public static function showAction(int $id): void
    {
        
        $author = AuthorsManager::findOneById($id);
       

        global $title, $content;
        $title = htmlspecialchars($author->firstname . ' ' . $author->lastname);
        ob_start();
        include __DIR__ . '/../views/authors/show.php';
        $content = ob_get_clean();
    }
}
