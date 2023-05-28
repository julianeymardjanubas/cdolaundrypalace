<?php

require_once 'path/to/PHPUnit/PHPRegisterEngine.php';

class InsertPageTest extends PHPUnit_Framework_TestCase
{
    private $conn;

    protected function setUp()
    {
        $this->conn = mysqli_connect("127.0.0.1:3307", "root", "P@ssw0rd", "laundrypalace");
    }

    protected function tearDown()
    {
        mysqli_close($this->conn);
    }

    public function testValidUserInsertion()
    {
        $_REQUEST['first_name'] = 'UserJohn';
        $_REQUEST['last_name'] = 'password123';

        ob_start();
        include 'path/to/insert_page.php';
        $output = ob_get_clean();

        $expected = "<h3>data stored in a database successfully. Please browse your localhost php my admin to view the updated data</h3>\nUserJohn\n password123\n ";
        $this->assertEquals($expected, $output);
    }

    public function testInvalidUserInsertion()
    {
        $_REQUEST['first_name'] = 'John';
        $_REQUEST['last_name'] = 'password123';

        ob_start();
        include 'path/to/insert_page.php';
        $output = ob_get_clean();

        $expected = "Invalid user name";
        $this->assertEquals($expected, $output);
    }
}