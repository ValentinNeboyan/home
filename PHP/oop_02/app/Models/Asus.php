<?php

namespace App\Models;

use App\Interfaces\IComputer;
use App\Kernel\Console;
use App\Exeptions\ComputerExeption;



class Asus extends Computer implements IComputer
{
    public function __construct()
    {
        $this
            ->setComputerName('Asus X540LJ')
            ->setCpu('Intel Core i3-4005')
            ->setRam('8 Gb');
    }
    public function start()
    {try {
        if ($this->isEnabled) {
            throw new ComputerExeption(ComputerExeption::$MESSAGES['is_enabled']);
        }
         }catch (ComputerExeption $e){
            die($e->getMessage());
    }

            $this->turnOnComputer();

    Console::printline('Компьютер включен');
    }

    function stop()
    {

    }

    function restart()
    {

    }


    public function identifyComputer()
    {
        Console::printLine(hash('sha1', $this->getComputerName()));
    }
}