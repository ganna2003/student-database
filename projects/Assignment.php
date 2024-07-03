<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentinfo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the assignments from the database
$sql = "SELECT * FROM project";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment Download</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fad6a5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff8e7;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            margin-top: 50px;
            border: #343a40;
        }

        h2 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        .card {
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            color: #343a40;
            margin-bottom: 10px;
            
        }

        .btn-primary {
            background-color: #b5651d;
            border-color: black;
        }

        .btn-primary:hover {
            background-color:#f4a460;
            border-color: blue;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="container">
        <h2><center>Assignment</center></h2>

        <?php
        // Display assignments from the database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $subject = $row["subject"];
                $file_path = $row["file"];

                // Display each assignment
                echo "<center>";
                echo "<div class='card' style='width: 700px;'>";
                //echo "<img src='Assi.jpg' class='card-img-top' alt='...'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$subject</h5>";
                //echo "<p class='card-text'>$description</p>";
                echo "<a href='$file_path' class='btn btn-primary' download>Download</a>";
                echo "</div>";
                echo "</div>";
                echo "</center>";
                echo "<br>";
            }
        } else {
            echo "No assignments found";
        }
        ?>
    </div>
</body>
</html>
