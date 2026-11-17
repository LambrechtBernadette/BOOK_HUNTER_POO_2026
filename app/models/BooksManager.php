<?php
namespace App\Models;
use Core\DB;
use \PDO;

abstract class BooksManager {

public static function findAll(int $limit = 9): array
{

$sql = "SELECT books.*
        FROM books
        ORDER BY books.created_at DESC
        LIMIT :limit;";

    //$rs = $connexion->prepare($sql);
    $rs = DB::getConnexion()->prepare($sql);
    //avant on avait $connexion il venait du fichier connexion dans Core
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_CLASS, Book::class);
    // au lieu de mettre FETCH ASSOC FETCH_CLASS... tableau renvoi des objets de type Book au lieu d'un tableau d'objets associatifs et FETCH_CLASS, Book::class fait l'hydratation

}
}
