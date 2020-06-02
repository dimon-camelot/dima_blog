<?php
$page = 1;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}


$postsPerPage = 4; //постов на странице
$offSet = $postsPerPage * ($page - 1);


//достаем 4 поста из базы, начиная с самого свежего
$sql = "SELECT id, title, content, date_time, category_id FROM posts ORDER BY date_time DESC LIMIT $postsPerPage OFFSET $offSet";
$posts = makeSelectFromDB($link, $sql);

//вычисляем количество постов в базе
$sql = "SELECT id, title, content, date_time, category_id FROM posts";
$allPosts = makeSelectFromDB($link, $sql);
$totalPostsAmount = count($allPosts);

//вычисляем количество страниц для отображения постов
if ($totalPostsAmount % $postsPerPage) {
    $totalPagesAmount = intdiv($totalPostsAmount, $postsPerPage) + 1;
} else {
    $totalPagesAmount = $totalPostsAmount / $postsPerPage;
}

//вывод постов
foreach ($posts as $value) {

    echo "<a href='index.php?post_block&post_id={$value['id']}'><h5>{$value['title']}</h5></a>";
    echo "<p>{$value['date_time']}</p>";
    echo "<p>{$value['content']}</p>";
    echo '<hr>';
}

//Отрисовка ссылок пагинации
for ($i = 1; $i <= $totalPagesAmount; $i++) {
    echo "<a href='index.php?page={$i}'>$i </a>";
}

?>