<?php
header("Content-Type: text/plain");
function getQueryStringParameter($name)
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

$password = getQueryStringParameter('password');
if ($password === null)
{
    echo 'Password not found';
}
elseif (!ctype_alnum($password))
{
    echo 'Incorrect password. Use digits and latin letters only';
}
else
{
    $strength = 0;
    $len = strlen($password);
    $digitNumber = 0;
    $lowerNumber = 0;
    $upperNumber = 0;
    $lowerStrength = 0;
    $upperStrength = 0;
    $lettersOnly = 0;
    $digitsOnly = 0;
    $repeated = 0;
    for ($i = 0; $i < strlen($password); $i++)
    {
        if (ctype_digit($password[$i]))
        {
            $digitNumber++;
        }
        if (ctype_lower($password[$i]))
        {
            $lowerNumber++;
        }
        if (ctype_upper($password[$i]))
        {
            $upperNumber++;
        }
    }
    if ($lowerNumber != 0)
    {
        $lowerStrength = ($len - $lowerNumber) * 2;
    }
    if ($upperNumber != 0)
    {
        $upperStrength = ($len - $upperNumber) * 2;
    }
    if (ctype_alpha($password))
    {
        $lettersOnly = $len;
    }
    if (ctype_digit($password))
    {
        $digitsOnly = $len;
    }
    foreach (count_chars($password, 1) as $i => $val)
    {
        if ($val > 1) {
            $repeated = $repeated + $val;
        }
    }
//   echo "$len $digitNumber $lowerNumber $upperNumber $lettersOnly $digitsOnly $repeated";
    echo 'Password strength is ' . $strength = $len * 4 + $digitNumber * 4 + $lowerStrength + $upperStrength - $lettersOnly - $digitsOnly - $repeated;
}