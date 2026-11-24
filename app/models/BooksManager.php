<?php
namespace App\Models;
use Core\DB;
use \PDO;

abstract class BooksManager {

public static function findOneById(int $id): Book
{
    $sql = "SELECT b.*, ROUND(AVG(un.note), 1) AS notation
            FROM books b
            LEFT JOIN users_notations un ON un.book_id = b.id
            WHERE b.id = :id
            GROUP BY b.id";
    $rs = DB::getConnexion()->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchObject(Book::class);
}

public static function findAll(int $limit = 9): array
{

$sql = "SELECT b.*, ROUND(AVG(un.note),1) AS notation
        FROM books b
        LEFT JOIN users_notations un ON un.book_id = b.id
        GROUP BY b.id
        ORDER BY ROUND(AVG(un.note),1)DESC
        LIMIT :limit;";

    //$rs = $connexion->prepare($sql);
    $rs = DB::getConnexion()->prepare($sql);
    //avant on avait $connexion il venait du fichier connexion dans Core
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_CLASS, Book::class);
    // au lieu de mettre FETCH ASSOC FETCH_CLASS... tableau renvoi des objets de type Book au lieu d'un tableau d'objets associatifs et FETCH_CLASS, Book::class fait l'hydratation

}

public static function findAllByAuthorId(int $id): array

{

    $sql = "SELECT * 
            FROM books  
            WHERE author_id = :id
            ORDER BY publicated_at DESC;";

    $rs = DB::getConnexion()->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_CLASS, Book::class);

}

}
