<?php

namespace Smpl\HelloTest;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
  public function testAdd()
  {
    $calc = new Calculator();
    $result = $calc->add(1);

    $this->assertEquals(3, $result);
  }

  public function addDataProvider()
  {
    return array(
      array(1, 2, 3),
      array(0, 0, 0),
      array(2, 2, 8),
    );
  }

  /**
   * @dataProvider addDataProvider
   */
  public function testAddData($a, $b, $expected)
  {
    $calc = new Calculator();
    $result = $calc->add($a, $b);

    $this->assertEquals($expected, $result);
  }
}
