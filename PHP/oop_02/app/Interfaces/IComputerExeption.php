<?php
interface IComputerExeption
{
   public function getMessage();

   public function getCode();

   public function __toString();

   public function __construct($message = null, $code = 0);
}