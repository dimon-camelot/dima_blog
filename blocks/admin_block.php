<?php

if((isset($_SESSION['isAdmin'])) && ($_SESSION["isAdmin"])){
    echo "Вы вошли с правами администратора.";
} else {
    die('Вы не админ!');

}



?>

<h1>Админка</h1>
<a href="index.php?newpost">Создать новый пост</a>
