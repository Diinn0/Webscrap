<?php

include "Matches.php";
include "core/fetch.function.php";

$result = [];

if (!empty($_GET['code']))
{
    $content = curl_with_code(htmlspecialchars($_GET['code']));
    foreach (Matches::cases() as $match)
    {
        $matches = null;
        preg_match($match->value, $content, $matches);

        if (isset($matches[1][0])) {
            $result[] = [$match->name, $matches[1]];
        }

    }

    var_dump($result);
}


