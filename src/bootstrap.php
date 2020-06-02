<?php

//стартуем сессию
session_start();

//устанавливаем временную зону
date_default_timezone_set("Europe/Moscow");

//параметры подключения к БД
$host = 'localhost'; // адрес сервера
$database = 'dima_blog'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'root'; // пароль

//подключаемся к БД
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

//подключаем библиотеку с функциями
include "library.php";

?>
