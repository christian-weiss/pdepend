<?php
class testGetPropertiesNotReturnsPropertiesDeclaredInParent
    extends testGetPropertiesNotReturnsPropertiesDeclaredInParent_parent
{
    protected $foo = 42;
    private $bar = 23;
}

class testGetPropertiesNotReturnsPropertiesDeclaredInParent_parent
{
    public $baz = 23;
    private $foobar = 42;
}