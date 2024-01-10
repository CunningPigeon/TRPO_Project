<?php 
session_start();
$login = $_SESSION['users']['login']; 

$mysqli = new mysqli("datamon", "root", "", "datamon");
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    exit();
}

$query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login`= '{$login}'");
$id = mysqli_fetch_assoc($query);



if(!empty($_FILES['img_upload']['tmp_name'])) $img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));

$Pquery = mysqli_query($mysqli, "SELECT * FROM `images` WHERE `id`= '{$id['id']}'");

if (mysqli_num_rows($Pquery) == 1){
    mysqli_query($mysqli, "UPDATE `images` SET `image` = '{$img}' WHERE `images`.`id` = '{$id['id']}'");
} else{
    mysqli_query($mysqli, "INSERT INTO `images` (`id`, `image`) VALUES('{$id['id']}', '{$img}')");
}

header("Location: /cabinet.php");
?> 