<?php
declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Src\MyClass;

class MyClassTest extends TestCase
{
    private $myClass;

    public function setUp(): void
    {
        $this->myClass = new MyClass();
    }
    public function tearDown(): void
    {
        // Clean up any resources used during testing
        $this->myClass = null;
    }

    #[DataProvider('concatenationDataProvider')]
    public function testConcatenateStrings($str1, $str2, $expected): void
    {
        // $myClass = new MyClass();
        // $str1 = 'hello';
        // $str2 = 'world';
        // $expectedResult = 'helloworld';

        $result = $this->myClass->concatenateStrings($str1, $str2);

        $this->assertEquals($expected, $result);
    }

    public static function concatenationDataProvider()
    {
        return [
            ['hello', 'world', 'helloworld'],
            ['foo', 'bar', 'foobar'],
            ['', '', ''],
        ];
    }


    public function testCallsApiMethod()
    {
        $myClassMock = $this->getMockBuilder(MyClass::class)
            ->onlyMethods(['apiCallMethod'])
            ->getMock();

        $myClassMock
            ->expects($this->once())
            ->method('apiCallMethod')
            ->willReturn(true);

        $result = $myClassMock->someMethod();

        $this->assertTrue($result);
    }

    public function testUsesAStud()
    {
        $myClassStub = $this->getMockBuilder(MyClass::class)
            ->onlyMethods(['getSomeValue'])
            ->getMock();

        $myClassStub->method('getSomeValue')->willReturn(42);

        $result = $myClassStub->someMethodThatUsesSomeValue();

        $this->assertEquals(42, $result);
    }
}