<?php
class testHasPropertyReturnsTrueForDeclaredPropertyInParentParent
    extends testHasPropertyReturnsTrueForDeclaredPropertyInParentParent_parent
{
    
}

class testHasPropertyReturnsTrueForDeclaredPropertyInParentParent_parent
    extends testHasPropertyReturnsTrueForDeclaredPropertyInParentParent_parent_parent
{
    
}

class testHasPropertyReturnsTrueForDeclaredPropertyInParentParent_parent_parent
{
    protected $testHasPropertyReturnsTrueForDeclaredPropertyInParentParent = 23;
}