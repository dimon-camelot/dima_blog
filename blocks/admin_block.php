<?php

if(isset($_SESSION['isAdmin'])){
    var_dump($_SESSION['isAdmin']);
} else {
    die('Вы не админ!');
}



?>

<h1>Админка</h1>
<a href="index.php?newpost">Создать новый пост</a>
