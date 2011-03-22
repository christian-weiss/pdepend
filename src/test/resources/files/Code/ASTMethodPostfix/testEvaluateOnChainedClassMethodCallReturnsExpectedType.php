<?php
function testEvaluateOnChainedClassMethodCallReturnsExpectedType()
{
    MyClass::getFoo()->getBar();
}

class MyClass
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
    public function getBar() {}
}