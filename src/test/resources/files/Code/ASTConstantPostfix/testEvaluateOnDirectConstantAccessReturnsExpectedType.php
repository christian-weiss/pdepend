<?php
function testEvaluateOnDirectConstantAccessReturnsExpectedType()
{
    return MyClass::T_FOO;
}

class MyClass
{
    const T_FOO = 42;
}