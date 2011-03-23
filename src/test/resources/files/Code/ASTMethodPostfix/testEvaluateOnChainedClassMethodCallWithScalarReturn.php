<?php
function testEvaluateOnChainedClassMethodCallWithScalarReturn()
{
    MyClass::getFoo()->getFoo();
}

class MyClass
{
    /**
     * @return integer
     */
    public static function getFoo() {}
}

class MyFoo
{
    /**
     * @return MyFoo
     */
    public function getFoo() {}
}