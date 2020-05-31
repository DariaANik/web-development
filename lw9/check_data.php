<?php
function checkEmail(string $email): bool
{
    return ($email !== null) && (filter_var($email, FILTER_VALIDATE_EMAIL));
}

function checkName(string $name): bool
{
    $name = trim($name);
    return (preg_match('/^[A-Za-zА-Яа-я]+$/', $name) === 1);
}

$form = file_get_contents('php://input');
$form = json_decode($form, true);
$result = [];
$email = $form['email'] ?? '';
$name = $form['name'] ?? '';
if (checkEmail($email)) {
    $result['email'] = 'correct';
}
else
{
    $result['email'] = 'error';
}
if (checkName($name)) {
    $result['name'] = 'correct';
}
else
{
    $result['name'] = 'error';
}
echo json_encode($result);