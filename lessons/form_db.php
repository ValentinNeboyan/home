<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма для БД</title>
</head>
<body>
Заполните поля для ввода в базу данных.
<br><br>
<form action="db_connect.php" method="post">
    <input type="text" name="name" placeholder="Введите имя">
    <input type="text" name="surname" placeholder="Введите фамилию">
    <input type="text" name="age" placeholder="Введите ваш возраст">
    <input type="submit" value="Отправить данные">
</form>

</body>
</html>
