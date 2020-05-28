<?php

//функция выбирает данные из БД и отдает массив
function makeSelectFromDB($dbLink, $sql)
{
    $result = mysqli_query($dbLink, $sql);
    $array = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }

    return $array;
}

?>

