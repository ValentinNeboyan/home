<?php

namespace App\Interfaces;

interface IComputer
{
    function start();

     function stop();

     function restart();

    function printParams();

    function identifyComputer();
}