<?php

namespace App\Models;

use App\Models;
use \Core\DB;

abstract class CategoriesManager {

public static function findOnebyId (int $id): Category
{
    $sql = "SELECT *
            FROM categories
            WHERE id = :id;";
    $rs = DB::getConnexion()->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchObject(Category::class);
}

}