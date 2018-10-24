<?php
//var_dump($_FILES);

$name_file=trim(mb_strtolower ($_FILES['file']['name']));
$tmp_name=$_FILES['file']['tmp_name'];
if (!file_exists('img')){
    mkdir('img');
}
$filename="img/$name_file";
move_uploaded_file($tmp_name, $filename);

if (file_exists($filename)&& !empty($_FILES)){

    echo "Файл ". $name_file. " успешно загружен";
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Работа с файлами</title>
</head>
<body>

<form  method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" >
    <input type="file" name="file">
    <input type="submit" value="Отправить">
    
</form>
<img src="<?=$filename?>" alt="">
</body>
</html>