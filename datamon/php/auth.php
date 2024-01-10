<?php
session_start();
$mysqli = new mysqli("datamon", "root", "", "datamon");
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    exit();
}

$login = $_POST['login'];
$pass = $_POST['pass'];

$md5_pass = md5($pass);

$query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login`='{$login}' AND `pass` = '{$md5_pass}'");
if (mysqli_num_rows($query) == 1){
    $_SESSION['users'] = ['login' => $login];
    header("Location: /index.php");
} else{
    header("Location: /index.php");
}
?>