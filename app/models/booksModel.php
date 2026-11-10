<?php
namespace App\Models\BooksModel;

use \PDO;

function findAll(PDO $connexion, int $limit = 9): array
{

$sql = "SELECT books.*,
               categories.name AS category_name,
               authors.firstname AS author_firstname,
               authors.lastname AS author_lastname
        FROM books
        JOIN categories ON categories.id = books.category_id
        JOIN authors ON authors.id = books.author_id
        ORDER BY books.created_at DESC
        LIMIT :limit;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);

}
