<?php
use PHPUnit\Framework\TestCase;

class PHPRegisterTest extends TestCase
{
    public function testFormStructure()
    {
        ob_start();
        include 'PHPRegister.php';
        $output = ob_get_clean();

        // Check if the form tag exists
        $this->assertStringContainsString('<form action="PHPRegisterEngine.php" method="post">', $output);

        // Check if the first name input field exists
        $this->assertStringContainsString('<input type="text" name="first_name" id="firstName" placeholder="Enter First Name" required>', $output);

        // Check if the last name input field exists
        $this->assertStringContainsString('<input type="text" name="last_name" id="lastName" placeholder="Enter Last Name" required>', $output);

        // Check if the submit button exists
        $this->assertStringContainsString('<input type="submit" value="Submit">', $output);
    }
}
?>