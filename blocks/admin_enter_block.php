<?php

if((isset($_SESSION['isAdmin'])) && ($_SESSION["isAdmin"])){
    header("Location: index.php?admin_block"); exit;
} 
?>

<h1>Авторизуйтесь пожалуйста!</h1>

<form method="post" action="login_check.php">
    <input type="text" name="login" placeholder="Введите логин"><br>
    <input type="password" name="password" placeholder="Введите пароль"><br><br>
    <input type="submit" value="Войти">
</form>

