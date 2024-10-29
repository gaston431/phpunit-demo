<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use Src\Greeter;

final class GreeterTest extends TestCase
{
    /* public function testGreet(): void
    {
        $greeting = true;

        $this->assertSame(true, $greeting);
    } */

    public function testGreetsWithName(): void
    {
        $greeter = new Greeter;

        $greeting = $greeter->greet('Alice');

        $this->assertSame('Hello, Alice!', $greeting);
    }
}