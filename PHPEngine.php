<!DOCTYPE html>
<html>

<head>
    <title>Laundry Palace</title>
    <link rel="stylesheet" href="FormStyle.css">
</head>

<body>
    <center>
        <?php

        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("127.0.0.1:3307", "root", "P@ssw0rd", "laundrypalace");

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        date_default_timezone_set("America/New_York");

        // Taking all 5 values from the form data(input)
        $fname = $_REQUEST['F_Name'];
        $lname = $_REQUEST['L_Name'];
        $paid = $_REQUEST['P_Status'];
        $payment = $_REQUEST['Pmthd'];
        $dateNtime = date("Y/m/d---H:i");
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
                    } else {
                        if (is_numeric($wLoad) && is_numeric($dLoad) && is_numeric($dOFFl) && is_numeric($oLoad)) {
                            $sql = "INSERT INTO college (first_name,last_name,payment_status,payment_method,date,phone_num,Wash_Load,Wash_Amount,Dry_Load,Dry_Amount,DropOff_Load,DropOff_Amount,Soap_Load,Soap_Amount,Other_Amount,Total_Amount) 
                                    VALUES ('$fname','$lname','$paid','$payment','$dateNtime','$number','$wLoad','$wAmount','$dLoad','$dAmount','$dOFFl','$dOFFa','$sLoad','$sAmount','$oLoad','$Total')";

                            if (mysqli_query($conn, $sql)) {
                                echo "<h2>Data stored in the Database successfully. Please browse your localhost php my admin to view the updated data</h3> ";
                                echo"</br>";
                                echo"</br>";
                                echo "<div class='AddDiv' style='text-align: left; margin: 0 auto; width: fit-content;'>";
                                echo "<p><strong>First Name: </strong>$fname</p>";
                                echo "<p><strong>Last Name: </strong>$lname</p>";
                                echo "<p><strong>Paid: </strong> $paid</p>";
                                echo "<p><strong>Payment Method: </strong> $payment</p>";
                                echo "<p><strong>Date and Time: </strong>$dateNtime</p>";
                                echo "<p><strong>Number: </strong>$number</p>";
                                echo "<p><strong>Wash Load: </strong>$wLoad</p>";
                                echo "<p><strong>Wash Amount: </strong>$wAmount</p>";
                                echo "<p><strong>Dry Load: </strong>$dLoad</p>";
                                echo "<p><strong>Dry Amount: </strong>$dAmount</p>";
                                echo "<p><strong>Drop Off Load: </strong>$dOFFl</p>";
                                echo "<p><strong>Drop Off Amount: </strong>$dOFFa</p>";
                                echo "<p><strong>Soap Load: </strong>$sLoad</p>";
                                echo "<p><strong>Soap Amount: </strong>$sAmount</p>";
                                echo "<p><strong>Others: </strong>$oLoad</p>";
                                echo "<p><strong>Total Amount: </strong>$Total</p>";
                                echo "</div>";
                                echo "<button onclick=\"window.location.href='PHPUser.php'\">Sales Report</button>";
                            } else {
                                echo "ERROR: Hush! Sorry $sql. "
                                    . mysqli_error($conn);
                            }
                        } else {
                            echo "Inputs for Load should be INT value only";
                        }

                    }
                }
            } else {
                echo "Invalid Phone number: type1 Error";
            }
        }
        //Fix this I guess

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
</html>