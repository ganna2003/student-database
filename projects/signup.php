<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentinfo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Studentname = $_POST['Studentname'];
$address = $_POST['Address'];
$email = $_POST['Email'];
$prn = $_POST['PRN'];
$age = $_POST['Age'];
$branch = $_POST['Branch'];
$contactNumber = $_POST['ContactNumber'];
$username = $_POST['username'];
$password = $_POST['password'];


$filename = $_FILES["Images"]["name"];
$tempname = $_FILES["Images"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname, $folder);


//$target_file = $folder . basename($_FILES["Images"]["name"]);



// Prepare insert query
$sql = "INSERT INTO information (Studentname, Address, Email, PRN, Age, Branch, ContactNumber, Username, Password,Images) 
        VALUES ('$Studentname', '$address', '$email', '$prn', $age, '$branch', '$contactNumber', '$username', '$password','$folder')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
