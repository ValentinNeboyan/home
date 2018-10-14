<?php
require '../../scripts/database_connection.php';
$user_id=$_REQUEST['user_id'];
$select_query="SELECT*FROM users WHERE user_id=".$user_id;
$result=mysqli_query($link, $select_query);
if ($result) {
    $row = mysqli_fetch_array($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $bio = preg_replace("/[\r\n]+/", "</p><p>", $row['bio']);
    $email = $row['email'];
    $facebook_url = $row['facebook_url'];
    $twitter_handle = $row['twitter_handle'];
// Превращение $twitter_handle в URL
    $twitter_url = "http://www.twitter.com/" .
        substr($twitter_handle, $position + 1);
// Для последующего добавления
    $user_image = "/еще/не/созданное_изображение.jpg";
} else {
    die("Ошибка обнаружения пользователя с ID {$user_id}");
}
?>


<html>
<head>
    <link href="../../css/phpMM.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div ><h1>PHP & MySQL: The Missing Manual</h1></div>
<div >Профиль</div>
<div id="content">
    <div class="user_profile">
        <h1><?php echo $first_name." ". $last_name; ?></h1>
        <p><img src="<?php echo $user_image;?>" class="user_pic" />
            <?php echo $bio;?></p>
        <p class="contact_info">Поддерживайте связь с <?php echo $first_name ?>:</p>
        <ul>
            <li>...
                <a href="<?php echo $email ?>">по электронной почте</a></li>
            <li>... путем
                <a href="<?php echo $facebook_url ?> ">посещения его страницы на
                    Facebook</a></li>
            <li>... путем <a href="<?php echo $twitter_url ?>">отслеживания его сообщений
                    в Twitter</a></li>
        </ul>
    </div>
</div>
<div></div>
</body>
</html>