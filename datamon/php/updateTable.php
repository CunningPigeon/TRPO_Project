<?php

$mysqli = new mysqli("datamon", "root", "", "datamon");
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    exit();
}

$book_id = trim($_POST['id']);
$surname = trim($_POST['surname']);
$name = trim($_POST['name']);
$patron = trim($_POST['patron']);
$numTable = trim($_POST['num']);
$book = trim($_POST['book']);
$book2 = trim($_POST['book2']);
$cost = trim($_POST['cost']);
$status = trim($_POST['stat']);

$status = mysqli_query($mysqli, "SELECT * FROM `status` WHERE `name` = '{$status}'");
if (mysqli_num_rows($status) == 1)
{
    $status = mysqli_fetch_assoc($status);
    $status = $status['status'];
} else {
    $status = 1;
}




$pers = $_POST['pers'];
$id_pers = $_POST['id_pers'];

mysqli_query($mysqli, "UPDATE `booking` SET `surname` = '{$surname}', `name` = '{$name}', `patron` = '{$patron}', `numTable` = '{$numTable}', `book` = '{$book}', `book2` = '{$book2}', `cost` = '{$cost}', `status` = '{$status}' WHERE `booking`.`id` = '{$book_id}'");

header("Location: /booking.php");

?>