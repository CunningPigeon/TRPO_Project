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
    <title>Редактирование заказа</title>
    <link rel="stylesheet" href="/css/update.css">
</head>

<body>
    <div class="text">
        <h1>Редактирование заказа</h1>
    </div>
    <div class="rows">
        <form action="php/updateTable.php" method="post">
            <div class="input-box">
                <input type="text" name="id" class="log_input" placeholder="id" value="<?= $booking['id'] ?>" readonly>
                <input type="text" name="surname" class="log_input" placeholder="Фамилия" value="<?= $booking['surname'] ?>" required>
                <input type="text" name="name" class="log_input" placeholder="Имя" value="<?= $booking['name'] ?>" required>
                <input type="text" name="patron" class="log_input" placeholder="Отчество" value="<?= $booking['patron'] ?>" required>
                <input type="text" name="num" class="log_input" placeholder="Номер стола" value="<?= $booking['numTable'] ?>" required>
                <input type="text" name="book" class="log_input" placeholder="Перечень заказа" value="<?= $booking['book'] ?>" required>
                <input type="text" name="book2" class="log_input" placeholder="Примечание" value="<?= $booking['book2'] ?>">
                <input type="text" name="cost" class="log_input" placeholder="Стоимость" value="<?= $booking['cost'] ?>" required>
                <input type="text" name="stat" class="log_input" placeholder="Статус" value="<?= $booking['status'] ?>" required>
                <input type="text" name="pers" class="log_input" placeholder="Официант" value="<?= $personal['surname']. " ". $personal['name']. " ". $personal['patron'] ?>">
                <input type="hidden" name="id_pers" value="<?= $personal['id'] ?>">

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