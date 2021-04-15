<?php


namespace core\lib;

use core\lib\views;

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
}