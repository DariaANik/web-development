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
$surveyInfo = [
    'email' => $email,
    'first_name' => getQueryStringParameter('first_name'),
    'last_name' => getQueryStringParameter('last_name'),
    'age' => getQueryStringParameter('age')
];
if ($email === null)
{
    echo 'Please enter your email address';
    $emailCheck = false;
}
elseif (preg_match("~.*[+|<\\\>\"?*:/].*~", $email) > 0) //наличие символов, которые не могут быть в имени файла
{
    $emailCheck = false;
    echo 'Email is incorrect';
}
elseif (filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $emailCheck = true;
    echo 'Email ok';
}
else {
    $emailCheck = false;
    echo 'Email is incorrect';
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
