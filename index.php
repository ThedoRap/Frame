<?php
/** 入口文件 **/

//全局常量
define('FRAME', str_replace('\\', '/', dirname(realpath(__FILE__))));
define('CORE', FRAME . '/core');
define('APP', FRAME . '/app');
define('AppFile', 'app');
define('DEBUG', true);

include "vendor/autoload.php";

if (DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');

}
//函数库
include CORE . '/common/function.php';

//类自动加载
include CORE . '/frame.php';
spl_autoload_register('\core\frame::load');

\core\frame::run();
