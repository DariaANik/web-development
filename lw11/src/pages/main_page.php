<?php
function mainPage(): void
{
    $args = [
        'name' => null,
        'email' => null,
        'country' => null,
        'gender' => null,
        'message' => null,
        'email_error' => null,
        'name_error' => null
    ];
    renderTemplate('main.tpl.php', $args);
}

