<?php
class testGetInheritedMethodsContainsMethodsOfImplementedInterfaces
    implements testGetInheritedMethodsContainsMethodsOfImplementedInterfaceA,
               testGetInheritedMethodsContainsMethodsOfImplementedInterfaceB
{

}

interface testGetInheritedMethodsContainsMethodsOfImplementedInterfaceA
{
    function foo();
    function baz();
}

interface testGetInheritedMethodsContainsMethodsOfImplementedInterfaceB
{
    function bar();
}