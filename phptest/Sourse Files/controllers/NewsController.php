<?php
include_once ROOT.'/models/News.php';

class NewsController{

    public function actionIndex()
    {
        $newList=array();
        $newList=News::getNewsList();

        echo '<pre>';
        echo print_r($newList);
        echo '<pre>';

        return true;
    }

    public function actionView($category, $id)
    {
       if ($id){
           $newsItem=News::getNewsItemById($id);


           echo '<pre>';
           echo print_r($newsItem);
           echo '<pre>';

           echo 'actionView';
       }
    }


}