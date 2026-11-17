<?php

namespace App\Models;

use App\Models\Author;
use \Core\DB;

abstract class AuthorsManager {

public static function findOnebyId (int $id): Author
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
