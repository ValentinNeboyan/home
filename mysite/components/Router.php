<?php

class Router
{

    private $routes;//массив с маршрутами

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);

    }

    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
           return trim($_SERVER['REQUEST_URI'],'/');
        }
    }
            public function run()
    {
       // Получить строку запроса

            $uri=$this->getUri();


        // Проверить наличие такого запроса в routes.php

        foreach ($this->routes as $uriPattern=>$path){

            //Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)){
         // определить какой контроллер и action обрабатівают запрос
             //   echo 'Где ищем (запрос пользователя($ uri)'.$uri."<br>";
             //  echo 'Что ищем (совпадения из правила($ uriPattern)'.$uriPattern."<br>";
             //   echo 'Кто обрабатывает ($ path)'.$path."<br>";

                //Получаем внутренний путь
                $internalRoute=preg_replace("~$uriPattern~", $path, $uri);
                //echo "Нужно сформировать: ".$internalRoute."<br>";



                $segments= explode('/', $internalRoute);
                array_shift($segments);
               //array_shift($segments);
               // var_dump($segments);
                $controllerName=array_shift($segments).'Controller';
                $controllerName=ucfirst($controllerName);
                $actionName='action'.ucfirst(array_shift($segments));
                echo "Класс: ".$controllerName;
                echo "<br>";
                echo "Метод: ".$actionName;
                echo "<br>";
                $parameters=$segments;// после UNSHIFT_ARRAY в $SEGMENTS останутся тоько параметры
               // print_r($parameters);

                }
        }
        // Подключить файл класса-запроса

            $controllerFile=ROOT.'/controllers/'.$controllerName.'.php';

           if (file_exists($controllerFile)){
               include_once ($controllerFile);
           }

        // Создать объект, вызвать метод(т.е. action)

           $controllerObject=new $controllerName;

           $result=call_user_func_array(array($controllerObject, $actionName), $parameters);
           if ($result != null){
               return;
           }
    }


}