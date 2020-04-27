<?php

namespace Smpl\HelloTest;

class Calculator
{
  public function add($operandA, $operandB)
  {
    return $operandA + $operandB;
  }

  public function divide($operandA, $operandB)
  {
    if (!is_int($operandA) || !is_int($operandB)) {
      throw new \Exception("operand must be int");
    }

    $result = $operandA / $operandB;

    if (!is_int($result))
    {
      throw new \Exception("result must be an int");
    }

    return $result;
  }
}
