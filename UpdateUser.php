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
    <title>Update Employees</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #F8F8F8;
        color: #333333;
        margin: 0;
        padding: 20px;
    }

    h1 {
        color: #66054C;
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        border-collapse: collapse;
        margin-top: 30px;
        width: 100%;
        margin-bottom: 30px;
    }

    table, th, td {
        border: 1px solid black;
        padding: 5px;
    }

    form {
        width: 300px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #CCCCCC;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #06B0F3;
        color: #FFFFFF;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #047ABF;
    }

    .password-row {
        display: flex;
        align-items: center;
    }

    .password-toggle {
        margin-left: 10px;
    }

    .logout-button[type="submit"] {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: red;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    }

    .logout-button:hover,
    .logout-button[type="submit"]:hover {
    background-color: #CC0000;
    }
    .buttons_1{
        text-align: center;
        align-items: center;
    }
    </style>
    <form action="logout.php" method="post">
         <input type="submit" name="logout" value="Logout" class="logout-button">
    </form>
    <script>
    function populateTextBoxes(Uid, name, age) {
      document.getElementById('User_id').value = Uid;
      document.getElementById('username').value = name;
      document.getElementById('password').value = age;
    }
    
    function togglePasswordVisibility(inputId, toggleId) {
      var passwordInput = document.getElementById(inputId);
      passwordInput.type = passwordInput.type === "password" ? "text" : "password";
      var toggleButton = document.getElementById(toggleId);
      toggleButton.textContent = passwordInput.type === "password" ? "Show Password" : "Hide Password";
    }
    </script>
</head>
<body>
    <h1>Update Employees</h1>
    <div class="buttons_1">
              <button onclick="window.location.href='PHPAdmin.php'">Customer Input</button>
              <button onclick="window.location.href='PHPUpdateAdmin.php'">Update Transactions</button>
              <button onclick="window.location.href='PHPRegister.php'">Add Employees</button>
              <button onclick="window.location.href='UpdateUser.php'">Update Employees</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Password</th>
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
            $sql = "SELECT * FROM logininfo";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $rowId = $row['id'];
                    $passwordInputId = "password_" . $rowId;
                    $toggleButtonId = "toggle_" . $rowId;
                    echo "<tr ondblclick=\"populateTextBoxes('{$row['id']}', '{$row['UserName']}', '{$row['Password']}')\">";
                    echo "<td><input type='text' name='D' id='Number' value='{$row['id']}' required></td>";
                    echo "<td><input type='text' name='E' id='Number' value='{$row['UserName']}' required></td>";
                    echo "<td class='password-row'><input type='password' name='F' id='{$passwordInputId}' value='{$row['Password']}' required>";
                    echo "<input type='checkbox' id='{$toggleButtonId}' class='password-toggle' onchange=\"togglePasswordVisibility('{$passwordInputId}', '{$toggleButtonId}')\">";
                    echo "<label for='{$toggleButtonId}'>Show Password</label></td>";
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

    <form action='Update.php' method='post'>
        <p><lable>*Double click on User's Row to Populate*</label></p>
        <label for="User_id">ID:</label>
        <input type="text" id="User_id" name="A" readonly>
        <br>
        <label for="username">User Name:</label>
        <input type="text" id="username" name="B">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="C">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
