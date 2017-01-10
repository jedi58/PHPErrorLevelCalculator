<?php
/**
 * @group unit
 */
class PHPErrorLevelCalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testSingleErrorCodeToString()
    {
        $this->assertEquals(ErrorLevelCalculator::toCode('E_ALL'), E_ALL);
    }
    
    public function testSingleErrorStringToCode()
    {
        $this->assertEquals(ErrorLevelCalculator::toString(E_ALL), 'E_ALL');
    }
    
    public function testStringAllNoWarnings()
    {
        $this->assertEquals(
            ErrorLevelCalculator::toCode('E_ALL & ~E_WARNING'),
            E_ALL & ~E_WARNING
        );
    }
    
    public function testStringErrorsAndWarnings()
    {
        $this->assertEquals(
            ErrorLevelCalculator::toCode('E_ERROR | E_WARNING'),
            E_ERROR | E_WARNING
        );
    }
    
    public function testCodeAllNoNoticesNoStrict()
    {
        $this->assertEquals(
            ErrorLevelCalculator::toString(E_ALL & ~E_NOTICE & ~E_STRICT),
            'E_ALL & ~E_NOTICE & ~E_STRICT'
        );
    }
    
    public function testCodeAllNoWarnings()
    {
        $this->assertEquals(
            ErrorLevelCalculator::toString(E_ALL & ~E_WARNING),
            'E_ALL & ~E_WARNING'
        );
    }
    
    public function testCodeErrorsAndWarnings()
    {
        $this->assertEquals(
            ErrorLevelCalculator::toString(E_ERROR | E_WARNING),
            'E_ERROR | E_WARNING'
        );
    }
}
