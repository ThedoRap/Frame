<?php

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
include CORE . '/common/function.php';
include CORE . '/frame.php';

$db_config = FRAME . '/config/db.php';
if (is_file($db_config)) {
    $db_config_return = include $db_config;
    if (is_array($db_config_return)) {
        include CORE . '/lib/db/init.php';
    }
}

spl_autoload_register('\core\frame::load');

\core\frame::run();
