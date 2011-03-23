<?php
class testGetInheritedMethodsContainsMethodsOfIndirectImplementedInterfaces
    implements testGetInheritedMethodsContainsMethodsOfIndirectImplementedInterfaceA
{

}

interface testGetInheritedMethodsContainsMethodsOfIndirectImplementedInterfaceA
    extends testGetInheritedMethodsContainsMethodsOfIndirectImplementedInterfaceB
{
    function foo();
}

interface testGetInheritedMethodsContainsMethodsOfIndirectImplementedInterfaceB
{
    function bar();
    function baz();
}