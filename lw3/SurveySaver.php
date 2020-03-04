<?php
function getQueryStringParameter($name)
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
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
//if (file_exists(data/$email.txt)) {
//    fopen("data/$email.txt", r+  )
//}
$surveyInfo = [
    'email' => $email,
    'first_name' => $firstName,
    'last_name' => $lastName,
    'age' => $age
];
echo $surveyInfo['last_name'] . $surveyInfo['age'];