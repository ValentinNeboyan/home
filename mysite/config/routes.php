<?php

return array (
    //news/sport/114- адрес запроса страницы

   'news/([0-9]+)' =>'news/view/$1',

    'news'=>'news/index',// actionIndex в Newscontroller
    'products'=>'product/list' //actionList в ProductController
);