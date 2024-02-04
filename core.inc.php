<?php
session_start();

function loggedin()
{
    return isset($_SESSION['username']);
}

function getuser($conn, $field)
{
    if (!loggedin()) {
        return false;
    }

    $username = $_SESSION['username'];

    // Assuming you have a users table in your database
    $query = "SELECT $field FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row[$field];
    } else {
        return false;
    }
}
?>
