<?php


// достаем  нужный пост из базы
$sql = "SELECT title, content, date_time, category_id FROM posts WHERE id = {$_GET['post_id']}";
$post = makeSelectFromDB($link, $sql);

//выводим пост
//воспользовался форычем, т.к. скопипастил с другой своей страницы, там вытягивается одна строка, так что пох
foreach ($post as $value) {

    echo "<h2>{$value['title']}</h2>";
    echo "<h5>{$value['date_time']}</h5>";
    echo '<hr>';
    echo "<p>{$value['content']}</p>";
}

?>
