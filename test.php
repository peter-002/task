<?php

/**
 * 依赖注入
 * @author  sorbon      <1209sorbon@gmail.com>
 */

/**
 * 首先定义一个适配器接口
 * Interface AdapterInterface
 */
interface AdapterInterface
{
    public function getInfo();
}

/**
 * 业务实现
 * Class Test
 */
class Test
{
    public $attribute;
    
    /**
     * 注入
     * Test constructor.
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->attribute = $adapter;
    }
    
    /**
     * 方法实现
     * @return mixed
     */
    public function realize()
    {
        return $this->attribute->getInfo();
    }
}

/**
 * mysql 适配器
 * Class MysqlAdapter
 */
class MysqlAdapter implements AdapterInterface
{
    public function getInfo()
    {
        // TODO: Implement getInfo() method.
        return 1;
    }
}

/**
 * sql server 适配器
 * Class SqlServerAdapter
 */
class SqlServerAdapter implements AdapterInterface
{
    public function getInfo()
    {
        // TODO: Implement getInfo() method.
        return 2;
    }
}

//// 依赖注入实现
//$mysql     = new MysqlAdapter();
//$sqlServer = new SqlServerAdapter();
//
//echo (new Test($mysql))->realize();


/**
 * 依赖注入容器
 * @author  sorbon      <1209sorbon@gmail.com>
 */
class Ioc
{
    protected static $registry = [];
    
    /**
     * 注册
     * @param $name
     * @param Closure $closure
     */
    public static function register($name, Closure $closure)
    {
        static::$registry[$name] = $closure;
    }
    
    /**
     * 获取
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public static function resolve($name)
    {
        if (static::registered($name)) {
            $name = static::$registry[$name];
            
            return $name();
        }
        
        throw new \Exception('Nothing registered with that name');
    }
    
    /**
     * 查找
     * @param $name
     * @return bool
     */
    public static function registered($name)
    {
        return array_key_exists($name, static::$registry);
    }
}

// 依赖注入容器使用
Ioc::register('mysql', function () {
    return new MysqlAdapter();
});
Ioc::register('test', function () {
    $mysql = Ioc::resolve('mysql');
    
    return new Test($mysql);
});

echo Ioc::resolve('test')->realize();
