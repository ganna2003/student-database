<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Login & Sign Up</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>


<div class="container">
    <div id="login-form">
        <h2>Student Login</h2>
        <form action="login.php" method="post" class="form-container" >
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="submit" value="Login">
            <p>Don't have an account? <a href="#" id="toggle-signup">Sign Up</a></p>
        </form>
    </div>
    
    <div id="signup-form" style="display: none;">
        <h2>Student Sign Up</h2>
        <form action="signup.php" method="post" class="form-container" enctype="multipart/form-data">
        <input type="text" placeholder="Full Name" name="Studentname" required>

<input type="text" placeholder="Address" name="Address" required>

<input type="text" placeholder="Email" name="Email" required>

<input type="text" placeholder="PRN Number" name="PRN" required>

<input type="number" placeholder="Age" name="Age" required>

<input type="text" placeholder="Branch" name="Branch" required>

<input type="number" placeholder="Contact Number" name="ContactNumber" required>

<input type="text" placeholder="Username" name="username" required>

<input type="password" placeholder="Password" name="password" required>

<input type="file" placeholder="Images" name="Images" required > 


            
            <input type="submit" value="Sign Up">
            <p>Already have an account? <a href="#" id="toggle-login">Login</a></p>
        </form>
    </div>
</div>

<script>
    document.getElementById("toggle-signup").addEventListener("click", function() {
        document.getElementById("login-form").style.display = "none";
        document.getElementById("signup-form").style.display = "block";
    });

    document.getElementById("toggle-login").addEventListener("click", function() {
        document.getElementById("login-form").style.display = "block";
        document.getElementById("signup-form").style.display = "none";
    });
</script>

</body>
</html>
