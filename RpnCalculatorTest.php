<?php

use PHPUnit\Framework\TestCase;

require 'rpn_calculator.php'; // Adjust the path as necessary

class RpnCalculatorTest extends TestCase
{
    public function testAddition()
    {
        $this->assertEquals(5, rpn_calculate('2 3 +'));
    }

    public function testSubtraction()
    {
        $this->assertEquals(-1, rpn_calculate('2 3 -'));
    }

    public function testMultiplication()
    {
        $this->assertEquals(6, rpn_calculate('2 3 *'));
    }

    public function testDivision()
    {
        $this->assertEquals(2, rpn_calculate('6 3 /'));
    }

    public function testSquareRoot()
    {
        $this->assertEquals(3, rpn_calculate('9 sqrt'));
    }

    public function testPower()
    {
        $this->assertEquals(8, rpn_calculate('2 3 ^'));
    }

    public function testFactorial()
    {
        $this->assertEquals(120, rpn_calculate('5 !'));
    }

    public function testComplexExpression()
    {
        $this->assertEquals(25, rpn_calculate('5 2 + 4 * 3 -'));
    }

    public function testInvalidOperator()
    {
        $this->assertEquals('Invalid operator', rpn_calculate('5 1 $'));
    }
}
