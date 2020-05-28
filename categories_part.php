<?php

//подключаемся к БД
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

// Достаем данные по категориям

$sql = "SELECT id, title FROM categories";

$categories = makeSelectFromDB($link, $sql);

// закрываем подключение
mysqli_close($link);
echo "<h3>Категории:</h3>";
echo "<ul>";


//Рисуем категории

foreach ($categories as $category) {
    echo "<li>{$category['title']}</li>";
}

echo "</ul>";

?>
