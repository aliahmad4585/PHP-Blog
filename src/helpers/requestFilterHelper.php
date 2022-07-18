<?php

function filterPostdata($input, $encoding = 'UTF-8'): string
{
    return htmlspecialchars(filter_var($input), ENT_QUOTES, $encoding);
}

function validateEmail($input): bool
{
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}
