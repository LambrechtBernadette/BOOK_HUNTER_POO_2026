<?php


namespace App\Controllers;


use \PDO;
use \App\Models\BooksManager;
use \App\Models\AuthorsManager;


abstract class PagesController{
    
public static function homeAction(): void
{

    $books = BooksManager::findAll(3);

    $authors = AuthorsManager::findAll(3);


    global $title, $content;
    $title = "Latest Books & Authors";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
}
// attention ne pas oublier d'aller modifier le fichier composer.jason et faire composer dump-autoload dans le terminal