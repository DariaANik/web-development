<?php
function getPostParameter(string $key): ?string
{
    return $_POST[$key] ?? null;
}

function getRequestMethod(): ?string
{
    return $_SERVER['REQUEST_METHOD'];
}
