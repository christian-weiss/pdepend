<?php
class testGetInheritedMethodsContainsMethodsOfParentClass
    extends testGetInheritedMethodsContainsMethodsOfParentClassA
{
    function foo() {}
}

class testGetInheritedMethodsContainsMethodsOfParentClassA
{
    function bar() {}
    function baz() {}
}