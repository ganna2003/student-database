<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentinfo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM information WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start session and store username
    session_start();
    $_SESSION['username'] = $username;
    
    // Redirect to home page
    header("Location: profile.php");
    exit();
} else {
    echo "Invalid username or password";
}


$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM teacher WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start session and store username
    session_start();
    $_SESSION['username'] = $username;
    
    // Redirect to home page
    header("Location: teacherinfo.php");
    exit();
} else {
    echo "Invalid username or password";
}



$conn->close();
?>
