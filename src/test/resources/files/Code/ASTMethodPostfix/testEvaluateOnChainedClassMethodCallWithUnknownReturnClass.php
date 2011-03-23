<?php
function testEvaluateOnChainedClassMethodCallWithUnknownReturnClass()
{
    MyClass::getFoo()->getBar()->getBaz();
}

class MyClass
{
    /**
     * @return MyFoo
     */
    public static function getFoo() {}
}

class MyBar
{
    /**
     * @return MyBaz
     */
    public function getBaz() {}
}