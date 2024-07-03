<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentinfo";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST["year"];
    $subjectName = $_POST["subjectName"];

  
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);

    if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file)) {
      
        $sql = "INSERT INTO project (year, subject, file) VALUES ('$year', '$subjectName', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "File upload failed";
    }
}



$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      background-color: #fad6a5;
    }

    .card {
      max-width: 400px;
      margin: 50px auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      border-radius: 10px;
      background-color: #fdf5e6;
    }

    .card-title {
      color: #b5651d;
      text-align: center;
    }

    .form-select,
    .form-control {
      margin-bottom: 15px;
      color: black;
    }

    .btn-primary {
      width: 100%;
      background-color: #b5651d;
    }

    .btn-primary:hover{
      background-color: #b7410e;
    }
  </style>
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  

  <div class="card">
    <h5 class="card-title">Assignment Upload</h5>

    <form action="Teacherfile.php" method="post" enctype="multipart/form-data">
      <select class="form-select mb-3" aria-label="Default select example" name="year">
        <option selected>Select Year</option>
        <option value="1">First Year</option>
        <option value="2">Second Year</option>
        <option value="3">Third Year</option>
      </select>

      <input type="text" class="form-control" id="subjectName" name="subjectName" placeholder="Enter Subject name">

      <input type="file" class="form-control" id="fileInput" name="fileInput">

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>