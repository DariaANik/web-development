<?php
header("Content-Type: text/plain");
function getQueryStringParameter($name)
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}
$strText = getQueryStringParameter('text');
if ($strText === null)
{
    echo 'No text found';
}
else
{
    $trimmed = trim($strText);
    $strText2 = preg_replace("~\s+~", " ", $trimmed);
    echo $strText2;
}
