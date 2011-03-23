<?php
function testEvaluateOnComplexChainedClassFieldAccessReturnsExpectedType()
{
    MyClass::$foo->_bar->baz->foo->it;
}

class MyClass
{
    /**
     * @var MyFoo
     */
    public static $foo;
    
    /**
     * @var Iterator
     */
    public $it;
}

class MyFoo
{
    /**
     * @var MyBar
     */
    private $_bar;
}

class MyBar
{
    /**
     * @var MyBaz
     */
    protected $baz;
}

class MyBaz
{
    /**
     * @var MyClass
     */
    public $foo;
}
