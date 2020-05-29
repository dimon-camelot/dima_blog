<?php
$login = 'Dima';
$password = '1234';

$enteredLogin = trim(strip_tags($_POST['login']));
$enteredPassword = trim(strip_tags($_POST['password']));

if (($enteredLogin == $login) AND ($enteredPassword == $password)) {
    header("Location: ../index.php?admin_block"); exit;
} else {
    echo 'Неправильная пара логин-пароль!';
}
?>