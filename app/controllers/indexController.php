<?php

namespace app\controllers;
class indexController
{
    public function index(){
        $list = M('test')->select();
        var_dump($list);
    }
}