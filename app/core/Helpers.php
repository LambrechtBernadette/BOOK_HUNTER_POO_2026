<?php

namespace Core;

abstract class Helpers
{
    public static function dateFormator(string $date, string $format = "d/m/Y"): string
    {
        return date($format, strtotime($date));
    }

    public static function truncate(string $text, int $length = 30): string
    {   //mb_strlen($text) compte le nombre réel de caractères (pas d'octets)
        if (mb_strlen($text) <= $length) {
            return $text;
        }
        //mb_substr($text, 0, $length) : coupe en toute sécurité à $length caractères réels, sans couper un accent en deux.
        return mb_substr($text, 0, $length) . '...';
    }

    public static function slugify(string $text): string
    {
        // 1. Remplacer les caractères accentués par leur équivalent non accentué
        $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);

        // 2. Mettre en minuscules
        $text = strtolower($text);

        // 3. Remplacer tout ce qui n'est pas une lettre, un chiffre ou un tiret par un tiret
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);

        // 4. Supprimer les tirets en début et fin de chaîne
        $text = trim($text, '-');

        return $text;
    }
   
}

