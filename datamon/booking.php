<?php
include "php/db_connect.php";
session_start();
$login = $_SESSION['users']['login'];
$query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login`= '{$login}'");
$row = mysqli_fetch_assoc($query);

//print_r($row);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказы</title>
    <link rel="stylesheet" href="/css/booking.css">
    <link rel="stylesheet" href="/css/header.css">
</head>

<body>
    <div class="header">
        <div class="header_client_section">
            <div class="header_section">
                Заказы
            </div>
            <div class="clientData">
                <div class="headerButton">
                    <?php if ($_SESSION['users']  == '') : ?>
                        <a class="a1" href="/login.php">Войти</a>
                    <?php else : ?>
                        <a class="a1" href="/cabinet.php">
                            <?php
                            if ($_SESSION['users']) {
                                echo ($_SESSION['users']['login']);
                            }
                            ?>
                        </a>
                    <?php endif ?>
                </div>
                <div class="headerButton">
                    <?php if ($_SESSION['users']  == '') : ?>
                        <!--<a  class="a1"  href="/register.php">Регистрация</a> -->
                    <?php else : ?>
                        <a class="a1" href="php/logout.php">Выйти</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <script src="js/sorttable.js"></script>
    <table class="table" id="unique_id">
        <thead>
            <tr>
                <th width="50">№</th>
                <th width="240">ФИО</th>
                <th width="50">Номер стола</th>
                <th>Перечень заказа</th>
                <th>Примечание</th>
                <th width="120">Стоимость</th>
                <th width="94">Статус</th>
                <?php
                if ($row['access'] == 1) { ?>
                    <th width="240">Обслуживал</th>
                <?php
                } ?>
                <th width="94"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_b = mysqli_query($mysqli, "SELECT * FROM `booking`");

            //получаем данные БД category users <th width="94">ф-ции</th>
            $book = mysqli_fetch_all($query_b);
            // print_r($book);

            $status = mysqli_query($mysqli, "SELECT * FROM `status`");
            //получаем данные БД category
            $status = mysqli_fetch_all($status);
            // print_r($status);

            $personal = mysqli_query($mysqli, "SELECT * FROM `personal`");
            //получаем данные БД personal
            $personal = mysqli_fetch_all($personal);
            // print_r($personal);

            $query = mysqli_query($mysqli, "SELECT * FROM `booking`");
            //получаем данные БД booking
            $query = mysqli_fetch_all($query);
            // print_r($query[0]);


            if ($row['access'] == 1) {

                foreach ($query as $quer) {
            ?>
                    <tr>
                        <td><?= $quer[0] /*Номер*/ ?></td>
                        <td><?= $quer[1] . " " . $quer[2] . " " . $quer[3] /*ФИО*/ ?></td>
                        <td><?= $quer[4] /*Номер стола*/ ?></td>
                        <td><?= $quer[5] /*Перечень заказа*/ ?></td>
                        <td><?= $quer[6] /*Примечание*/ ?></td>
                        <td><?= $quer[7] . " руб." /*Стоимость*/ ?></td>
                        <?php
                        foreach ($status as $stat) {
                            if ($stat[0] == $quer[8]) {
                                echo "<td>" . $stat[1] . "</td>";
                            } /*Статус заказа */
                        }
                        ?>
                        <td>
                            <?php

                            foreach ($personal as $pers) {
                                if ($pers[0]  == $quer[9]) {
                                    echo $pers[1] . " " . $pers[2] . " " . $pers[3];
                                    break;
                                }
                                /*Обслуживал*/
                            }
                            ?>
                        </td>
                        <td>
                            <div class="function">
                                <a href="updateBook.php?id=<?= $quer[0] ?>">Изменить</a>
                                <a href="php/deleteTable.php?id=<?= $quer[0] ?>">Удалить</a>
                            </div>
                        </td>
                    </tr>
                <?php }
            } else {
                $stat = 1;
                $query = mysqli_query($mysqli, "SELECT * FROM `booking` WHERE  `status` != {$stat}");
                //получаем данные БД booking
                $query = mysqli_fetch_all($query);
                // print_r($query);

                foreach ($query as $quer) {
                } ?>
                <tr>
                    <td><?= $quer[0] /*Номер*/ ?></td>
                    <td><?= $quer[1] . " " . $quer[2] . " " . $quer[3] /*ФИО*/ ?></td>
                    <td><?= $quer[4] /*Номер стола*/ ?></td>
                    <td><?= $quer[5] /*Перечень заказа*/ ?></td>
                    <td><?= $quer[6] /*Примечание*/ ?></td>
                    <td><?= $quer[7] /*Стоимость*/ ?></td>
                    <?php
                    foreach ($status as $stat) {
                        if ($stat[0] == $quer[8]) {
                            echo "<td>" . $stat[1] . "</td>";
                        } /*Статус заказа*/
                    }
                    ?>
                    <td>
                        <div class="function">
                            <a href="updateBook.php?id=<?= $quer[0] ?>">Изменить</a>
                            <a href="php/deleteTable.php?id=<?= $quer[0] ?>">Удалить</a>
                        </div>
                    </td>
                <?php } ?>
                </tr>
        </tbody>
    </table>
</body>

</html>