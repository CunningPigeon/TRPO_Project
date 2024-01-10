<?php
session_start();

$mysqli = new mysqli("datamon", "root", "", "datamon");
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    exit();
}
$login = $_SESSION['users']['login'];

$query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login`= '{$login}'");
$row = mysqli_fetch_assoc($query);

if ($row['access'] == 1){
    $Pquery = mysqli_query($mysqli, "SELECT * FROM `personal` WHERE `id`= '{$row['id']}'");
    $Prow = mysqli_fetch_assoc($Pquery);

    $query = '';

    $id = $_GET['id'];

    //Отправляем запрос БД users с условием `id_users`= '$id_users' AND `id` = '$id'
    $query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `id`= '$id'");

    if (mysqli_num_rows($query) > 0) {
        mysqli_query($mysqli, "DELETE FROM `users` WHERE `users`.`id` = '{$id}'");
        mysqli_query($mysqli, "DELETE FROM `personal` WHERE `personal`.`id` = '{$id}'");
        mysqli_query($mysqli, "DELETE FROM `work` WHERE `work`.`id` = '{$id}'");
        mysqli_query($mysqli, "DELETE FROM `images` WHERE `images`.`id` = '{$id}'");
        header("Location: /staff.php");
        exit();
    } else{
        echo "Error";
        //print_r($id);
    }
}
?>