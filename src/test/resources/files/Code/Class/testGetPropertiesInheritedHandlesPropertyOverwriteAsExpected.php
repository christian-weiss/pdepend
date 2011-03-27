<?php
class testGetPropertiesInheritedHandlesPropertyOverwriteAsExpected
    extends testGetPropertiesInheritedHandlesPropertyOverwriteAsExpected_parent
{
    protected $c = 42; 
}

class testGetPropertiesInheritedHandlesPropertyOverwriteAsExpected_parent
    extends testGetPropertiesInheritedHandlesPropertyOverwriteAsExpected_parent_parent
{
    private $b = 17;
    protected $c = -17;
}

class testGetPropertiesInheritedHandlesPropertyOverwriteAsExpected_parent_parent
{
    private $a = 23;
    protected $b = -23;
    protected $c = -23;
}