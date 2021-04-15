<?php

namespace app\controllers;

use core\lib\controllers;

class indexController extends controllers
{
    public function index()
    {
        $data = 'hello word';
        $this->assign('data',$data);
        $this->dispaly('index.html');
    }
}