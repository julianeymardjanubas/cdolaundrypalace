<?php

use PHPUnit\Framework\TestCase;

class PHPEngineTest extends TestCase
{
    public function testFormData()
    {
        // Create a mock connection object
        $connection = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Set expectations for the connection
        $connection->expects($this->once())
            ->method('connect')
            ->with('127.0.0.1:3307', 'root', 'P@ssw0rd', 'laundrypalace')
            ->willReturn(true);

        // Inject the mock connection into the PHPEngine object
        $engine = new PHPEngine($connection);

        // Set the form data
        $_REQUEST['first_name'] = 'John';
        $_REQUEST['last_name'] = 'Doe';
        $_REQUEST['paid_status'] = 'paid';
        $_REQUEST['number'] = '09123456789';
        $_REQUEST['wLoad'] = 2;
        $_REQUEST['dLoad'] = 3;
        $_REQUEST['dOffL'] = 1;
        $_REQUEST['sLoad'] = 1;
        $_REQUEST['oLoad'] = 5;

        // Expectations for the database insert
        $connection->expects($this->once())
            ->method('query')
            ->with($this->stringContains("INSERT INTO college"))
            ->willReturn(true);

        // Run the code
        ob_start();
        $engine->processForm();
        $output = ob_get_clean();

        // Assertions
        $this->assertStringContainsString("Data stored in the Database successfully", $output);
        $this->assertStringContainsString("<strong>First Name: </strong>John</p>", $output);
        $this->assertStringContainsString("<strong>Last Name: </strong>Doe</p>", $output);
        $this->assertStringContainsString("<strong>Paid:</strong> paid</p>", $output);
        // ... add more assertions as needed
    }
}

class PHPEngine
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function processForm()
    {
        $conn = $this->connection;

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        date_default_timezone_set("America/New_York");

        // Taking all 5 values from the form data(input)
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $paid = $_REQUEST['paid_status'];
        $date = date("Y/m/d--H:i");
        $number = $_REQUEST['number'];
        $wLoad = $_REQUEST['wLoad'];
        $wPrice = 70;
        $wAmount = $wLoad * $wPrice;
        $dLoad = $_REQUEST['dLoad'];
        $dPrice = 70;
        $dAmount = ($dLoad * $dPrice);
        $dOFFl = $_REQUEST['dOffL'];
        $dOFFPrice = 15;
        $dOFFa = $dOFFl * $dOFFPrice;
        $sLoad = $_REQUEST['sLoad'];
        $sPrice = 10;
        $sAmount = $sLoad * $sPrice;
        $oLoad = $_REQUEST['oLoad'];
        $Total = $wAmount + $dAmount + $oLoad + $dOFFa + $sAmount;

        // Performing insert query execution
        // here our table name is college
        if (empty($paid)) {
            echo "Please check the check boxes";
        } else {
            if (is_numeric($number) && stripos($number, "09") === 0 && strlen($number) === 11) {
                if (
                    str_contains($first_name, "0") ||
                    str_contains($first_name, "1") ||
                    str_contains($first_name, "2") ||
                    str_contains($first_name, "3") ||
                    str_contains($first_name, "4") ||
                    str_contains($first_name, "5") ||
                    str_contains($first_name, "6") ||
                    str_contains($first_name, "7") ||
                    str_contains($first_name, "8") ||
                    str_contains($first_name, "9") ||
                    str_contains($first_name, "~") ||
                    str_contains($first_name, "`") ||
                    str_contains($first_name, "!") ||
                    str_contains($first_name, "@") ||
                    str_contains($first_name, "#") ||
                    str_contains($first_name, "$") ||
                    str_contains($first_name, "%") ||
                    str_contains($first_name, "^") ||
                    str_contains($first_name, "&") ||
                    str_contains($first_name, "*") ||
                    str_contains($first_name, "(") ||
                    str_contains($first_name, ")") ||
                    str_contains($first_name, "[") ||
                    str_contains($first_name, "]") ||
                    str_contains($first_name, "{") ||
                    str_contains($first_name, "}") ||
                    str_contains($first_name, ";") ||
                    str_contains($first_name, ":") ||
                    str_contains($first_name, "'") ||
                    str_contains($first_name, "-") ||
                    str_contains($first_name, "_") ||
                    str_contains($first_name, "+") ||
                    str_contains($first_name, "=") ||
                    str_contains($first_name, "<") ||
                    str_contains($first_name, ">") ||
                    str_contains($first_name, "?")
                ) {
                    echo "Invalid first name";
                } else {
                    if (
                        str_contains($last_name, "0") ||
                        str_contains($last_name, "1") ||
                        str_contains($last_name, "2") ||
                        str_contains($last_name, "3") ||
                        str_contains($last_name, "4") ||
                        str_contains($last_name, "5") ||
                        str_contains($last_name, "6") ||
                        str_contains($last_name, "7") ||
                        str_contains($last_name, "8") ||
                        str_contains($last_name, "9") ||
                        str_contains($last_name, "~") ||
                        str_contains($last_name, "`") ||
                        str_contains($last_name, "!") ||
                        str_contains($last_name, "@") ||
                        str_contains($last_name, "#") ||
                        str_contains($last_name, "$") ||
                        str_contains($last_name, "%") ||
                        str_contains($last_name, "^") ||
                        str_contains($last_name, "&") ||
                        str_contains($last_name, "*") ||
                        str_contains($last_name, "(") ||
                        str_contains($last_name, ")") ||
                        str_contains($last_name, "[") ||
                        str_contains($last_name, "]") ||
                        str_contains($last_name, "{") ||
                        str_contains($last_name, "}") ||
                        str_contains($last_name, ";") ||
                        str_contains($last_name, ":") ||
                        str_contains($last_name, "'") ||
                        str_contains($last_name, "-") ||
                        str_contains($last_name, "_") ||
                        str_contains($last_name, "+") ||
                        str_contains($last_name, "=") ||
                        str_contains($last_name, "<") ||
                        str_contains($last_name, ">") ||
                        str_contains($last_name, "?")
                    ) {
                        echo "Invalid last name";
                    } else {
                        $sql = "INSERT INTO college (first_name, last_name, paid_status, date, number, wLoad, wAmount, dLoad, dAmount, dOffL, dOFFa, sLoad, sAmount, oLoad, Total) 
                    VALUES ('$first_name', '$last_name', '$paid', '$date', '$number', '$wLoad', '$wAmount', '$dLoad', '$dAmount', '$dOFFl', '$dOFFa', '$sLoad', '$sAmount', '$oLoad', '$Total')";
                        if ($conn->query($sql) === true) {
                            echo "Data stored in the Database successfully";
                            echo "<p><strong>First Name: </strong>$first_name</p>";
                            echo "<p><strong>Last Name: </strong>$last_name</p>";
                            echo "<p><strong>Paid:</strong> $paid</p>";
                            // ... echo more information as needed
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . $conn->error;
                        }
                    }
                }
            } else {
                echo "Invalid phone number";
            }
        }
    }
}
?>