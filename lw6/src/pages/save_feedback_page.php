<?php
function saveFeedbackToFile(string $email): void
{
    $dir = "../data/";
    if (!file_exists($dir))
    {
        mkdir($dir, 0777, false);
    }
    $emailLower = strtolower($email);
    $filename = "$dir$emailLower.txt";
    file_put_contents($filename, json_encode($_POST));
}

function saveFeedbackPage(): void
{
    $email = getPostParameter('email');
    $name = getPostParameter('name');

    if (checkEmail($email) && checkName($name))
    {
        saveFeedbackToFile($email);
        $args = [
            'name' => null,
            'email' => null,
            'country' => null,
            'gender' => null,
            'message' => null
        ];
        $args['save_message'] = 'Сообщение сохранено';
    }
    else
    {
        $args = $_POST;
        $args['save_message'] = 'Сообщение не сохранено';
        if (!checkEmail($email))
        {
            $args['email_error'] = 'error_field';
            $args['email'] = null;
        }
        if (!checkName($name))
        {
            $args['name_error'] = 'error_field';
            $args['name'] = null;
        }
    }
    renderTemplate('main.tpl.php', $args);
}

