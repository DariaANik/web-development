<?php
function checkEmail(string $email): bool
{
    return ($email !== null) && (filter_var($email, FILTER_VALIDATE_EMAIL));
}

function checkName(string $name): bool
{
    $name = trim($name);
    return (preg_match('/^[a-zA-Zа-яА-Я][a-zA-Zа-яА-Я\-]*[a-zA-Zа-яА-Я]$/', $name) === 1);
}