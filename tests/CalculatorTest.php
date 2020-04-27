<?php

namespace Smpl\HelloTest;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
  private $calc;

  protected function setUp(): void
  {
    $this->calc = new Calculator();
  }

  protected function tearDown(): void
  {
    $this->calc = NULL;
  }

  public function testAdd()
  {
    $result = $this->calc->add(1, 2);

    $this->assertEquals(3, $result);
  }

  public function addDataProvider()
  {
    return array(
      array(1, 2, 3),
      array(0, 0, 0),
      array(2, 2, 4),
    );
  }

  /**
   * @dataProvider addDataProvider
   */
  public function testAddData($a, $b, $expected)
  {
    $result = $this->calc->add($a, $b);

    $this->assertEquals($expected, $result);
  }

  public function generateDivideResults()
  {
    return array(
      array(10, 5, 2),
      array(256, 64, 4),
      array(-256, -64, 4),
      array(-256, 64, -4),
    );
  }

  /**
   * @dataProvider generateDivideResults
   */
  public function testDivideWithIntIsSuccessful($a, $b, $expected)
  {
    $result = $this->calc->divide($a, $b);

    $this->assertEquals($expected, $result);
  }

  public function testDivideWithoutEnoughParameterThrowException()
  {
    $this->expectException(\ArgumentCountError::class);

    $result = $this->calc->divide(1);
  }

  public function testDivideWithoutIntThrowException()
  {
    $this->expectExceptionMessage("operand must be int");

    $result = $this->calc->divide(1, "a");
  }

  public function testDivideWithoutIntResultThrowException()
  {
    $this->expectExceptionMessage("result must be an int");

    $result = $this->calc->divide(1, 3);
  }
}
