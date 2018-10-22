<?php
$db_host='localhost';
$db_username='root';
$db_password='';
$db_name='homework';



$link= new mysqli($db_host, $db_username, $db_password, $db_name);

/*if ($link->query("INSERT INTO user VALUES ( null , '{$_POST['name']}', '{$_POST['surname']}', '{$_POST['age']}')")){

    echo "Мы успешно добавили данные в БД";
}else{
    echo "Неудача";
}*/

$users=$link->query("SELECT * FROM user");

while($result=$users->fetch_assoc()){
    echo "<table>";
    echo " <tr><br> ";
    foreach ($result as $key=>$value){
        echo "<td> ".$value." </td><br>";
    }
    echo " </tr> ";
    echo "</<table>";
}

