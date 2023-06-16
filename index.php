<?php

include "Matches.php";
include "core/fetch.function.php";

$matches = null;

preg_match(Matches::isin->value, fetch_with_code('1rAMT') , $matches, PREG_OFFSET_CAPTURE);

var_dump($matches);