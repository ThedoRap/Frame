<?php


namespace core\lib;


class config
{
    static public $config = [];

    static public function get($name, $file)
    {
        if (isset(self::$config[$file])) {
            return self::$config[$file][$name];
        } else {
            $path = FRAME . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $config = include $path;
                if (isset($config[$name])) {
                    self::$config[$file] = $config;
                    return $config[$name];
                } else {
                    throw new \Exception('找不到配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    static public function all($file)
    {
        if (isset(self::$config[$file])) {
            return self::$config[$file];
        } else {
            $path = FRAME . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $config = include $path;
                self::$config[$file] = $config;
                return $config;
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
}