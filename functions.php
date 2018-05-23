<?php

// Сохранить сообщение(запись)
function saveMessage() {
    // Принимает поля name и text из массива POST и формирует строку
    $str = $_POST['name'] . ' | ' . $_POST['text'] . ' | ' . date('Y-m-d H:i:s') . "\n***\n";
    // Записывает в файл
    file_put_contents(PATH, $str, FILE_APPEND);
}

// Получить сообщение(запись)
function getMessage() {
    return file_get_contents(PATH);
}

// Перевод строки сообщения(записи) в массив
function arrayMessage($messages) {
    $messages = explode("\n***\n", $messages);
    // Удалить последний пустой элемент массива
    array_pop($messages);
    // Перевернуть массив, чтобы последнее сообщение стало первым
    return array_reverse($messages);
}

// Распечатать массив
function printArray($array) {
    // true - вкл. буфферизации(возвращает результат вместо вывода в браузер)
    echo '<pre>' . print_r($array, true) . '</pre>';
}
// Разбивает строку в массив
function getFormatMessage($message) {
    return explode(' | ', $message);
}