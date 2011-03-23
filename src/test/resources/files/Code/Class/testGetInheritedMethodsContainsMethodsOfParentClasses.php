<?php
class testGetInheritedMethodsContainsMethodsOfParentClasses
    extends testGetInheritedMethodsContainsMethodsOfParentClassA
{
    function foo() {}
}

class testGetInheritedMethodsContainsMethodsOfParentClassA
    extends testGetInheritedMethodsContainsMethodsOfParentClassB
{
    function bar() {}
}

class testGetInheritedMethodsContainsMethodsOfParentClassB
{
    function baz() {}
}