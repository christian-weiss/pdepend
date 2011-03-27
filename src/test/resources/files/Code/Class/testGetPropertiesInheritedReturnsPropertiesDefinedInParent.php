<?php
class testGetPropertiesInheritedReturnsPropertiesDeclaredInParent
    extends testGetPropertiesInheritedReturnsPropertiesDeclaredInParent_parent
{
    protected $a;
}

class testGetPropertiesInheritedReturnsPropertiesDeclaredInParent_parent
{
    private $b;
    public $c;
}