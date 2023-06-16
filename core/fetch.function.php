<?php
function fetch_with_code($code) {
    $resp = file_get_contents(`https://www.boursorama.com/cours/$code/`);
    return $resp;
}
