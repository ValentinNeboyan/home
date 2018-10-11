<?php

namespace App\Kernel;

class Console
{
    public static $warning = 'WARNING';

    public static $success = 'SUCCESS';

    public static $failture = 'FAILTURE';

    public static function printLine($message, $status = '')
    {
        switch ($status) {
            case self::$success:
                $color = "[0;32m";
                break;
            case self::$failture:
                $color = "[0;31m";
                break;
            case self::$warning:
                $color = "[0;33m";
                break;
            default:
                $color = "[1;37m";
        }

        echo "{$message}" . PHP_EOL;
    }
}