<?php

function database(): PDO
{
    static $connection = null;
    if ($connection === null)
    {
        $connection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    }
    return $connection;
}

function saveFeedback(array $feedback): void
{
    $sql = "INSERT INTO feedbacks SET
                name = :name,
                email = :email,
                country = :country,
                gender = :gender,
                message = :message";
    $stm = database() -> prepare($sql);
    $stm -> execute(array(':name' => $feedback['name'], ':email' => $feedback['email'],
                            ':country' => $feedback['country'],
                            ':gender' => $feedback['gender'],
                            ':message' => $feedback['message']));
}

function getFeedback(string $email): ?array
{
    $sql = "SELECT * FROM feedbacks WHERE email = :email";
    $stm = database() -> prepare($sql);
    $stm -> execute(array(':email' => $email));
    $stm -> setFetchMode(PDO::FETCH_ASSOC);
    $result = $stm -> fetch();
    if ($result)
    {
        return $result;
    }
    else
    {
        return null;
    }
}