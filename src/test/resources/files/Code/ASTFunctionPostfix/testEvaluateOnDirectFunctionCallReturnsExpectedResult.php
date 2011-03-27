<?php
function testEvaluateOnDirectFunctionCallReturnsExpectedResult()
{
    return my_foo()->getBar();
}

/**
 * @return MyFoo
 */
function my_foo() {}

class MyFoo {
    /**
     * @return MyBar
     */
    public function getBar() {}
}

class MyBar {}