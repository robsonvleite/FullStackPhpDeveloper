<?php

/**
 * ##################
 * ###   STRING   ###
 * ##################
 */

/**
 * @param string $string
 * @return string
 */

function str_slug(string $string): string
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED); // Retirando todos os scripts que possam vir com a nossa string
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

    $slug = str_replace(["-----", "----", "---", "--"], "-",
                str_replace(" ", "-", 
                    trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))
                )
            );
    return $slug;
}

function str_studly_case(string $string): string
{
    $string = str_slug($string);
    $studlyCase = str_replace(" ", "", mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE));

    return $studlyCase;
}

function str_camel_case(string $string): string
{
    return lcfirst(str_studly_case($string)); // lcfirst — Torna minúsculo o primeiro caractere de uma string

}

function str_title(string $string): string
{
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
}

function str_limit_words(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if($numWords < $limit) {
        return $string;
    }

    $words = implode(" ", array_slice($arrWords, 0, $limit));
    return "{$words}{$pointer}";
}

function str_limit_chars(string $string, int $limit, string $pointer = "...")
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    if(mb_strlen($string) <= $limit) {
        return $string;
    }

    $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " "));
    return "{$chars}{$pointer}";
}