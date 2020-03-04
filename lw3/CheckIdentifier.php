<?php
header("Content-Type: text/plain");
function getQueryStringParameter($name)
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}
$identifier = getQueryStringParameter('identifier');
$flag = 0;
if ($identifier === null)
{
    $flag = 3;
}
elseif (!ctype_alpha($identifier[0]))
{
    $flag = 1;
}
elseif (!ctype_alnum($identifier))
{
    $flag = 2;
}

switch ($flag)
{
    case 0:
        echo "Identifier";
        break;
    case 1:
        echo "Not identifier. The first character is incorrect";
        break;
    case 2:
        echo "Not identifier. Contains incorrect characters";
        break;
    case 3:
        echo "Not found";
        break;
}