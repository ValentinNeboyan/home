<?php
require_once '../../scripts/app_config.php';
require_once '../../scripts/database_connection.php';
$upload_dir=SITE_ROOT."uploads/profile_pics";
$image_fieldname="user_pic";

$php_errors = array(1 => 'Maximum file size in php.ini exceeded',
    2 => 'Maximum file size in HTML form exceeded',
    3 => 'Only part of the file was uploaded',
    4 => 'No file was selected to upload.');

$first_name=trim($_REQUEST['first_name']);
$last_name=trim($_REQUEST['last_name']);
$email=trim($_REQUEST['email']);
$facebook_url=str_replace("facebook.org", "facebook,com",trim($_REQUEST['facebook_url']));
$bio = trim($_REQUEST['bio']);
$position=strpos($facebook_url,"facebook.com");
if($position===false){
    $facebook_url="http://www.facebook.com/".$facebook_url;
}
$twitter_handle=trim($_REQUEST['twitter_handle']);
$twitter_url="http://www.twitter.com/";
$position=strpos($twitter_handle,"@");
if($position===false){
    $twitter_url=$twitter_url.$twitter_handle;
} else{
    $twitter_url=$twitter_url.substr($twitter_handle, $position+1);
}

// Проверка отсутствия ошибки при отправке изображения
($_FILES[$image_fieldname]['error'] == 0)
or handle_error("сервер не может получить выбранное вами изображение.",
    $php_errors($_FILES[$image_fieldname]['error']));

// Является ли этот файл результатом нормальной отправки?
@is_uploaded_file($_FILES[$image_fieldname]['tmp_name'])
/*or handle_error("вы попытались совершить безнравственный поступок. Позор!",
    "Запрос на отправку: файл назывался " .
    "'{$_FILES[$image_fieldname]['tmp_name']}'")*/;

// Действительно ли это изображение?
@getimagesize($_FILES[$image_fieldname]['tmp_name'])
/*or handle_error("вы выбрали файл для своего фото, " .
    "который не является изображением.",
    "{$_FILES[$image_fieldname]['tmp_name']} " .
    "не является файлом изображения.")*/;

// Присваивание файлу уникального имени
$now = time();
while (file_exists($upload_filename = $upload_dir . $now .
    '-' .
    $_FILES[$image_fieldname]['name'])) {
    $now++;
}

/*echo $upload_filename;
echo "<br />";
echo $_FILES[$image_fieldname]['tmp_name'];*/


// И наконец, перемещение файла на его постоянное место
//@move_uploaded_file($_FILES[$image_fieldname]['tmp_name'], $upload_filename)
/*or handle_error("возникла проблема сохранения вашего изображения " .
    "в его постоянном месте.",
    "ошибка, связанная с правами доступа при перемещении " .
    "файла в {$upload_filename}")*/;


/*$insert_sql = "INSERT INTO users (first_name, last_name, email, bio, facebook_url, twitter_handle, user_pic)" .
   " VAL/*UES ('{$first_name}', '{$last_name}', '{$email}', '{$bio}', '{$facebook_url}', '{$twitter_handle}', '{$upload_filename}');";*/
// Вставка данных о пользователе в базу данных

/*$insert_sql = "INSERT INTO users (first_name, last_name, email, bio, facebook_url, twitter_handle )" .
    " VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$bio}', '{$facebook_url}', '{$twitter_handle}');";*/



$user_id = mysqli_insert_id($link);

$image=$_FILES[$image_fieldname];
$image_filename=$image['name'];
$image_info=getimagesize($image['tmp_name']);
$image_mime_type=$image_info['mime'];
$image_size=$image['size'];
$image_data=file_get_contents($image['tmp_name']);

/*$insert_image_sql="INSERT INTO images (filename, mime_type, file_size, image_data)".
    "VALUES ('{$image_filename}', '{$image_mime_type}', '{$image_size}', '{$image_data}')";*/

$insert_image_sql = sprintf("INSERT INTO images (filename, mime_type, file_size, image_data) " .
    "VALUES ('%s', '%s', %d, '%s');",
    mysqli_real_escape_string($link, $image_filename),
    mysqli_real_escape_string($link, $image_mime_type),
    mysqli_real_escape_string($link, $image_size),
    mysqli_real_escape_string($link, $image_data));


mysqli_query($link, $insert_image_sql)
or die(mysqli_error($link));

$insert_sql = sprintf("INSERT INTO users (first_name, last_name, email, bio, facebook_url, twitter_handle, profile_pic_id) " .
    "VALUES ('%s', '%s', '%s', '%s', '%s', '%s','%d');",
    mysqli_real_escape_string($link, $first_name),
    mysqli_real_escape_string($link, $last_name),
    mysqli_real_escape_string($link, $email),
    mysqli_real_escape_string($link, $bio),
    mysqli_real_escape_string($link, $facebook_url),
    mysqli_real_escape_string($link, $twitter_handle),
    mysqli_insert_id($link));

mysqli_query($link, $insert_sql)
or die(mysqli_error($link));


header("Location: show_user.php?user_id=" . mysqli_insert_id($link));
exit();
?>



<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div ><H1>PHP & MySQL: The Missing Manual</H1></div>
<div > Пример 6.1 </div>


<div id="content"></div>

<p>Это запись той информации, которую вы отправили</p>
<p>
    Имя:<?php echo $first_name;?><br>
    Фамилия:<?php echo $last_name;?><br>
    Адрес электронной почты:<?php echo $email;?><br>
    URL-адрес Facebook:<a href="<?php echo $facebook_url;?>"><?php echo $facebook_url;?></a><br>
    Ссылка на Ваш Twitter-канал:<a href="<?php echo $twitter_url?>"> <?php echo $twitter_handle;?></a><br>
</p>

</div>

<div id="footer"></div>
</body>
</html>