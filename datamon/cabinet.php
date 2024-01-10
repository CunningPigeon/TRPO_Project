<?php
include "php/db_connect.php";
session_start();
$login = $_SESSION['users']['login'];
$query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login`= '{$login}'");
$id = mysqli_fetch_assoc($query);
// print_r($id); 

$Pquery = mysqli_query($mysqli, "SELECT * FROM `personal` WHERE `id`= '{$id['id']}'");
$row = mysqli_fetch_assoc($Pquery);
//print_r($row);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>

    <link rel="stylesheet" href="/css/cabinet.css">
    <link rel="stylesheet" href="/css/modal_cabinet.css">
    <link rel="stylesheet" href="/css/header.css">
</head>

<body>
    <div class="header">
        <div class="header_client_section">
            <div class="header_section">
                Личный кабинет
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
                        <a class="a1" href="/index.php">
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

    <div class="information">
        <div class="image_pers">
            <?php

            $query_img = mysqli_query($mysqli, "SELECT * FROM `images` WHERE `id`= '{$id['id']}'");
            $img = mysqli_fetch_assoc($query_img);
            // print_r($img);
            $show_img = base64_encode($img['image']);
            ?>
            <img src="data:image/jpeg;base64, <?= $show_img ?>" alt="Avatar" class="avatar">
            <div class="function">
                <form action="php/uploadImg.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="img_upload"><input type="submit" name="upload" value="Загрузить">
                </form>
            </div>
        </div>
        <div class="m2">
            <div>
                <div class="row">
                    <div class="lef"><label>Фамилия</label></div>
                    <div class="rig"><?php echo ($row['surname']); ?></div>
                </div>
                <div class="row">
                    <div class="lef"><label>Имя</label></div>
                    <div class="rig"><?php echo ($row['name']); ?></div>
                </div>
                <div class="row">
                    <div class="lef"><label>Отчество</label></div>
                    <div class="rig"><?php echo ($row['patron']); ?></div>
                </div>
                <div class="row">
                    <div class="lef"><label>Телефон</label></div>
                    <div class="rig"><?php echo ("+" . $row['tel']); ?></div>
                </div>
                <div class="row">
                    <div class="lef"><label>E-mail</label></div>
                    <div class="rig"><?php echo ($row['mail']); ?></div>
                </div>
                <div class="row">
                    <div class="lef"><label>Адрес</label></div>
                    <div class="rig"><?php echo ("г. " . $row['city'] . ", ул. " . $row['street'] . ", д." .  $row['house'] . ", кв."  . $row['apart']); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="button">
        <?php
        if ($_SESSION['users']) : ?>
            <button class="button_item" onclick="document.location='/booking.php'">Заказы</button>

            <?php if ($id['access'] == 1) : ?>
                <button class="button_item" onclick="document.location='/staff.php'">Сотрудники</button>

            <?php endif ?>
        <?php endif ?>
    </div>
    <div class="tabl">
        <table class="table">
            <thead>

                <tr>
                    <th>День</th>
                    <th>Время работы</th>
                    <th>Перерыв</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $work = mysqli_query($mysqli, "SELECT * FROM `work` WHERE `id`= '{$id['id']}'");
                //получаем данные БД work
                $work = mysqli_fetch_all($work);
                // print_r($personal);

                foreach ($work as $wor) {
                }
                ?>
                <tr>
                    <td>Понедельник</td>
                    <td><?= $wor[1] /*Время работы понедельник*/ ?></td>
                    <td><?= $wor[2] ?></td>
                </tr>
                <tr>
                    <td>Вторник</td>
                    <td><?= $wor[3] /*Время работы понедельник*/ ?></td>
                    <td><?= $wor[4] ?></td>
                </tr>
                <tr>
                    <td>Среда</td>
                    <td><?= $wor[5] /*Время работы понедельник*/ ?></td>
                    <td><?= $wor[6] ?></td>
                </tr>
                <tr>
                    <td>Четверг</td>
                    <td><?= $wor[7] /*Время работы понедельник*/ ?></td>
                    <td><?= $wor[8] ?></td>
                </tr>
                <tr>
                    <td>Пятница</td>
                    <td><?= $wor[9] /*Время работы понедельник*/ ?></td>
                    <td><?= $wor[10] ?></td>
                </tr>
                <tr>
                    <td>Суббота</td>
                    <td><?= $wor[11] /*Время работы понедельник*/ ?></td>
                    <td><?= $wor[12] ?></td>
                </tr>
                <tr>
                    <td>Воскресенье</td>
                    <td><?= $wor[13] /*Время работы понедельник*/ ?></td>
                    <td><?= $wor[14] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>