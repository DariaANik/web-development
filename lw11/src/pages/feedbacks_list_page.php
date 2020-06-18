<?php

function feedbacksListPage()
{
    $email = getPostParameter('email');
    if (checkEmail($email))
    {
        $email = strtolower($email);
        $feedbackArray = getFeedback($email);
        if ($feedbackArray !== null)
        {
            $args = $feedbackArray;
        } else {
            $args['email'] = $email;
            $args['error_message'] = 'not_found';
            $args['email_error'] = 'error_field';
        }
    } else {
        $args = [];
        $args['error_message'] = 'incorrect';
        $args['email_error'] = 'error_field';
    }
    renderTemplate('feedbacks.tpl.php', $args);
}

