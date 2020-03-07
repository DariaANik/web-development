<?php
header("Content-Type: text/plain");
function getQueryStringParameter($name)
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}
$identifier = getQueryStringParameter('identifier');
if ($identifier === null)
{
    echo "Not found";
}
elseif (!ctype_alpha($identifier[0]))
{
    echo "Not identifier. The first character is incorrect";
}
elseif (!ctype_alnum($identifier))
{
    echo "Not identifier. Contains incorrect characters";
}
else
{
    echo "Identifier";
}