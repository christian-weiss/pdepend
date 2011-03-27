<?php
/**
 * This file is part of PHP_Depend.
 *
 * PHP Version 5
 *
 * Copyright (c) 2008-2011, Manuel Pichler <mapi@pdepend.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   PHP
 * @package    PHP_Depend
 * @subpackage Code
 * @author     Manuel Pichler <mapi@pdepend.org>
 * @copyright  2008-2011 Manuel Pichler. All rights reserved.
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    SVN: $Id$
 * @link       http://www.pdepend.org/
 */

require_once dirname(__FILE__) . '/ASTNodeTest.php';

/**
 * Test case for the {@link PHP_Depend_Code_ASTFunctionPostfix} class.
 *
 * @category   PHP
 * @package    PHP_Depend
 * @subpackage Code
 * @author     Manuel Pichler <mapi@pdepend.org>
 * @copyright  2008-2011 Manuel Pichler. All rights reserved.
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    Release: @package_version@
 * @link       http://www.pdepend.org/
 * 
 * @covers PHP_Depend_Parser
 * @covers PHP_Depend_Code_ASTNode
 * @covers PHP_Depend_Code_ASTFunctionPostfix
 * @group pdepend
 * @group pdepend::ast
 * @group unittest
 */
class PHP_Depend_Code_ASTFunctionPostfixTest extends PHP_Depend_Code_ASTNodeTest
{
    /**
     * testEvaluateOnDirectFunctionCallReturnsExpectedResult
     * 
     * @return void
     * @since 0.11.0
     */
    public function testEvaluateOnDirectFunctionCallReturnsExpectedResult()
    {
        $postfix = $this->_getFirstFunctionPostfixInFunction();
        self::assertNull($postfix->getParent()->getClass());
    }
    
    /**
     * testGetClassReturnsNullByDefault
     * 
     * @return void
     * @since 0.11.0
     */
    public function testGetClassReturnsNullByDefault()
    {
        $postfix = new PHP_Depend_Code_ASTFunctionPostfix();
        self::assertNull($postfix->getClass());
    }
    
    /**
     * testAcceptInvokesVisitOnGivenVisitor
     *
     * @return void
     */
    public function testAcceptInvokesVisitOnGivenVisitor()
    {
        $visitor = $this->getMock('PHP_Depend_Code_ASTVisitorI');
        $visitor->expects($this->once())
            ->method('__call')
            ->with($this->equalTo('visitFunctionPostfix'));

        $postfix = new PHP_Depend_Code_ASTFunctionPostfix();
        $postfix->accept($visitor);
    }

    /**
     * testAcceptReturnsReturnValueOfVisitMethod
     *
     * @return void
     */
    public function testAcceptReturnsReturnValueOfVisitMethod()
    {
        $visitor = $this->getMock('PHP_Depend_Code_ASTVisitorI');
        $visitor->expects($this->once())
            ->method('__call')
            ->with($this->equalTo('visitFunctionPostfix'))
            ->will($this->returnValue(42));

        $postfix = new PHP_Depend_Code_ASTFunctionPostfix();
        self::assertEquals(42, $postfix->accept($visitor));
    }

    /**
     * Tests that a parsed function postfix has the expected object structure.
     *
     * @return void
     */
    public function testFunctionPostfixStructureSimple()
    {
        $postfix  = $this->_getFirstFunctionPostfixInFunction();
        $expected = array(
            PHP_Depend_Code_ASTIdentifier::CLAZZ,
            PHP_Depend_Code_ASTArguments::CLAZZ,
            PHP_Depend_Code_ASTLiteral::CLAZZ
        );

        self::assertGraphEquals($postfix, $expected);
    }

    /**
     * Tests that a parsed function postfix has the expected object structure.
     *
     * @return void
     */
    public function testFunctionPostfixStructureVariable()
    {
        $postfix  = $this->_getFirstFunctionPostfixInFunction();
        $expected = array(
            PHP_Depend_Code_ASTVariable::CLAZZ,
            PHP_Depend_Code_ASTArguments::CLAZZ
        );

        self::assertGraphEquals($postfix, $expected);
    }

    /**
     * Tests that a parsed function postfix has the expected object structure.
     *
     * @return void
     */
    public function testFunctionPostfixStructureCompoundVariable()
    {
        $postfix  = $this->_getFirstFunctionPostfixInFunction();
        $expected = array(
            PHP_Depend_Code_ASTCompoundVariable::CLAZZ,
            PHP_Depend_Code_ASTConstant::CLAZZ,
            PHP_Depend_Code_ASTArguments::CLAZZ,
            PHP_Depend_Code_ASTConstant::CLAZZ
        );

        self::assertGraphEquals($postfix, $expected);
    }

    /**
     * Tests that a parsed function postfix has the expected object structure.
     *
     * @return void
     */
    public function testFunctionPostfixStructureWithMemberPrimaryPrefixMethod()
    {
        $postfix  = $this->_getFirstFunctionPostfixInFunction();
        $expected = array(
            PHP_Depend_Code_ASTIdentifier::CLAZZ,
            PHP_Depend_Code_ASTArguments::CLAZZ,
            PHP_Depend_Code_ASTLiteral::CLAZZ
        );

        self::assertGraphEquals($postfix, $expected);
    }

    /**
     * Tests that a parsed function postfix has the expected object structure.
     *
     * @return void
     */
    public function testFunctionPostfixStructureWithMemberPrimaryPrefixProperty()
    {
        $postfix  = $this->_getFirstFunctionPostfixInFunction();
        $expected = array(
            PHP_Depend_Code_ASTIdentifier::CLAZZ,
            PHP_Depend_Code_ASTArguments::CLAZZ,
            PHP_Depend_Code_ASTLiteral::CLAZZ
        );

        self::assertGraphEquals($postfix, $expected);
    }

    /**
     * testFunctionPostfixHasExpectedStartLine
     *
     * @return void
     */
    public function testFunctionPostfixHasExpectedStartLine()
    {
        $postfix = $this->_getFirstFunctionPostfixInFunction();
        $this->assertEquals(4, $postfix->getStartLine());
    }

    /**
     * testFunctionPostfixHasExpectedStartColumn
     *
     * @return void
     */
    public function testFunctionPostfixHasExpectedStartColumn()
    {
        $postfix = $this->_getFirstFunctionPostfixInFunction();
        self::assertEquals(5, $postfix->getStartColumn());
    }

    /**
     * testFunctionPostfixHasExpectedEndLine
     *
     * @return void
     */
    public function testFunctionPostfixHasExpectedEndLine()
    {
        $postfix = $this->_getFirstFunctionPostfixInFunction();
        self::assertEquals(8, $postfix->getEndLine());
    }

    /**
     * testFunctionPostfixHasExpectedEndColumn
     *
     * @return void
     */
    public function testFunctionPostfixHasExpectedEndColumn()
    {
        $postfix = $this->_getFirstFunctionPostfixInFunction();
        self::assertEquals(13, $postfix->getEndColumn());
    }

    /**
     * Creates a field declaration node.
     *
     * @return PHP_Depend_Code_ASTFunctionPostfix
     */
    protected function createNodeInstance()
    {
        return new PHP_Depend_Code_ASTFunctionPostfix(__FUNCTION__);
    }

    /**
     * Returns a node instance for the currently executed test case.
     *
     * @return PHP_Depend_Code_ASTFunctionPostfix
     */
    private function _getFirstFunctionPostfixInFunction()
    {
        return $this->getFirstNodeOfTypeInFunction(
            self::getCallingTestMethod(), 
            PHP_Depend_Code_ASTFunctionPostfix::CLAZZ
        );
    }
}