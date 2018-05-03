<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Email.php";

final class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress()
    {
        // Its ok if constructor NOT launch an exception (for instance, a bad email)
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('userexample.com')
            );
    }
    
    public function testCannotBeCreatedFromInvalidEmailAddress()
    {
        $this->expectException(InvalidArgumentException::class);        
        Email::fromString('invalid');
    }
    
    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
            );
    }
}

