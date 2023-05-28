<?php
session_start();

if (isset($_SESSION['loggedin'])) {
    // If the user is already logged in, they'll be redirected to the appropriate page
    if (stripos($_SESSION['UserName'], "User") === 0) {
        header("Location: PHPUser.php");
        exit();
    } elseif (stripos($_SESSION['UserName'], "Admin") === 0) {
        header("Location: PHPAdmin.php");
        exit();
    }
}

$error = "";

if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Laundry Palace - Login</title>
      <link rel="stylesheet" href="CSS_FrontEnd.css">
      <style>
         .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <div class="login-form">
            <h1>Login</h1>
            <?php if (!empty($error)) { ?>
            <div class="error-message"><?php echo $error; ?></div>
            <?php } ?>
            <form action="LoginEngine.php" method="post">
               <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" placeholder="Enter Username" required>
               </div>
               <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" placeholder="Enter Password" required>
               </div>
               <div class="form-group">
                  <input type="submit" value="Login">
               </div>
            </form>
         </div>
      </div>
   </body>
</html>
