<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: PHPLogin.php");
    exit();
}
if ($_SESSION['username'] !== 'Admin') {
    session_start();
    session_destroy();
    header("Location: PHPLogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Transaction</title>
    <link rel="stylesheet" href="CustomerUpdateStyle.css">
    <form action="logout.php" method="post">
         <input type="submit" name="logout" value="Logout" class="logout-button">
    </form>
    <script>
    function populateTextBoxes(Uid, FirstN, LastN, Pay, Mth, Day, Num, WashL, DryL, DropL, SoapL, OtherA, TotalA) {
      document.getElementById('cust_id').value = Uid;
      document.getElementById('Frst_N').value = FirstN;
      document.getElementById('Lst_N').value = LastN;
      document.getElementById('Pymnt_S').value = Pay;
      document.getElementById('Pymnt_M').value = Mth;
      document.getElementById('Dt_Tm').value = Day;
      document.getElementById('Phn_Nmbr').value = Num;
      document.getElementById('Wsh_Ld').value = WashL;
      document.getElementById('Dry_Ld').value = DryL;
      document.getElementById('Sp_Ld').value = SoapL;
      document.getElementById('Drpff_Ld').value = DropL;
      document.getElementById('Thr_Mnt').value = OtherA;
      document.getElementById('Ttl_Mnt').value = TotalA;
    }
    </script>
</head>
<body>
    <h1>Update Transactions</h1>
    <div class="buttons_1">
              <button onclick="window.location.href='PHPAdmin.php'">Customer Input</button>
              <button onclick="window.location.href='PHPUpdateAdmin.php'">Update Transactions</button>
              <button onclick="window.location.href='PHPRegister.php'">Add Employees</button>
              <button onclick="window.location.href='PHPReport.php'">Sales Report</button>
              <p><lable>*Double Click on Desired Transaction Row on Table Below to Populate*</label></p>
          </div>
    <form action='CustomerAdminUpdate.php' method='post'>
        <p>
            <label>ID:</label>
            <input type="text" id="cust_id" name="A" placeholder="Not Updatable" readonly>
        </p>
        <p>
            <label>First Name:</label>
            <input type="text" id="Frst_N" name="B" placeholder="Enter First Name">
        </p>
        <p>
            <label>Last Name:</label>
            <input type="text" id="Lst_N" name="C" placeholder="Enter Last Name">
        </p>
        <p>
            <label>Payment Status:</label>
            <select name="E" id="Pymnt_S">
                <option value="" disabled selected>Select Status</option>
                <option value="Paid">Paid</option>
                <option value="Not Paid">Not Paid</option>
                <option value="Ongoing">Ongoing</option>
            </select>
        </p>
        <p>
            <label>Payment Method:</label>
            <select name="R" id="Pymnt_M">
                <option value="" disabled selected>Select Method</option>
                <option value="Cash">Cash</option>
                <option value="G-Cash">G-Cash</option>
            </select>
        </p>
        <p>
            <label>Date:</label>
            <input type="text" id="Dt_Tm" name="F" placeholder="Not Updatable" readonly>
        </p>
        <p>
            <label>Phone Number:</label>
            <input type="text" id="Phn_Nmbr" name="G" placeholder="Enter Phone Number">
        </p>
            <label>Wash Load:</label>
            <input type="text" id="Wsh_Ld" name="H" placeholder="Enter Wash Load Amount">
        <p>
            <label>Dry Load:</label>
            <input type="text" id="Dry_Ld" name="J" placeholder="Enter Dry Load Amount">
        </p>
        <p>
            <label>Soap Load:</label>
            <input type="text" id="Sp_Ld" name="L" placeholder="Enter Soap Load Amount">
        </p>
        <p>
            <label>Drop Off Load:</label>
            <input type="text" id="Drpff_Ld" name="N" placeholder="Enter Drop Off Load Amount">
        </p>
        <p>
            <label>Other Amount:</label>
            <input type="text" id="Thr_Mnt" name="P" placeholder="Enter Additional/s Total Price">
        </p>
        <p>
            <label>Total Amount:</label>
            <input type="text" id="Ttl_Mnt" name="Q" placeholder="Enter Total Amount">
        </p>
        <p>
            <input type='submit' value='Submit'>
        </p>
    </form>

    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Payment Status</th>
                <th>Payment Method</th>
                <th>Date and Time</th>
                <th>Mobile Number</th>
                <th>Wash Load</th>
                <th>Wash Amount</th>
                <th>Dry Load</th>
                <th>Dry Amount</th>
                <th>Drop Off Load</th>
                <th>Drop Off Amount</th>
                <th>Soap Load</th>
                <th>Soap Amount</th>
                <th>Other Amount</th>
                <th>Total Amount</th>
            </tr>
        </thead>

        <tbody>
            <?php
            // Connect to the MySQL database
            $conn = mysqli_connect("127.0.0.1:3307", "root", "P@ssw0rd", "laundrypalace");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve data from the table
            $sql = "SELECT * FROM college";
            $result = mysqli_query($conn, $sql);

            $dPrice = 70;

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr ondblclick=\"populateTextBoxes('{$row['Cust_ID']}', '{$row['first_name']}', '{$row['last_name']}', '{$row['payment_status']}', '{$row['payment_method']}', '{$row['date']}', '{$row['phone_num']}', '{$row['Wash_Load']}', '{$row['Dry_Load']}', '{$row['DropOff_Load']}', '{$row['Soap_Load']}', '{$row['Other_Amount']}', '{$row['Total_Amount']}')\">";
                    echo "<td>{$row['Cust_ID']}</td>";
                    echo "<td>{$row['first_name']}</td>";
                    echo "<td>{$row['last_name']}</td>";
                    echo "<td>{$row['payment_status']}</td>";
                    echo "<td>{$row['payment_method']}</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "<td>{$row['phone_num']}</td>";
                    echo "<td>{$row['Wash_Load']}</td>";
                    echo "<td>{$row['Wash_Amount']}</td>";
                    echo "<td>{$row['Dry_Load']}</td>";
                    echo "<td>{$row['Dry_Amount']}</td>";
                    echo "<td>{$row['DropOff_Load']}</td>";
                    echo "<td>{$row['DropOff_Amount']}</td>";
                    echo "<td>{$row['Soap_Load']}</td>";
                    echo "<td>{$row['Soap_Amount']}</td>";
                    echo "<td>{$row['Other_Amount']}</td>";
                    echo "<td>{$row['Total_Amount']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No data available</td></tr>";
            }

            // Close the MySQL connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html> 