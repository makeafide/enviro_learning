<?php declare(strict_types=1);
require_once('bin/settings/settings.php');
require_once('bin/classes/auth/auth.php');
use PHPUnit\Framework\TestCase;

final class loginTest extends TestCase
{
    public function testLogin(): void
    {
        $this->assertEquals('user@example.com',authClass::login('user@example.com',''));
    }

}