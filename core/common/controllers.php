<?php


namespace core\common;

use core\lib\server;
use core\lib\views;
use core\lib\config;

class controllers
{
    public $views;

    public function __construct()
    {
        $newViews = new views();
        $this->views = $newViews;
    }

    public function assign($name, $value)
    {
        $this->views->assign($name, $value);
    }

    public function dispaly($file)
    {
        $this->views->dispaly($file);
    }

    public function config($file, $name)
    {
        return config::get($name, $file);
    }

    public function configAll($file)
    {
        return config::all($file);
    }

    public function getIp()
    {
        return server::get_ip();
    }

    public function device()
    {
        return server::is_device();
    }
}