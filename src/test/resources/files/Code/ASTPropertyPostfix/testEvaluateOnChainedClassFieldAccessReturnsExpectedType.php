<?php
function testEvaluateOnChainedClassFieldAccessReturnsExpectedType()
{
    return MyClass::$foo->bar;
}

class MyClass
{
    /**
     *
     * @var MyFoo
     */
    private static $foo;
}

class MyFoo
{
    /**
     * @var MyBar
     */
    protected $bar;
}