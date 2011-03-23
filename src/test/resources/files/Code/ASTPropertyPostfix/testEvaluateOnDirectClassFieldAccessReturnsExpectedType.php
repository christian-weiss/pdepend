<?php
function testEvaluateOnDirectClassFieldAccessReturnsExpectedType()
{
    echo MyClass::$foo;
}

class MyClass
{
    /**
     * @var MyFoo
     */
    public static $foo = null;
}