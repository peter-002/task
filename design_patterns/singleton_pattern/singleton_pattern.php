<?php

trait Singleton
{
    // 存放实例
    private static $_instance = null;
    
    // 私有化克隆方法
    private function __clone()
    {
    
    }
    
    // 公有化获取实例方法
    public static function getInstance()
    {
        $class = __CLASS__;
        if (!(self::$_instance instanceof $class)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }
}

class Db
{
    private function __construct()
    {
        echo __CLASS__ . PHP_EOL;
    }
}

class DbHandle extends Db
{
    use Singleton;
    
    private function __construct()
    {
        echo "单例模式的实例被构造了";
    }
}

$handle = DbHandle::getInstance();

// 注意若父类方法为public，则子类只能为pubic，若父类为private，子类为public ，protected，private都可以。
p($handle);
die;