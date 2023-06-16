<?php
function fetch_with_code($code): bool|string
{
    return file_get_contents(`https://www.boursorama.com/cours/$code/`);
}
