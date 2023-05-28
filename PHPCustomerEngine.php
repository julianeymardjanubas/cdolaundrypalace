<?php
$conn = mysqli_connect("127.0.0.1:3307", "root", "P@ssw0rd", "laundrypalace");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$CustId = $_REQUEST['A'];
$fname = $_REQUEST['B'];
$lname = $_REQUEST['C'];
$p_stat = $_REQUEST['E'];
$p_mthd = $_REQUEST['R'];
$dt = $_REQUEST['F'];
$p_num = $_REQUEST['G'];
$W_Load = $_REQUEST['H'];
$W_Amount = $W_Load * 70;
$D_Load = $_REQUEST['J'];
$D_Amount = $D_Load * 70;
$DLoad_L = $_REQUEST['L'];
$DLoad_A = $DLoad_L * 15;
$S_Load = $_REQUEST['N'];
$S_Amount = $S_Load * 10;
$O_Amount = $_REQUEST['P'];
$T_A = $W_Amount + $D_Amount + $DLoad_A + $S_Amount + $O_Amount;


if (
    str_contains($fname, "0") ||
    str_contains($fname, "1") ||
    str_contains($fname, "2") ||
    str_contains($fname, "3") ||
    str_contains($fname, "4") ||
    str_contains($fname, "5") ||
    str_contains($fname, "6") ||
    str_contains($fname, "7") ||
    str_contains($fname, "8") ||
    str_contains($fname, "9") ||
    str_contains($fname, "~") ||
    str_contains($fname, "`") ||
    str_contains($fname, "!") ||
    str_contains($fname, "@") ||
    str_contains($fname, "#") ||
    str_contains($fname, "$") ||
    str_contains($fname, "%") ||
    str_contains($fname, "^") ||
    str_contains($fname, "&") ||
    str_contains($fname, "*") ||
    str_contains($fname, "(") ||
    str_contains($fname, ")") ||
    str_contains($fname, "[") ||
    str_contains($fname, "]") ||
    str_contains($fname, "{") ||
    str_contains($fname, "}") ||
    str_contains($fname, ";") ||
    str_contains($fname, ":") ||
    str_contains($fname, "'") ||
    str_contains($fname, "-") ||
    str_contains($fname, "_") ||
    str_contains($fname, "+") ||
    str_contains($fname, "=") ||
    str_contains($fname, "<") ||
    str_contains($fname, ">") ||
    str_contains($fname, "?")
) {
    echo "Invalid first name";
} else {
    if (
        str_contains($lname, "0") ||
        str_contains($lname, "1") ||
        str_contains($lname, "2") ||
        str_contains($lname, "3") ||
        str_contains($lname, "4") ||
        str_contains($lname, "5") ||
        str_contains($lname, "6") ||
        str_contains($lname, "7") ||
        str_contains($lname, "8") ||
        str_contains($lname, "9") ||
        str_contains($lname, "~") ||
        str_contains($lname, "`") ||
        str_contains($lname, "!") ||
        str_contains($lname, "@") ||
        str_contains($lname, "#") ||
        str_contains($lname, "$") ||
        str_contains($lname, "%") ||
        str_contains($lname, "^") ||
        str_contains($lname, "&") ||
        str_contains($lname, "*") ||
        str_contains($lname, "(") ||
        str_contains($lname, ")") ||
        str_contains($lname, "[") ||
        str_contains($lname, "]") ||
        str_contains($lname, "{") ||
        str_contains($lname, "}") ||
        str_contains($lname, ";") ||
        str_contains($lname, ":") ||
        str_contains($lname, "'") ||
        str_contains($lname, "-") ||
        str_contains($lname, "_") ||
        str_contains($lname, "+") ||
        str_contains($lname, "=") ||
        str_contains($lname, "<") ||
        str_contains($lname, ">") ||
        str_contains($lname, "?")
    ) {
        echo "Invalid last name";
    } else{
        if (is_numeric($p_num) && stripos($p_num, "09") === 0 && strlen($p_num) === 11) {
            if (is_numeric($W_Load) && is_numeric($D_Load) && is_numeric($DLoad_L) && is_numeric($O_Amount)) {
                $sql1 = "UPDATE college SET first_name='$fname', last_name='$lname', payment_status='$p_stat', payment_method='$p_mthd', date='$dt', phone_num='$p_num', Wash_Load='$W_Load', Wash_Amount='$W_Amount', Dry_Load='$D_Load', Dry_Amount='$D_Amount', DropOff_Load='$DLoad_L', DropOff_Amount='$DLoad_A', Soap_Load='$S_Load', Soap_Amount='$S_Amount', Other_Amount='$O_Amount', Total_Amount='$T_A' WHERE Cust_ID='$CustId'";
                // Update the record in the database
                if ($conn->query($sql1) === TRUE) {
                    echo "Record updated successfully.";
                    echo "<button onclick=\"window.location.href='PHPCustomerUpdate.php'\">Sales Report</button>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Inputs for Load should be INT value only";
            }
        } else {
            echo "Invalid Phone Number";
        }
    }
}

// ... and so on for other fields


?>