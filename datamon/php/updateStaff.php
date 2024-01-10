<?php

$mysqli = new mysqli("datamon", "root", "", "datamon");
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    exit();
}

$id_us = trim($_POST['id']);
$surname = trim($_POST['surname']);
$name = trim($_POST['name']);
$patron = trim($_POST['patron']);
$post = trim($_POST['post']);
$acc = trim($_POST['acc']);
$tel = trim($_POST['tel']);
$mail = trim($_POST['mail']);
$city = trim($_POST['city']);
$street = trim($_POST['street']);
$house = trim($_POST['house']);
$apart = trim($_POST['apart']);

if ($acc == '')
{
    $acc = 0;
}


mysqli_query($mysqli, "UPDATE `personal` SET `surname` = '{$surname}', `name` = '{$name}', `patron` = '{$patron}', `post` = '{$post}', `tel` = '{$tel}', `mail` = '{$mail}', `city` = '{$city}', `street` = '{$street}', `house` = '{$house}', `apart` = '{$apart}' WHERE `personal`.`id` = '{$id_us}'");
mysqli_query($mysqli, "UPDATE `users` SET `access` = '{$acc}' WHERE `users`.`id` = '{$id_us}'");

header("Location: /staff.php");

?>