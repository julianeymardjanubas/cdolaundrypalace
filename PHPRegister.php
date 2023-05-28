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
<html lang="en">
   <head>
      <title>Laundry palace data entry</title>
      <link rel="stylesheet" href="FormStyle.css">
      <form action="logout.php" method="post">
         <input type="submit" name="logout" value="Logout" class="logout-button">
      </form>
   </head>
   <body>
      <center>
         <h1>Storing Form data in Database</h1>
          <div class="buttons_1">
              <button onclick="window.location.href='PHPAdmin.php'">Customer Input</button>
              <button onclick="window.location.href='PHPUpdateAdmin.php'">Update Transactions</button>
              <button onclick="window.location.href='PHPRegister.php'">Add Employees</button>
              <button onclick="window.location.href='UpdateUser.php'">Update Employees</button>
          </div>
         <form action="PHPRegisterEngine.php" method="post">
      <p>
         <label for="firstName">User Name:</label>
         <input type="text" name="first_name" id="firstName" placeholder="Enter First Name" required>
      </p>
             
      <p>
         <label for="lastName">Password:</label>
         <input type="text" name="last_name" id="lastName" placeholder="Enter Last Name" required>
      </p>
            <input type="submit" value="Submit">
         </form>
      </center>
   </body>
</html>