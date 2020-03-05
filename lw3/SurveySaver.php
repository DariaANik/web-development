<?php
header("Content-Type: text/plain");
function getQueryStringParameter($name)
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

function Object2File($obj, $filename)
{
    $str_value = serialize($obj);
    file_put_contents($filename, $str_value);
}

function ObjectFromFile($filename)
{
    $file = file_get_contents($filename);
    return unserialize($file);
}

function MergeFileInfo($array1, $array2)
{
    foreach ($array1 as $key => $value1)
    {
        if ($value1 != null)
        {
            $array2[$key] = $value1;
        }
    }
    return $array2;
}

$dir = "data/";
if (!file_exists($dir))
{
    mkdir($dir, 0777, false);
}
$email = getQueryStringParameter('email');
$firstName = getQueryStringParameter('first_name');
$lastName = getQueryStringParameter('last_name');
$age = getQueryStringParameter('age');
$surveyInfo = [
    'email' => $email,
    'first_name' => $firstName,
    'last_name' => $lastName,
    'age' => $age
];
if ($email === null)
{
    echo 'Please enter your email address';
    $emailCheck = false;
}
elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailCheck = true;
}
else {
    echo 'Email is incorrect';
    $emailCheck = false;
}
if ($emailCheck) {
    $filename = "data/$email.txt";
}
if (file_exists($filename)) {
    $infoFromFile = ObjectFromFile($filename);
    $infoRefreshed = MergeFileInfo($surveyInfo, $infoFromFile);
    Object2File($infoRefreshed, $filename);
}
if ((!file_exists($filename)) && ($emailCheck))
{
    Object2File($surveyInfo, $filename);
}