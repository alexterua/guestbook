<?php

// Экранирование данных
function clear() {
    global $db;
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($db, $value);
    }
}

// Сохранить сообщение(запись)
function saveMessage() {
    global $db;

    /*// Каждое текстовое поле нужно обрабатывать mysqli_real_escape_string()
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $text = mysqli_real_escape_string($db, $_POST['text']);*/
    clear();
    // Ключам name и text создает соответствующие переменные
    extract($_POST);
    // Запрос: вставляем в БД данные от пользователя
    $query = "INSERT INTO guestbook (name, text) VALUES ('$name', '$text')";
    // Выполнить запрос
    mysqli_query($db, $query);
}

// Получить сообщение(запись)
function getMessage() {
    global $db;
    $query = "SELECT * FROM guestbook ORDER BY id DESC";
    $res = mysqli_query($db, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}


// Распечатать массив
function printArray($array) {
    // true - вкл. буфферизации(возвращает результат вместо вывода в браузер)
    echo '<pre>' . print_r($array, true) . '</pre>';
}