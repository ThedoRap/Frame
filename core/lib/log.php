<?php

namespace core\lib;

use core\lib\config;

class log
{
    static $class;

    static public function init()
    {
        $drive = config::get('drive', 'log');
        $class = '\core\lib\drive\log\\' . $drive;
        self::$class = new $class;
    }

    static public function log($name, $file = 'log')
    {
        self::$class->log($name, $file);
    }
}