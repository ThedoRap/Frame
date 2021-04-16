<?php

namespace core\lib\drive\log;

use core\lib\config;

class file
{
    public $path;

    public function __construct()
    {
        $file = config::get('option', 'log');
        $this->path = $file['path'];
    }

    public function log($message, $file = 'log')
    {
        if (!is_dir($this->path)) {
            mkdir($this->path, '0777', true);
        }
        $dataTime = date('Y-m-d');
        return file_put_contents($this->path . $dataTime . '-' . $file . '.log', date('Y-m-d H:i:s') . json_encode($message) . PHP_EOL, FILE_APPEND);
    }
}