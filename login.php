<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <?php
    require('connect.inc.php');
    session_start();

    // Get user's IP address
    $ip_addr = $_SERVER['REMOTE_ADDR'];

    // Insert user's IP address into visitors table
    $q = "INSERT INTO visitors VALUES('$ip_addr')";
    mysqli_query($conn, $q);

    // If form submitted, insert values into the database.
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Sanitize input to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Fetch user data from the users table
        $query = "SELECT username, password FROM `users` WHERE username='$username'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $row = mysqli_fetch_assoc($result);

            // Check if the provided password matches the stored password
            if ($password == $row['password']) {
                // Assign username to the session variable
                $_SESSION['username'] = $username; // Assuming username is unique

                // Debug message to check if header is getting called
                echo "Redirecting to core.php...";

                // Redirect user to core.php
                header("Location: core.php");
                exit(); // Ensure that no further code is executed after the header
            } else {
                header("Location: wrong.html"); // Incorrect password
            }
        } else {
            header("Location: wrong.html"); // User not found
        }
    }
    ?>

    <!-- The login form -->
    <!-- Uncomment this section if you want to display the login form -->
    <!--
    <div class="form">
        <h1>Log In</h1>
        <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input name="submit" type="submit" value="Login" />
        </form>
        <p>Not registered yet? <a href='register.php'>Register Here</a></p>
    </div>
    -->
</body>
</html>
