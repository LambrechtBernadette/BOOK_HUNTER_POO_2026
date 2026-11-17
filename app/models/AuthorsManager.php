<?php

namespace App\Models\AuthorsModel;

use \Core\DB;

abstract class AuthorsModels {

public static function findAll(): array
{
    $sql = "SELECT *
            FROM authors
            ORDER BY lastname ASC, firstname ASC;";
    $rs = DB::getConnexion()->query($sql);
    return $rs->fetchAll(\PDO::FETCH_CLASS, \App\Models\Author::class);
}

function findOneById(int $id): array
{
    $sql = "SELECT *
            FROM authors
            WHERE id = :id;";
    $rs = DB::getConnexion()->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
}
