<?php

function saveFeedbackPage(): void
{
    $email = getPostParameter('email');
    $name = getPostParameter('name');
    $args['hash'] = 'message';
    if (checkEmail($email) && checkName($name))
    {
        $feedback = [
            'name' => $name,
            'email' => $email,
            'country' => getPostParameter('country'),
            'gender' => getPostParameter('gender'),
            'message' => getPostParameter('message')
        ];
        saveFeedback($feedback);
        $args = [
            'name' => null,
            'email' => null,
            'country' => null,
            'gender' => null,
            'message' => null
        ];
        $args['save_message'] = 'saved';
        $args['hash'] = 'message';
    }
    else
    {
        $args = $_POST;
        $args['save_message'] = 'not_saved';
        $args['hash'] = 'message';

        if (!checkEmail($email))
        {
            $args['email_error'] = 'error_field';
            $args['email'] = null;
            $args['hash'] = 'email';
        }
        if (!checkName($name))
        {
            $args['name_error'] = 'error_field';
            $args['name'] = null;
            $args['hash'] = 'name';
        }
    }
    renderTemplate('main.tpl.php', $args);
}

