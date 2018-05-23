<?php

header("Content-Type: text/html; charset=utf-8");
error_reporting(-1);

//====  Константы  ====//

// Имя/Путь файла/к файлу
const PATH = 'guestbook.txt';

require_once 'functions.php';

if (!empty($_POST)) {
    saveMessage();
    // Редирект, чтобы обновление страницы работало корректно
    header("Location: {$_SERVER['PHP_SELF']}");
    // Предотвращает выполнение последующего кода
    die;
}

//====  Считывание файла  ====//

$messages = getMessage();
$messages = arrayMessage($messages);

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1>Гостевая книга</h1>
    <form class="form" action="index.php" method="post">
        <p class="form__name">
            <label for="name">Ваше Имя:</label>
            <input type="text" name="name">
        </p>
        <p class="form__text">
            <label for="text">Оставить запись:</label>
            <textarea name="text" cols="30" rows="10"></textarea>
        </p>
        <input type="submit" class="btn" value="Разместить">
    </form>

    <h2>Оставленные записи:</h2>
    <div class="messages">
    <?php if (!empty($messages)): ?>
        <?php foreach ($messages as $message): ?>
            <?php $message = getFormatMessage($message); ?>
                <div class="message">
                    <p>Автор: <?=htmlspecialchars($message[0]); ?> |  Дата: <?=$message[2]; ?></p>
                    <?=nl2br(htmlspecialchars($message[1])); ?>
                </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</body>
</html>
