<?php
/**
 * @group unit
 */
class PHPErrorLevelCalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testSingleErrorCodeToString()
    {
        $this->assertEquals(ErrorLevelCalculator::toCode('E_ALL'), 32767);
    }
    
    public function testSingleErrorStringToCode()
    {
        $this->assertEquals(ErrorLevelCalculator::toString(32767), 'E_ALL');
    }
    
    public function testStringAllNoWarnings()
    {
        $this->assertEquals(ErrorLevelCalculator::toCode('E_ALL & ~E_WARNING'), 32765);
    }
    
    public function testStringErrorsAndWarnings()
    {
        $this->assertEquals(ErrorLevelCalculator::toCode('E_ERROR | E_WARNING'), 3);
    }
    
    public function testCodeAllNoNoticesNoStrict()
    {
        $this->assertEquals(
            ErrorLevelCalculator::toString(6135),
            'E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_USER_DEPRECATED'
        );
    }
    
    public function testCodeAllNoWarnings()
    {
        $this->assertEquals(ErrorLevelCalculator::toString(32765), 'E_ALL & ~E_WARNING');
    }
    
    public function testCodeErrorsAndWarnings()
    {
        $this->assertEquals(ErrorLevelCalculator::toString(3), 'E_ERROR | E_WARNING');
    }
}
