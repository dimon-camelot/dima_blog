<?php

include "src\bootstrap.php";

// Доступные страницы

$availablePages = [

    // Админка
    'admin_enter' => 'blocks\main\blocks\admin_enter_block.php',
    'admin_home' => 'blocks\main\blocks\admin_block.php',
    'admin_new_post' => 'blocks\main\blocks\new_post_block.php',

    // Пользовательская часть
    'fresh_posts' => 'fresh_posts_block.php'

];

// Выбираем конкретную страницу

$mainBlock = $availablePages['fresh_posts'];

if (isset($_GET['page'])) {
    $requestedPage = $_GET['page'];

    if (array_key_exists($requestedPage, $availablePages)) {
        $mainBlock = $availablePages[$requestedPage];
    } else {
        header('HTTP/1.1 404 Not Found');
        echo "Страница, которую вы запрашиваете, не найдена";
        die();
    }
}

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
                <?php include $mainBlock; ?>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="sidebar my-box">
                <?php include "blocks/categories_block.php"; ?>
                <ul>
                    <br>
                    <li><a href="?admin_enter">Войти в админку</a></li>
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