<?php
function testEvaluateOnDirectInheritMethodCallReturnsExpectedType()
{
    MyClass::getBar();
}

class MyClass extends MyFoo
{
    /**
     * @return MyFoo
     */
    public static function getFoo() {}
}

class MyFoo
{
    /**
     * @return MyBar
     */
    public static function getBar() {}
}