<?php
header("Content-Type: text/plain");
function ObjectFromFile($filename)
{
    $file = file_get_contents($filename);
    return unserialize($file);
}

function getQueryStringParameter($name)
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

$email = getQueryStringParameter('email');
$filename = "data/$email.txt";
if (file_exists($filename))
{
    $surveyInfo = ObjectFromFile($filename);
    echo "First name: $surveyInfo[first_name]\n";
    echo "Last name: $surveyInfo[last_name]\n";
    echo "Email: $surveyInfo[email]\n";
    echo "Age: $surveyInfo[age]\n";
}
else
{
    echo "File for e-mail $email not found";
}
