<?php

function filterPostdata($input): string
{
    return noSpecialCharacters(filter_var($input));
}

function noSpecialCharacters($input, $encoding = 'UTF-8'): string
{
    return htmlspecialchars($input, ENT_QUOTES, $encoding);
}


function validateEmail($input): bool
{
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}
