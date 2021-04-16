<?php
/** 入口文件 **/

//全局常量
define('FRAME', str_replace('\\', '/', dirname(realpath(__FILE__))));
define('CORE', FRAME . '/core');
define('APP', FRAME . '/app');
define('AppFile', 'app');
define('DEBUG', true);


if (DEBUG) {
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');

}

//函数库
include CORE . '/common/function.php';

//类自动加载
include CORE . '/frame.php';
spl_autoload_register('\core\frame::load');

//db类
$db_config = FRAME . '/config/db.php';
if (is_file($db_config)) {
    $db_config_return = include $db_config;
    if (is_array($db_config_return)) {
        include CORE . '/lib/drive/db/init.php';
    }
}

\core\frame::run();
