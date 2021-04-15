<?php

namespace core;

class frame
{
    public static $classTop = [];

    //解析URL 控制器
    static public function run()
    {
        $route = new \core\lib\route();
        $routeAction = $route->action;
        $routeCtrl = $route->ctrl;
        $contrFile = APP . '/controllers/' . $routeCtrl . 'Controller.php';
        $contrFileClass = '\\'.AppFile . '\\controllers\\' . $routeCtrl . 'Controller';
        if (is_file($contrFile)) {
            include $contrFile;
            $controllers = new $contrFileClass;
            $controllers->$routeAction();
        } else {
            throw new \Exception(' 找不到控制器：' . $routeCtrl);
        }
    }

    //自动加载类库
    static public function load($class)
    {
        $class = str_replace('\\', '/', $class);
        if (isset($classTop[$class])) {
            return true;
        } else {
            $file = FRAME . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classTop[$class] = $class;
            } else {
                return false;
            }
        }
    }
}
