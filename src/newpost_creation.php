<?php
include "bootstrap.php";

if ($_POST) {

    $sqlInsert = "INSERT INTO posts (title, content, date_time, category_id)
 VALUES ('$_POST[title]', '$_POST[content]', '$_POST[date_time]', '$_POST[category]')";

    if (mysqli_query($link, $sqlInsert)) {
        echo "Успешно создана новая запись";
            } else {
        echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<br>
<a href="../index.php?page=admin_home">Вернуться в Админку.</a>