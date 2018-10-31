<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 25.10.2018
 * Time: 18:32
 */

class DB
{
    private $connect;

    private $data;

    public function __construct()
    {
    $this->connect=mysqli_connect('localhost','root','',  'homework' );
    }

    public function get($query){

        $this->data= mysqli_query($this->connect, $query);
              while($row=mysqli_fetch_assoc($this->data)){
                  $users[]=$row;
        }
              return $users;
    }

    private function close(){

    }

}