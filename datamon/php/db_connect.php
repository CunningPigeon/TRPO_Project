<?php
//$db = mysqli_connect("omegatrak", "root", "", "register");
$mysqli = new mysqli("datamon", "root", "", "datamon");
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
$charset = 'utf8';
if (!$mysqli->set_charset($charset)) {
    echo "Ошибка установки кодировки UTF8 ";
    exit();
}
?>