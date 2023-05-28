<?php
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    public function testSessionRedirect()
    {
        // Start output buffering
        ob_start();

        // Set 'loggedin' session variable to null
        $_SESSION['loggedin'] = null;

        // Call the session.php code
        include 'session.php';
        
        // Get the output buffer contents
        $output = ob_get_clean();
        
        // Assert that the output buffer contains the expected redirect header
        $this->assertStringContainsString('Location: PHPLogin.php', $output);
    }

    public function testSessionLoggedIn()
    {
        // Start output buffering
        ob_start();

        // Set 'loggedin' session variable to true
        $_SESSION['loggedin'] = true;

        // Call the session.php code
        include 'session.php';
        
        // Get the output buffer contents
        $output = ob_get_clean();
        
        // Assert that the output buffer is empty (no redirect header)
        $this->assertEmpty($output);
    }
}
?>
