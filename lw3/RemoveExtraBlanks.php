<?php

function getQueryStringParameter(string $name): ?string
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

header("Content-Type: text/plain");
$strText = getQueryStringParameter('text');
if ($strText === null)
{
    echo 'No text found';
}
else
{
    $trimmed = trim($strText);
    $strTextNew = preg_replace("/\s+/", " ", $trimmed);
    echo $strTextNew;
}
