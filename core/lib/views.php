<?php


namespace core\lib;


class views
{
    public $assign;

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function dispaly($file)
    {
        $file = APP.'/views/'.$file;
        if (is_file($file)){
            extract($this->assign);
            include $file;
        }
    }
}