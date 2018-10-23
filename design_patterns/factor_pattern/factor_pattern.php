<?php

include '../../function.php';

/**
 * -----------------------------------------
 * 工厂方法模式
 * -----------------------------------------
 */

/**
 * 抽象工厂
 * Class Factory
 */
abstract class Factory
{
    abstract function getVal($i, $j);
}

/**
 * 加法工厂
 * Class FactoryAdd
 */
class FactoryAdd extends Factory
{
    public function getVal($i, $j)
    {
        return $i + $j;
    }
}

/**
 * 减法工厂
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class FactorySub
 */
class FactorySub extends Factory
{
    public function getVal($i, $j)
    {
        return $i - $j;
    }
}

/**
 * 实现工厂
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class CounterFactory
 */
class CounterFactory
{
    public static function createOperation(string $operation)
    {
        return new $operation;
    }
}

//$operation = CounterFactory::createOperation('FactoryAdd');
//p($operation->getVal(1, 2));


/**
 * -----------------------------------------
 * 抽象工厂模式
 * 老话说的好，抽象高于实现
 * -----------------------------------------
 */

/**
 * 抽象工厂
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class AbstractFactory
 */
abstract class AbstractFactory
{
    abstract function getVal($i, $j);
}

/**
 * 减法工厂实现
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class SubFactory
 */
class SubFactory extends AbstractFactory
{
    public function getVal($i, $j)
    {
        return $i - $j;
    }
}

/**
 * 加法工厂实现
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class AddFactory
 */
class AddFactory extends AbstractFactory
{
    public function getVal($i, $j)
    {
        return $i + $j;
    }
}

/**
 * 抽象调度
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class AbstractDispatch
 */
abstract class AbstractDispatch
{
    abstract static function getInstance();
}

/**
 * 加法调度实现
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class AddDispatch
 */
class AddDispatch extends AbstractDispatch
{
    public static function getInstance()
    {
        return new AddFactory;
    }
}

/**
 * 减法调度实现
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class SubDispatch
 */
class SubDispatch extends AbstractDispatch
{
    public static function getInstance()
    {
        return new FactorySub;
    }
}

$operation = AddDispatch::getInstance();
p($operation->getVal(123, 12312));
