<?php
function testEvaluateOnDirectInheritClassFieldAccessReturnsExpectedType()
{
    return MyClass::$bar;
}

class MyClass extends YourClass
{
    
}

class YourClass extends TheirClass
{
    
}

class TheirClass
{
    /**
     *
     * @var MyBar
     */
    public static $bar;
}