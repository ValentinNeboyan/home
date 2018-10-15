<?php

session_start();

if ($_SESSION['errors'] !== '') {
    echo $_SESSION['errors'][0];

    $_SESSION['errors'] = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<form action="/send-file.php" method="post" enctype="multipart/form-data">
<input type="file" name="image" accept="image/*">

<button>Send</button>
</form>

</body>
</html>