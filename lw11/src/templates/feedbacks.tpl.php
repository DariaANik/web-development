<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сообщения</title>
    <link href="css/feedback_style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
    <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
    <div class="request_block">
    <h1 class="form_title">Просмотр сообщений</h1>
    <form class="form" method="POST">
        <label class="label required">Введите email</label>
        <input name="email" type="email" class="input_field <?php echo $args['email_error'] ?? null ?>" required="required">
        <button type="submit" class="button">Просмотреть</button>
    </form>
    <?php if ((getRequestMethod() === 'POST') && (!isset($args['email_error']))): ?>
        <h2 class="list_header">Данные:</h2>
        <ul class="list_text">
            <li>Email: <?=$args['email'] ?> </li>
            <li>Имя: <?=$args['name'] ?></li>
            <li>Страна:
                <?php if ($args['country'] === 'Russia') echo 'Россия'; ?>
                <?php if ($args['country'] === 'China') echo 'Китай'; ?>
                <?php if ($args['country'] === 'USA') echo 'США'; ?>
                <?php if ($args['country'] === 'UK') echo 'Великобритания'; ?>
                <?php if ($args['country'] === 'Germany') echo 'Германия'; ?>
            </li>
            <li>Пол: <?=($args['gender'] === 'male') ? 'мужской' : 'женский' ?></li>
            <li>Сообщение: <?=$args['message'] ?></li>
        </ul>
    <?php elseif (isset($args['email_error'])):?>
        <p class="label">
          <?php if ($args['error_message'] === 'incorrect') echo 'Введите корректный адрес электронной почты' ?>
          <?php if ($args['error_message'] === 'not_found') echo "Адрес {$args['email']} не найден" ?>
        </p>
    <?php endif;?>
    </div>
</body>
</html>