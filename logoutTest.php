<?php

use PHPUnit\Framework\TestCase;

class LogoutTest extends TestCase
{
    public function testLogout()
    {
        session_start();



        require 'logout.php';

        $this->assertNull($_SESSION['your_session_variable']);

        $this->assertEquals('Location: PHPLogin.php', xdebug_get_headers()[0]);
    }
}
?>