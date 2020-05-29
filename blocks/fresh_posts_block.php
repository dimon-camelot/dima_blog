<?php

// достаем 4 поста из базы, начиная с самого свежего

$sql = "SELECT id, title, content, date_time, category_id FROM posts ORDER BY date_time DESC LIMIT 4";

$posts = makeSelectFromDB($link, $sql);


//вывод постов

foreach ($posts as $value) {

    echo "<h5>{$value['title']}</h5>";
    echo "<p>{$value['date_time']}</p>";
    echo "<p>{$value['content']}</p>";
    echo '<br>';
}
?>