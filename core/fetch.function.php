<?php

/**
 * @param string $code
 * @return string
 */
function fetch_with_code(string $code): string
{
    return file_get_contents('https://www.boursorama.com/cours/'.$code.'/');
}

function curl_with_code(string $code): string
{
    $url = 'https://www.boursorama.com/cours/' . $code . '/';

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $result = curl_exec($curl);

    if ($result === false) {
        $error = curl_error($curl);

        var_dump($error);
        // Gérer l'erreur de cURL
        return $error;
    } else {
        // Traiter le contenu HTML récupéré
        return $result;
    }
}