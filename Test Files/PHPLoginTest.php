<?php
use PHPUnit\Framework\TestCase;

class PHPLoginTest extends TestCase {
    
    public function testRedirectForUser() {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['UserName'] = 'User';
        
        ob_start();
        include 'PHPLogin.php';
        $output = ob_get_clean();
        
        $this->assertStringContainsString('Location: PHPUser.php', $output);
    }
    
    public function testRedirectForAdmin() {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['UserName'] = 'Admin';
        
        ob_start();
        include 'PHPLogin.php';
        $output = ob_get_clean();
        
        $this->assertStringContainsString('Location: PHPAdmin.php', $output);
    }
    
    public function testLoginForm() {
        session_start();
        $_SESSION['loggedin'] = false;
        
        ob_start();
        include 'PHPLogin.php';
        $output = ob_get_clean();
        
        $this->assertStringContainsString('<form action="LoginEngine.php" method="post">', $output);
        $this->assertStringContainsString('Login', $output);
        $this->assertStringContainsString('Username', $output);
        $this->assertStringContainsString('Password', $output);
    }
}
?>