<?php
include "php/db_connect.php";
// print_r($_GET);
$book_id = $_GET['id'];
$booking = mysqli_query($mysqli, "SELECT * FROM `booking` WHERE `id` = '{$book_id}'");
$booking = mysqli_fetch_assoc($booking);

$personal = mysqli_query($mysqli, "SELECT * FROM `personal` WHERE `id` = '{$booking['id_personal']}'");
$personal = mysqli_fetch_assoc($personal);
print_r($personal);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация сотрудника</title>
    <link rel="stylesheet" href="/css/update.css">
</head>

<body>
    <div class="text">
        <h1>Регистрация сотрудника</h1>
    </div>
    <div class="rows">
        <form action="php/updateTable.php" method="post">
            <div class="input-box">
                <input type="text" name="surname" class="log_input" placeholder="Фамилия" required>
                <input type="text" name="name" class="log_input" placeholder="Имя" required>
                <input type="text" name="patron" class="log_input" placeholder="Отчество" required>
                <input type="text" name="post" class="log_input" placeholder="Должность" required>
                <input type="text" name="tel" class="log_input" placeholder="Телефон" required>
                <input type="text" name="mail" class="log_input" placeholder="E-mail" required>
                <input type="text" name="city" class="log_input" placeholder="Город" required>
                <input type="text" name="street" class="log_input" placeholder="Улица" required>
                <input type="text" name="house" class="log_input" placeholder="Дом" required>
                <input type="text" name="apart" class="log_input" placeholder="Квартира" required>
                <input type="text" name="login" class="log_input" placeholder="Логин" required>
                <input type="password" name="pass" class="log_input" placeholder="Пароль" required>
                <input type="password" name="P_pas" class="log_input" placeholder="Подтверждение пароля" required>

                <div class="log_butt"><!-- required      onsubmit="return false;"
            <textarea type="text" name="book" class="log_input" placeholder="Перечень заказа" value="<?= $booking['book'] ?>" required></textarea>
        -->
                    <button type="submit" class="log_butt_l log">Изменить</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>