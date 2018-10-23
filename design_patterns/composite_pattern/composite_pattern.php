<?php

/**
 * 抽象构件
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class Component
 */
Abstract class Component
{
    abstract function doSomething();
}

/**
 * 树枝构件
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class Composit
 */
class Composit extends Component
{
    public $level;
    
    /**
     * TODO: 细分树枝操作权限、权利
     */
    public function doSomething()
    {
        // TODO: Implement doSomething() method.
        switch ($this->level) {
            case 1:
                $this->command();
                break;
            case 2:
                $this->manager();
                break;
            case 3:
                $this->sell();
                break;
                
        }
    }
    
    /**
     * TODO: 独有动作
     */
    public function action()
    {
    
    }
    
    private function command()
    {
    
    }
    
    private function manager()
    {
    
    }
    
    private function sell()
    {
    
    }
}

/**
 * 叶子构件
 * @author  sorbon      <1209sorbon@gmail.com>
 * Class Leaf
 */
class Leaf extends Component
{
    public function doSomething()
    {
        // TODO: Implement doSomething() method.
    }
}
