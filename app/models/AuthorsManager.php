<?php

namespace App\Models;

use App\Models\Author;
use \Core\DB;

abstract class AuthorsManager {

public static function findAll(int $limit = 9): array
{
    $sql = "SELECT * 
            FROM authors
            ORDER BY created_at DESC
            LIMIT :limit;";

    $rs = DB::getConnexion()->prepare($sql);
    $rs->bindValue(':limit', $limit, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_CLASS, Author::class);
}

public static function findOneById(int $id): Author
{
    $sql = "SELECT *
            FROM authors
            WHERE id = :id;";
    $rs = DB::getConnexion()->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchObject(Author::class);
}




}
