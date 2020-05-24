<?php

function feedbacksListPage()
{
    $email = getPostParameter('email');
    if (checkEmail($email))
    {
        $email = strtolower($email);
        $filename = "../data/$email.txt";
        if (file_exists($filename))
        {
            $feedback = file_get_contents($filename);
            $args = json_decode($feedback, true);
        } else {
            $args = [];
            $args['error_message'] = "Адрес $email не найден";
            $args['email_error'] = 'error_field';
        }
    } else {
        $args = [];
        $args['error_message'] = 'Введите корректный адрес электронной почты';
        $args['email_error'] = 'error_field';
    }
    renderTemplate('feedbacks.tpl.php', $args);
}

