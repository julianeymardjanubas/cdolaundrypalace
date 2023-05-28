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
         <h1>Storing Form data in Database</h1>
         <form action="PHPAdminEngine.php" method="post">
          <div class="buttons_1">
              <button onclick="window.location.href='PHPAdmin.php'">Customer Input</button>
              <button onclick="window.location.href='PHPUpdateAdmin.php'">Update Transactions</button>
              <button onclick="window.location.href='PHPRegister.php'">Add Employees</button>
              <button onclick="window.location.href='PHPReport.php'">Sales Report</button>
          </div>
      <p>
         <label for="firstName">First Name:</label>
         <input type="text" name="F_Name" id="firstName" placeholder="Enter First Name" required>
      </p>
             
      <p>
         <label for="lastName">Last Name:</label>
         <input type="text" name="L_Name" id="lastName" placeholder="Enter Last Name" required>
      </p>

      <p>
         <label for="Number">Phone Number:</label>
         <input type="text" name="number" id="Number" placeholder="Enter Phone Number" required>
      </p>
             
      <p>
         <label for="paidStatus">Paid Status:</label>
         <select name="P_Status" id="paidStatus">
            <option value="" disabled selected>Select Status</option>
            <option value="Paid">Paid</option>
            <option value="Not Paid">Not Paid</option>
            <option value="Ongoing">Ongoing</option>
         </select>
      </p>

      <p>
         <label for="paymentmthd">Payment Method:</label>
         <select name="Pmthd" id="paymentmthd">
            <option value="" disabled selected>Select Method</option>
            <option value="Cash">Cash</option>
            <option value="G-Cash">G-Cash</option>
         </select>
      </p>

      <p>
         <label for="washLoad">Wash Load:</label>
         <div class="counter-container">
            <button type="button" onclick="decrementCounter('washLoad')">-</button>
            <input type="number" name="wLoad" id="washLoad" value="0" min="0">
            <button type="button" onclick="incrementCounter('washLoad')">+</button>
         </div>
      </p>

      <p>
         <label for="dryLoad">Dry Load:</label>
         <div class="counter-container">
            <button type="button" onclick="decrementCounter('dryLoad')">-</button>
            <input type="number" name="dLoad" id="dryLoad" value="0" min="0">
            <button type="button" onclick="incrementCounter('dryLoad')">+</button>
         </div>
		</p>
          <p>
     <label for="dropOffL">Drop off Load:</label>
     <div class="counter-container">
        <button type="button" onclick="decrementCounter('dropOffL')">-</button>
        <input type="number" name="dOffL" id="dropOffL" value="0" min="0">
        <button type="button" onclick="incrementCounter('dropOffL')">+</button>
     </div>
  </p>

  <p>
     <label for="soapLoad">Soap Load:</label>
     <div class="counter-container">
        <button type="button" onclick="decrementCounter('soapLoad')">-</button>
        <input type="number" name="sLoad" id="soapLoad" value="0" min="0">
        <button type="button" onclick="incrementCounter('soapLoad')">+</button>
     </div>
  </p>
  
  <p>
       <label for="otherLoad">Others:</label>
       <input type="text" name="oLoad" id="otherLoad" placeholder="Enter Additional/s Total Price " required>
  </p>

  <p>
     <input type="submit" value="Submit">
  </p>
  </form>
   <script>
      function incrementCounter(inputId) {
         const inputElement = document.getElementById(inputId);
         inputElement.stepUp();
      }

      function decrementCounter(inputId) {
         const inputElement = document.getElementById(inputId);
         inputElement.stepDown();
      }
   </script>
   </body>
</html>