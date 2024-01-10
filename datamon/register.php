<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/css/style_register.css">
</head>

<body>
    <div class="register">
        <form action="php/reg.php" method="post">
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
        </div>
            <button type="submit" class="reg_butt">Зарегистрироваться</button>
    </div>
    </form>

</body>

</html>