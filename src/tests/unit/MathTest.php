<?php

use PHPUnit\Framework\TestCase;

final class MathTest extends TestCase
{

    public function testAddition(){
        $this->assertEquals(3, $this->addition(1, 2));
        $this->assertEquals(4, $this->addition(2, 2));
    }

    private function addition(int $int, int $int1): int
    {
        return $int + $int1;
    }
}
