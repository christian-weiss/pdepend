<?php
function testEvaluateOnComplexChainedClassMethodCallReturnsExpectedType()
{
    MyClass::getFoo()->getFoo()->getBar()->getClass()->getIterator();
}

abstract class MyClass implements MyInterface
{
    /**
     * @return MyFoo
     */
    public static function getFoo() {}
}

class MyFoo
{
    /**
     * @return MyFoo
     */
    public function getFoo() {}

    /**
     * @return MyBar
     */
    public function getBar() {}
}

class MyBar
{
    /**
     * @return MyClass
     */
    public function getClass() {}
}

interface MyInterface
{
    /**
     * @return Iterator
     */
    function getIterator();
}