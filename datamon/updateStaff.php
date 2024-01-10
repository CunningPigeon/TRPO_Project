<?php
include "php/db_connect.php";
// print_r($_GET);
$id_us = $_GET['id'];
$personal = mysqli_query($mysqli, "SELECT * FROM `personal` WHERE `id` = '{$id_us}'");
$personal = mysqli_fetch_assoc($personal);

$user = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `id` = '{$id_us}'");
$user = mysqli_fetch_assoc($user);

// print_r($personal);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование сотрудника</title>
    <link rel="stylesheet" href="/css/update.css">
    <link rel="stylesheet" href="/css/updateStaff.css">
</head>

<body>
    <div class="text">
        <h1>Редактирование сотрудника</h1>
    </div>
    <div class="rows">
        <form action="php/updateStaff.php" method="post">
            <div class="input-box">
                <input type="text" name="id" class="log_input" placeholder="id" value="<?= $personal['id'] ?>" readonly>
                <input type="text" name="surname" class="log_input" placeholder="Фамилия" value="<?= $personal['surname'] ?>" required>
                <input type="text" name="name" class="log_input" placeholder="Имя" value="<?= $personal['name'] ?>" required>
                <input type="text" name="patron" class="log_input" placeholder="Отчество" value="<?= $personal['patron'] ?>" required>
                <input type="text" name="post" class="log_input" placeholder="Должность" value="<?= $personal['post'] ?>" required>
                <input type="text" name="acc" class="log_input" placeholder="Уровень доступа" value="<?= $user['access'] ?>">
                <input type="text" name="tel" class="log_input" placeholder="Телефон" value="<?= $personal['tel'] ?>" required>
                <input type="text" name="mail" class="log_input" placeholder="E-mail" value="<?= $personal['mail'] ?>" required>
                <input type="text" name="city" class="log_input" placeholder="Город" value="<?= $personal['city'] ?>" >
                <input type="text" name="street" class="log_input" placeholder="Улица" value="<?= $personal['street'] ?>" >
                <input type="text" name="house" class="log_input" placeholder="Дом" value="<?= $personal['house'] ?>" >
                <input type="text" name="apart" class="log_input" placeholder="Квартира" value="<?= $personal['apart'] ?>" >
                <input type="hidden" name="id_pers" value="<?= $personal['id'] ?>">

                <div class="log_butt"><!-- required      onsubmit="return false;"-->
                    <button type="submit" class="log_butt_l log">Изменить</button>
                </div>
            </div>
    </div>

    </form>

</body>

</html>