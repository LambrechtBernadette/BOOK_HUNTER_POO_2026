<?php

namespace App\Models;

use \PDO;
use Core\DB;

abstract class TagsManager {

public static function findAllByBookId(int $id): array

{
    $sql = "SELECT t.*
            FROM tags t
            JOIN books_has_tags bht ON bht.tag_id = t.id
            WHERE bht.book_id = :id;";
    $rs = DB::getConnexion()->prepare($sql);
    $rs ->bindvalue(':id', $id, PDO::PARAM_INT);
    $rs ->execute();

    return $rs->fetchAll(PDO::FETCH_CLASS, Tag::class);


}



}