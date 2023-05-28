<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
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


        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];

        if (str_contains($first_name, "User") || str_contains($first_name, "Admin")) {
            if (stripos($first_name, "User") === 0 || stripos($first_name, "Admin") === 0) {
                $sql = "INSERT INTO logininfo (UserName,Password) VALUES ('$first_name','$last_name')";

                if (mysqli_query($conn, $sql)) {
                    echo "<h3>data stored in a database successfully."
                        . " Please browse your localhost php my admin"
                        . " to view the updated data</h3>";
                    echo nl2br("\n$first_name\n $last_name\n ");
                } else {
                    echo "ERROR: Hush! Sorry $sql. "
                        . mysqli_error($conn);
                }
            } else {
                echo "Invalid user name";
            }
        } else {
            echo "Invalid user name";
        }



        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>