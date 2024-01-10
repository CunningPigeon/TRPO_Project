<?php
include "php/db_connect.php";
session_start();
$login = $_SESSION['users']['login'];
$query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login`= '{$login}'");
$row = mysqli_fetch_assoc($query);
// $id = $id['id'];
// print_r($id); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сотрудники</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/staff.css">
    <link rel="stylesheet" href="/css/modal_staff.css">

</head>

<body>
    <div class="header">
        <div class="header_client_section">
            <div class="header_section">
                Сотрудники
            </div>
            <div class="clientData">
                <div class="headerButton">
                    <?php
                    session_start();
                    ?>
                    <?php if ($_SESSION['users']  == '') : ?>
                        <a class="a1" href="/login.php">Войти</a>
                    <?php else : ?>
                        <!--
                            <a class="a1" href="/index.php">Главная</a> -->
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
                    <?php else : ?>
                        <a class="a1" href="php/logout.php">Выйти</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <div class="button">
        <button class="button_item" id="myBtn">Добавить сотрудника</button>
        <?php
        include "modal_staff.php";
        ?>

    </div>
    <script src="js/sorttable.js"></script>
    <table class="table" id="unique_id">
        <thead>
            <tr>
                <th width="50">№</th>
                <th width="200">ФИО</th>
                <th width="130">Должность</th>
                <th width="130">Телефон</th>
                <th width="180">E-mail</th>
                <th width="220">Адрес</th>
                <th width="90">Логин</th>
                <th width="200">График работы</th>
                <!--<th width="120">Пароль</th> -->
                <th width="94"></th>
            </tr>
        </thead>
        <tbody>
            <?php

            $personal = mysqli_query($mysqli, "SELECT * FROM `personal`");
            //получаем данные БД personal
            $personal = mysqli_fetch_all($personal);
            // print_r($personal);

            $users = mysqli_query($mysqli, "SELECT * FROM `users`");
            //получаем данные БД booking
            $users = mysqli_fetch_all($users);
            // print_r($users);

            $work = mysqli_query($mysqli, "SELECT * FROM `work`");
            //получаем данные БД booking
            $work = mysqli_fetch_all($work);
            // print_r($users);



            if ($row['access'] == 1) {

                foreach ($personal as $pers) {
            ?>
                    <tr>
                        <td><?= $pers[0] /*Номер*/ ?></td>
                        <td><?= $pers[1] . " " . $pers[2] . " " . $pers[3] /*ФИО*/ ?></td>
                        <td><?= $pers[4] /*Должность*/ ?></td>
                        <td><?= "+" . $pers[5] /*Телефон*/ ?></td>
                        <td><?= $pers[6] /*E-mail*/ ?></td>
                        <td><?= "г. " . $pers[7] . ", ул. " . $pers[8] . ", д." .  $pers[9] . ", кв."  . $pers[10]; /*Адрес*/ ?></td>
                        <td>
                            <?php
                            foreach ($users as $user) {
                                if ($pers[0]  == $user[0]) {
                                    echo $user[1];
                                    //echo "<td>" . $user[2] . "</td>";
                                    break;
                                }
                            } /*Логин*/
                            ?>
                        </td>
                        
                        <td>
                        <div class="work">
                                <?php
                                foreach ($work as $wor) {
                                    if ($pers[0]  == $wor[0]) {
                                        echo "Пн:" . $wor[1]. " | ". $wor[2];
                                        echo " Вт:" . $wor[3]. " | ". $wor[4];
                                        echo " Ср:" . $wor[5]. " | ". $wor[6];
                                        echo " Чт:" . $wor[7]. " | ". $wor[8];
                                        echo " Пт:" . $wor[9]. " | ". $wor[10];
                                        echo " Сб:" . $wor[11]. " | ". $wor[12];
                                        echo " Вс:" . $wor[13]. " | ". $wor[14];
                                        break;
                                    }
                                } /*График работы*/
                                ?>
                            </div>
                        </td>
                        
                        <td>
                            <div class="function">
                                <a href="updateStaff.php?id=<?= $pers[0] ?>">Изменить</a>
                                <a href="php/delete.php?id=<?= $pers[0] ?>">Удалить</a>
                            </div>
                        </td>
                <?php
                }
            }
                ?>
                    </tr>

        </tbody>
    </table>
</body>

</html>