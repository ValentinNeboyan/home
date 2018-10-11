<?php
namespace App\Exceptions;

use App\Interfaces\IComputerExeption;

class ComputerExeption extends Exeption implements IComputerExeption
{
    public static $MESSAGES =[
        'success'=>'Все хорошо, работаем дальше',
        'is_enabled' =>'Компьютер уже включен!',
        'is_disabled'=>'Компьюте выключен';
    ]
}