<?php

namespace App\Models;

use App\Kernel\Console;

abstract class Computer
{
    /**
     * Computer name
     * @var $name
     */
    private $name;

    /**
     * Computer CPU name
     * @var string $cpu
     */
    private $cpu;

    /**
     * @var string $ram
     */
    private $ram;

    /**
     * @var boolean $isEnabled
     */
    private $isEnabled;

    public function getComputerName()
    {
        return $this->name;
    }

    public function getCpu()
    {
        return $this->cpu;
    }

    public function getRam()
    {
        return $this->ram;
    }

    public function printParams()
    {
        Console::printLine('-----', Console::$warning);
        Console::printLine($this->getComputerName());
        Console::printLine($this->getCpu());
        Console::printLine($this->getRam());
        Console::printLine('-----', Console::$warning);
    }
 public function turnOnComputer(){

        $this->isEnabled=true;
 }
    /**
     * @param string $name
     * @return Computer
     */
    protected function setComputerName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $cpu
     * @return Computer
     */
    protected function setCpu($cpu)
    {
        $this->cpu = $cpu;
        return $this;
    }

    /**
     * @param string $ram
     * @return Computer
     */
    protected function setRam($ram)
    {
        $this->ram = $ram;
        return $this;
    }

    abstract public function identifyComputer();

}