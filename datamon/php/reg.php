<?php
session_start();

$mysqli = new mysqli("datamon", "root", "", "datamon");
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    exit();
}

$surname = trim($_POST['surname']);
$name = trim($_POST['name']);
$patron = trim($_POST['patron']);
$post = trim($_POST['post']);
$land = trim($_POST['land']);
$tel = trim($_POST['tel']);
$mail = trim($_POST['mail']);
$city = trim($_POST['city']);
$street = trim($_POST['street']);
$house = trim($_POST['house']);
$apart = trim($_POST['apart']);
$login = trim($_POST['login']);
$pass = trim($_POST['pass']);
$P_pas = trim($_POST['P_pas']);
/*$patt = '~' .
        '/^(?:[1-9])\d{11}$|/' . //^(?:\+[1-9])\d{11}$|
        '/^(?:\+[1-9])\d{11}$|/' .
    '~';
$ps = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{7,30}/';
$str = "/^([А-Я]{1}[а-яё]{1,49}|[A-Z]{1}[a-z]{5,49})$/";
$stri = "/^([А-Я]{1}[а-яё]{1,49}|[A-Z]{1}[a-z]{1,49})$/";
if (preg_match($str, $surname)) {} 
else{
    echo "Найдены недопустимые символы или недопустимая длина в поле \"Фамилия\". Возможные символы для использования (нужны: А-Я, A-Z, а-я, a-z), длина (от 6 до 50 символов)";
    exit();
}
if (preg_match($stri, $name)) {} 
else{
    echo "Найдены недопустимые символы или недопустимая длина в поле \"Имя\". Возможные символы для использования (нужны: А-Я, A-Z, а-я, a-z), длина (от 2 до 50 символов)";
    exit();
}
if (preg_match($str, $patron)) {}
else{
    echo "Найдены недопустимые символы или недопустимая длина в поле \"Отчество\". Возможные символы для использования (нужны: А-Я, A-Z, а-я, a-z), длина (от 6 до 50 символов)";
    exit();
}
if (preg_match($str, $land)) {}
else{
    echo "Найдены недопустимые символы или недопустимая длина в поле \"Страна\". Возможные символы для использования (нужны: А-Я, A-Z, а-я, a-z), длина (от 6 до 50 символов)";
    exit();
}
if (preg_match("$^(?:[1-9])\d{11}$|", $tel)) {}
else{
    echo "Найдены недопустимые символы или недопустимая длина телефона. (Пример: 84951234567, 12 символов))";
    exit();
}
if (preg_match($str, $login)) {}
else{
    echo "Найдены недопустимые символы или недопустимая длина в поле \"Логин\". Возможные символы для использования (нужны: А-Я, A-Z, а-я, a-z), длина (от 6 до 50 символов)";
    exit();
}
if (preg_match($ps, $pass) || preg_match($ps, $P_pass)) {}
else{
    echo "Найдены недопустимые символы или недопустимая длина пароля. Возможные символы для использования (нужны: a-z, A-Z, 0-9), длина (от 7 до 30 символов)";
    exit();
}*/


if ($pass != $P_pas){
    echo("Пароли не совпадают");
}
$md5_pass = md5($pass);
//$pattern_phone = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';
$time = '08:00 — 18:00';
$time2 = '13:00 — 14:00';

$query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login`='{$login}'");
if (mysqli_num_rows($query) == 0) {
    mysqli_query($mysqli, "INSERT INTO `users` (`login`, `pass`) VALUES('{$login}', '{$md5_pass}')");
    mysqli_query($mysqli, "INSERT INTO `personal` (`surname`, `name`, `patron`, `post`, `tel`, `mail`, `city`, `street`, `house`, `apart`) VALUES('{$surname}', '{$name}', '{$patron}', '{$post}', '{$tel}', '{$mail}', '{$city}', '{$street}', '{$house}', '{$apart}')");
    mysqli_query($mysqli, "INSERT INTO `work` (`MonW`, `MonL`, `TueW`, `TueL`, `WedW`, `WedL`, `ThuW`, `ThuL`, `FriW`, `FriL`, `SatW`, `SatL`, `SunW`, `SunL`) VALUES('{$time}', '{$time2}', '{$time}', '{$time2}', '{$time}', '{$time2}', '{$time}', '{$time2}', '{$time}', '{$time2}', '{$time}', '{$time}', 'Выходной', 'Выходной')");
    
    header("Location: /staff.php");
    exit();
} else {
    echo("Ошибка: Данный логин занят другим пользователем");
    exit();
}

$mysqli->close();
?>
