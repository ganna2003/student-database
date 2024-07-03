<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentinfo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve student information based on username
$username = $_SESSION['username'];
$sql = "SELECT * FROM information WHERE username='$username'";
$result = $conn->query($sql);

// Initialize variables to store student information
$name = "";
$email = "";
$address = "";
$prn = "";
$age = "";
$branch = "";
$contactNumber = "";
$folder = "";

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // Fetch student information
    $row = $result->fetch_assoc();
    $name = $row["Studentname"];
    $email = $row["Email"];
    $address = $row["Address"];
    $prn = $row["PRN"];
    $age = $row["Age"];
    $branch = $row["Branch"];
    $contactNumber = $row["ContactNumber"];
    $folder = $row["Images"];
    // Add more fields as needed
} else {
    echo "No student found with this username";
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            position: 100%;
            background-color: #fad6a5;
        }

        .container {
            display: flex;
        }

        .sidebar {
            background-color: #964b00;
            padding: 20px;
            height: 100vh;
            width: 200px;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            color: red;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .sidebar a:hover {
            background-color: #fdf5e6;
        }

        .sidebar .active {
            background-color: #fad6a5;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            background-color: #cd853f ;
            margin-top: 0;
        }

        .content {
            flex: 1;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fdf5e6;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .content-details {
            width: 100%;
        }
        .content-image  {
            float: right;
            width: 300px;

        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <a href="#" class="active">Home</a>
            <a href="Assignment.php">Assignment</a>
            <a href="#">View Grade</a>
            <a href="#">View Courses</a>
        </nav>
        <main class="content">

            <div class="content-details">
                <h1>Student Information</h1>
            <div class="content-image">
                <?php echo "<img src= '".$folder."' height='200px' width='200px'>"; ?>
            </div>
                <p><strong>Name:</strong> <?php echo $name; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Address:</strong> <?php echo $address; ?></p>
                <p><strong>PRN Number:</strong> <?php echo $prn; ?></p>
                <p><strong>Age:</strong> <?php echo $age; ?></p>
                <p><strong>Branch:</strong> <?php echo $branch; ?></p>
                <p><strong>Contact Number:</strong> <?php echo $contactNumber; ?></p>
            </div>
        </main>
    </div>
</body>
</html>


