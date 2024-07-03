<?php 
     
    session_start(); 

     
    if(!isset($_SESSION['username'])){ 
     
        header("location: login.php"); 
        exit(); 
    } 


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentinfo";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

     
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM teacher WHERE username='$username'";
    $result = $conn->query($sql);
    
    
    $TeacherName = "";
    $Email = "";
    $Subject = "";
    $Department = "";
    $photos = "";

   

    if ($result->num_rows > 0) {
  
        $row = $result->fetch_assoc();
        $TeacherName = $row["TeacherName"];
        $Email = $row["Email"];
        $Subject = $row["Subject"];
        $Department=$row["Department"];
        $photos= $row["Image"];
    
    } else {
        echo "No teacher found with this username";
    }
    
    $conn->close();
    ?>
   
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
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
            transition: background-color 0.3s ease;
        }

        .sidebar img {
            border-radius: 50%;
            margin-bottom: 20px; /* Add margin for spacing */
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
            background-color: rosybrown;
            padding: 10px;
        }

        .content {
            flex: 1;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fdf5e6;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* New CSS for the image on the right */
        .content img {
            float: right;
            height: 200px;
            width: 200px;
            padding-right: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <img src="modal.jpg">
            <a href="#" class="active"><center>Profile</center></a>
            <a href="Teacherfile.php"><center>Assignment</center></a>
            <a href="#"><center>Timetable</center></a>
            <a href="#"></a>
        </nav>
        <main class="content">
        <div class="content-details">
            <h1>Teacher Information</h1>
            <div class="content-image">
                   <?php echo "<img src= '".$photos."' height='200px' width='200px'>"; ?></p>
            </div>
            <p><strong>Name:</strong> <?php echo $TeacherName; ?></p>
            <p><strong>Email:</strong> <?php echo $Email; ?></p>
            <p><strong>Subject:</strong> <?php echo $Subject; ?></p>
            <p><strong>Department:</strong> <?php echo $Department; ?></p>

        </div>
        </main>
    </div>
</body>
</html>
