<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
</head>
<body>
    <?php
    echo "register.php";
    require('connect.inc.php');

    // If form submitted, insert values into the database.
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Sanitize input to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "INSERT INTO users (username, password, email) VALUES('$username', '$password', '$email')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: success.html");
            // echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.html'>Login</a></div>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>

    <!-- The registration form -->
    <!-- Uncomment this section if you want to display the registration form -->
    <!--
    <div class="form">
        <h1 align="center">Registration Form</h1>
        <form name="registration" action="" method="post">
            USERNAME:<input type="text" name="username" placeholder="Username" required /><br><br>
            EMAIL:<input type="email" name="email" placeholder="Email" required /><br><br>
            PASSWORD:<input type="password" name="password" placeholder="Password" required /><br><br>
            <input type="submit" name="submit" value="Register" /><br><br>
        </form>
    </div>
    -->
</body>
</html>
