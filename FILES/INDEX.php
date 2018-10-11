<?php

$dateFormat='D d  ';
$file=__DIR__.'/readme.md';
$size=filesize($file);

$fp=fopen($file,'r');//открытие  файла для чтения

do {
    echo fgets($fp).PHP_EOL;
}

    while (!feof($fp));

fclose($fp);//и закрытие


echo '<br><br>';
echo '<br><br>';

if (file_exists($file)){
    echo $file. ' has size '.filesize($file).' bytes';
} else {
    echo 'File not exist';
}
echo '<br><br>';

echo $file.(is_readable($file)?' is ':' is not ').'readable. ';

echo '<br><br>';

echo $file.(is_writeable($file)?' is ':' is not ').'writeable.';

echo '<br><br>';

echo file_get_contents(__DIR__.'/readme.md');//вывод содержимого файла на экран

echo '<br><br>';

$file=__DIR__.'/text.txt';

$fp=fopen($file,'w');

fwrite($fp,'Banana'. PHP_EOL);
fwrite($fp,'Mango'. PHP_EOL);

fclose($fp);
echo file_get_contents($file);

echo '<br><br>';
echo '<br><br>';

//вывод файла в формате CSV

$file=__DIR__.'/workers.csv';

$newUsers=[
    ['John Dilan', 33 , 'Developer'],
    ['Maria Smith', 23 , 'Admin'],
];

$fp=fopen($file,'r');

while ($record=fgetcsv($fp,1000,':'))
{
    foreach ($record as $row)
    {
        echo $row.'<br>';
    }
}

foreach ($newUsers as $user)
{
    //fputcsv($fp,$user,';');
    file_put_contents(__DIR__.'/workers.csv', implode(';',$user), FILE_APPEND);
}

//fclose($fp);