<?php

function getQueryStringParameter(string $name): ?string
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

function checkIdent(string $identifier): int
{
    if (!ctype_alpha($identifier[0]))
    {
        $value = 1;
    }
    elseif (!ctype_alnum($identifier))
    {
        $value = 2;
    }
    else
    {
        $value = 3;
    }
    return $value;
}
header("Content-Type: text/plain");
$identifier = getQueryStringParameter('identifier');
$value = 0;
if ($identifier)
{
    $value = checkIdent($identifier);
}

switch ($value)
{
    case 0:
        echo "Identifier not found";
        break;
    case 1:
        echo "Not identifier. The first character is incorrect";
        break;
    case 2:
        echo "Not identifier. Contains incorrect characters";
        break;
    case 3:
        echo "Identifier";
        break;
}