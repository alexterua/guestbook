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
    <form class="form" action="" method="post">
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
</body>
</html>
