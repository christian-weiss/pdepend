<?php
class testGetPropertyReturnsPropertyDeclaredInParentClass
    extends testGetPropertyReturnsPropertyDeclaredInParentClass_parent
{
    
}

class testGetPropertyReturnsPropertyDeclaredInParentClass_parent
{
    protected $testGetPropertyReturnsPropertyDeclaredInParentClass = 23;
}