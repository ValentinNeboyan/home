<?php


class News
{
    public static function getNewsItemById($id)
    {
        echo "<b>getNewsItemById() echo // Выводим спиок из статей после запроса к БД</b><br>\";";

        $id=intval($id);
        if ($id){
                $db = Db::getConnection();
                if($db){
                    echo "Есть подключение к БД<br>";
                }
         $result=$db->query('SELECT FROM news WHERE id=', $id);
          $result->fetch_assoc();

          $newsItem=$result->fetch();

          return $newsItem;


            }

    }


    public static function getNewsList()
    {
        echo "<b>getNewsList() // Выводим спиок из статей после запроса к БД</b><br>";


        $db = Db::getConnection();
        if($db){
            echo "Есть подключение к БД<br>";
        }
        $newList=array();

       if ( $result = $db->query('SELECT id, title, date, short_content FROM news ORDER BY date LIMIT 10')){
           echo "OK";
       } die ("Ошибка запроса к БД");

        $i=0;

        while ($row=$result->fetch()){
            $newList[$i]['id']=$row['id'];
            $newList[$i]['title']=$row['title'];
            $newList[$i]['date']=$row['date'];
            $newList[$i]['short_content']=$row['short_content'];
            $i++;
        }
        return $newList;
    }






}