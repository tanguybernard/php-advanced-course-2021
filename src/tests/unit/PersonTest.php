<?php declare(strict_types=1);

use Course\App\Person;
use PHPUnit\Framework\TestCase;

final class PersonTest extends TestCase
{
    public function testShouldReturnFirstName(): void
    {
        $person = new Person('Paul');
        $this->assertEquals('Paul', $person->firstName);

    }
}
