<?php
function testEvaluateOnDirectClassMethodCallReturnsExpectedType()
{
    MyClass::getFoo();
}

class MyClass
{
    /**
     * @return MyFoo
     */
    public static function getFoo()
    {

    }
}