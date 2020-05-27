<?php

function makeSelectFromDB($dbLink, $sql)
{
    $result = mysqli_query($dbLink, $sql);

    $array = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }

    return $array;
}

date_default_timezone_set("Europe/Moscow");
$currentTime = date('Y-m-d H:i:s');



//подключаемся к БД
$host = 'localhost'; // адрес сервера
$database = 'dima_blog'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

// выполняем операции с базой данных

$sql = "SELECT id, title FROM categories";

$categories = makeSelectFromDB($link, $sql);
if($_POST) {


    $sqlInsert = "INSERT INTO posts (title, content, date_time, category_id)
 VALUES ('$_POST[title]', '$_POST[content]', '$_POST[date_time]', '$_POST[category]')";

    if (mysqli_query($link, $sqlInsert)) {
        echo "Успешно создана новая запись";
    } else {
        echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
    }
}


// закрываем подключение
mysqli_close($link);

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dima Blog - Добавить новый пост</title>

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
                <h1>Dima Blog - Добавить новый пост</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="content my-box">
                <form method="post" action="newpost-page.php">
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
                    <textarea name="content"  wrap="soft" style="width: 90%"></textarea>
                    <h4>Дата поста</h4>
                    <input type="text" name="date_time" value="<?=$currentTime?>" readonly><br><br>
                    <input type="submit" value="Сохранить">


                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sidebar my-box">
                <h3>Категории:</h3>
                <ul>
                    <?php

                    foreach ($categories as $category) {
                        echo "<li>{$category['title']}</li>";
                    }
                    ?>

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