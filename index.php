<?php

include "src/bootstrap.php";

//проверяем какой блок подключать в качестве основного
$mainBlock = 'blocks/fresh_posts_block.php';
if (isset($_GET['admin_enter'])) {
    $mainBlock = 'blocks/admin_enter_block.php';
}
if (isset($_GET['admin_block'])) {
    $mainBlock = 'blocks/admin_block.php';
}
if (isset($_GET['newpost'])) {
    $mainBlock = 'blocks/new_post_block.php';
}

if (isset($_GET['post_block'])) {
    $mainBlock = 'blocks/post_block.php';
}

if (isset($_GET['bycategory_block'])) {
    $mainBlock = 'blocks/bycategory_block.php';
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
                <h1><a href="index.php" title="На главную">Dima Blog</a></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="content my-box">
                <?php include "$mainBlock";?>
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