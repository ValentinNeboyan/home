<?php

return array (
    //news/sport/114- адрес запроса страницы

   'news/([a-z]+)/([0-9]+)' =>'news/view/$1/$2',

    'news'=>'news/index',// actionIndex в Newscontroller
    'products'=>'product/list' //actionList в ProductController
);