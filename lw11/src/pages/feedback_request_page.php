<?php

function feedbackRequestPage(): void
{
    renderTemplate('feedbacks.tpl.php', ['email_error' => null]);
}
