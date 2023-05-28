<?php
$conn = mysqli_connect("127.0.0.1:3307", "root", "P@ssw0rd", "laundrypalace");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$recordId = $_REQUEST['A'];
$name = $_REQUEST['B'];
$pass = $_REQUEST['C'];
// ... and so on for other fields
if (str_contains($first_name, "User") || str_contains($first_name, "Admin")) {
    if (stripos($first_name, "User") === 0 || stripos($first_name, "Admin") === 0) {
        $sql1 = "UPDATE logininfo SET UserName='$name', Password='$pass' WHERE id='$recordId'";
        $result1 = $conn->query($sql1);

        // Update the record in the database
        if ($conn->query($sql1) === TRUE) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid user name";
    }
} else {
    echo "Invalid user name";
}

?>