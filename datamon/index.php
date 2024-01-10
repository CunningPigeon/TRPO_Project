<?php
include "php/db_connect.php";

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/modal_index.css">
</head>

<body>
    <div class="header">
        <div class="header_client_section">
            <div class="header_section">
                Новости
            </div>
            <div class="clientData headerButton">
                <div class="headerButton">
                    <?php
                    session_start();
                    ?>
                    <?php if ($_SESSION['users']  == '') : ?>
                        <a class="a1" id="myBtn">Войти</a>
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
                    <?php if (!$_SESSION['users']  == '') : ?>
                        <a class="a1" href="php/logout.php">Выйти</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- 
        <?php // else : ?>
                        <a class="a1" href="php/logout.php">Выйти</a>
                        -->
        <!-- Модальное окно -->
        <div id="myModal" class="modal">

            <!-- Модальное содержание -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Авторизация</h2>
                </div>
                <div class="modal-body">
                    <form action="php/auth.php" method="post" class="form" id="add-form">
                        <div class="input-box">
                            <input type="text" name="login" class="log_input" placeholder="Логин" required>
                        </div><!-- required      onsubmit="return false;"-->
                        <div class="input-box">
                            <input type="password" name="pass" class="log_input" placeholder="Пароль" required>
                        </div>
                        <div class="log_butt">
                            <button type="submit" class="log_butt_l log">Войти</button>
                        </div>
                    </form>
                </div>
                <script defer src="/js/ind_mod_auth.js"></script>
            </div>

        </div>

</body>

</html>