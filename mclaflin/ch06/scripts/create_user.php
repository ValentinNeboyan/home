<?php
require_once '../../scripts/database_connection.php';

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


$insert_sql = "INSERT INTO users (first_name, last_name, email, bio, facebook_url, twitter_handle)" .
   " VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$bio}', '{$facebook_url}', '{$twitter_handle}');";
// Вставка данных о пользователе в базу данных
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