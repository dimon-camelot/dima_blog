<?php

//устанавливаем формат даты_времени
$currentTime = date('Y-m-d H:i:s');

//вытаскиваем массив с категориями (для формы)
$sql = "SELECT id, title FROM categories";
$categories = makeSelectFromDB($link, $sql);

?>

<form method="post" action="newpost_creation.php">
    <h4>Выберите категорию</h4>
    <select name="category">
        <?php

        foreach ($categories as $category) {
            echo "<option value='{$category['id']}'>{$category['title']}</option>";
        }
        ?>
    </select>
    <h4>Введите заголовок</h4>
    <input type="text" name="title">
    <h4>Введите содержимое</h4>
    <textarea name="content" wrap="soft" style="width: 90%"></textarea>
    <h4>Дата поста</h4>
    <input type="text" name="date_time" value="<?= $currentTime ?>" readonly><br><br>
    <input type="submit" value="Сохранить">


</form>
