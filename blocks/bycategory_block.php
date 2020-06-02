<?php

$categoryId = $_GET['category_id'];


// достаем 4 поста нужной категории из базы, начиная с самого свежего

$sql = "SELECT id, title, content, date_time, category_id FROM posts where category_id = $categoryId ORDER BY date_time DESC LIMIT 4";

$posts = makeSelectFromDB($link, $sql);


//вывод постов

foreach ($posts as $value) {

    echo "<a href='index.php?post_block&post_id={$value['id']}'><h5>{$value['title']}</h5></a>";
    echo "<p>{$value['date_time']}</p>";
    echo "<p>{$value['content']}</p>";
    echo '<hr>';
}
?>