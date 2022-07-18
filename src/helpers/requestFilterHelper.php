<?php

function filterPostdata($input, $encoding = 'UTF-8'): string
{
    return htmlspecialchars(filter_var($input), ENT_QUOTES, $encoding);
}

function validateEmail($input): bool
{
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}

function isStrongPassword(string $password): bool
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        return false;
    }

    return true;
}
