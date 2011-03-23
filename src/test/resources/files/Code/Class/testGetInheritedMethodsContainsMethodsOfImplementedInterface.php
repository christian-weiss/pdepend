<?php
abstract class testGetInheritedMethodsContainsMethodsOfImplementedInterface
    implements GetAllMethodsContainsMethodsOfImplementedInterface
{

}

interface GetAllMethodsContainsMethodsOfImplementedInterface
{
    function foo();
    function bar();
    function baz();
}