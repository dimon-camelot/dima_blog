<?php

function makeSelectFromDB($dbLink, $sql)
{
    $result = mysqli_query($dbLink, $sql);
    $array = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }

    return $array;
}

//подключаемся к БД
$host = 'localhost'; // адрес сервера
$database = 'dima_blog'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'root'; // пароль

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

// достаем 4 поста из базы, начиная с самого свежего

$sql = "SELECT id, title, content, date_time, category_id FROM posts ORDER BY date_time DESC LIMIT 3";

$posts = makeSelectFromDB($link, $sql);


// закрываем подключение
mysqli_close($link);


?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dima Blog - Главная страница</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .my-box {
            padding: 25px;
            border: solid 1px black;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="header my-box">
                <h1>Dima Blog</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="content my-box">

                <?php
                //вывод постов
                $i = 0;
                foreach ($posts as $value) {

                    echo "<h5>{$value['title']}</h5>";
                    echo "<p>{$value['date_time']}</p>";
                    echo "<p>{$value['content']}</p>";
                    echo '<br>';
                }
                ?>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="sidebar my-box">
                <h3>Категории:</h3>
                <ul>
                    <li>Категория 1</li>
                    <li>Категория 1</li>
                    <li>Категория 1</li>
                    <li>Категория 1</li>
                    <br>
                    <li><a href="admin_enter-page.php">Войти в админку</a></li>
                </ul>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="footer my-box">
                <p>
                    All rights are mine 2020 (c)
                </p>
            </div>
        </div>
    </div>

</div>

</body>
</html>