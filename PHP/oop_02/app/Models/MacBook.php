<?php

namespace App\Models;

use App\Interfaces\IComputer;
use App\Kernel\Console;

class MacBook extends Computer implements IComputer
{
    public function __construct()
    {
        $this
            ->setComputerName('Apple MacBook Pro')
            ->setCpu('Intel Core i7')
            ->setRam('16 Gb');
    }

    public function identifyComputer()
    {
        Console::printLine(hash('md5', $this->getComputerName()));
    }
}