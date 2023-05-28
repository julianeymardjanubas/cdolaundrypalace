<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php
        session_start();

        // Establish a connection to the database
        $conn = mysqli_connect("127.0.0.1:3307", "root", "P@ssw0rd", "laundrypalace");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $first_name = $_REQUEST['username'];
        $last_name = $_REQUEST['password'];

        $sql1 = "SELECT * FROM logininfo WHERE UserName = '$first_name'";
        $result1 = $conn->query($sql1);
        $sql2 = "SELECT * FROM logininfo WHERE Password = '$last_name'";
        $result2 = $conn->query($sql2);

        if ($result1->num_rows > 0 && $result2->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $row2 = $result2->fetch_assoc();

            if ($row1['UserName'] === $row2['UserName']) {
                if (stripos($first_name, "User") === 0) {
                    if (strcmp($first_name, $row1['UserName']) === 0 && strcmp($last_name, $row1['Password']) === 0) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $first_name;
                        header("Location: PHPUser.php");
                        exit();
                    } else {
                        $_SESSION['login_error'] = "Invalid Username or Password";
                        header("Location: PHPLogin.php");
                        exit();
                    }
                } elseif (stripos($first_name, "Admin") === 0) {
                    if (strcmp($first_name, $row1['UserName']) === 0 && strcmp($last_name, $row1['Password']) === 0) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $first_name;
                        header("Location: PHPAdmin.php");
                        exit();
                    } else {
                        $_SESSION['login_error'] = "Invalid Username or Password";
                        header("Location: PHPLogin.php");
                        exit();
                    }
                } else {
                    $_SESSION['login_error'] = "Invalid Username, please change with Admin Permission.";
                    header("Location: PHPLogin.php");
                    exit();
                }
            } else {
                $_SESSION['login_error'] = "Inputs come from different rows.";
                header("Location: PHPLogin.php");
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Input value not found in the database.";
            header("Location: PHPLogin.php");
            exit();
        }

        mysqli_close($conn);
        ?>
    </center>
</body>
</html>