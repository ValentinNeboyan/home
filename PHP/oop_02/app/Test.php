<?php
use App\Exeptions\ComputerExeption;


class MyExeptions extends \Exeption
{

}

class Test
{
    public function testing()
    {
        try {
            try{
                throw new ComputerExeption('foo!');
            }catch (ComputerExeption $e){
                throw $e;
            }
        }catch (\Exeption $e){
            var_dump($e->getMessage());
        }
    }
}