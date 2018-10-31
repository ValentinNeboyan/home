<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 26.10.2018
 * Time: 21:54
 */

class DB
{
    public static function getConnection()
    {
        $paramsPath=ROOT.'/config/db_params.php';
        $params=include($paramsPath);

        $db=new mysqli($params['dbhost'],$params['dbuser'],$params['dbpassword'],$params['dbname']);

        return $db;
    }











}