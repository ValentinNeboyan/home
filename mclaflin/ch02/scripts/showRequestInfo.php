<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div ><H1>PHP & MySQL: The Missing Manual</H1></div>
<div > Пример 2.2 </div>

<div id="content">
    <p>Это все, что записано в массиве $_REQUEST:</p>


<?php

foreach ($_REQUEST as $key=> $value){

    echo "<p>".$key."=>".$value."<p/>";
}
?>

</div>
<div id="footer"></div>
</body>
</html>
