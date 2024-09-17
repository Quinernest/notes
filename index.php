<?php
$fnameErr = $lnameErr = $usernameErr = $emailErr = $passwordErr = $repasswordErr = "";
$fname = $lname = $username = $email = $password = $repassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form submission
    if (isset($_POST['register'])) {
        // Validate first name
        if (empty($_POST["fname"])) {
            $fnameErr = "Please enter a Firstname";
        } else {
            $fname = test_input($_POST["fname"]);
        }

        // Validate last name
        if (empty($_POST["lname"])) {
            $lnameErr = "Please enter a Lastname";
        } else {
            $lname = test_input($_POST["lname"]);
        }

        // Validate username
        if (empty($_POST["username"])) {
            $usernameErr = "Please enter a username";
        } else {
            $username = test_input($_POST["username"]);
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "Please enter an email";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $email = test_input($_POST["email"]);
        }

        // Validate password
        if (empty($_POST["password"])) {
            $passwordErr = "Please enter a password";
        } else {
            $password = test_input($_POST["password"]);
        }

        // Confirm password
        if (empty($_POST["repassword"])) {
            $repasswordErr = "Please confirm password";
        } elseif ($_POST["password"] !== $_POST["repassword"]) {
            $repasswordErr = "Passwords do not match";
        } else {
            $repassword = test_input($_POST["repassword"]);
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Home</title>
   
</head>

<body>
    
<div class="navbar">
    <a href="#" id="switch-to-register">Register</a>
    <a href="#" id="switch-to-login">Login</a>
    <a href="#" id="switch-to-home" class="active">Home</a> <!-- Add active class to home switch -->

</div>

<div class="cons">
    <div class="left"><img src="img/bg.svg" alt="">
   
</div>

<div class="container1" id="home-card"> <!-- Home card initially visible -->
    <!-- Home content -->
    <h2>Welcome to NoTify</h2>
    <img src="img/logo12.png" alt="">
    <p>Introducing "NoTify" – your ultimate companion for organizing thoughts, ideas, and tasks effortlessly. Designed with simplicity and efficiency in mind, NoTify offers a seamless experience for capturing, managing, and accessing your notes anytime, anywhere. Whether you're jotting down quick reminders, drafting detailed project plans, or creating to-do lists, NoTify empowers you to stay organized and 
        productive with its intuitive interface and powerful features. Say goodbye to scattered notes and hello to streamlined productivity with NoTify.</p>
</div>


    
    <!-- login -->
    <div class="container" id="switch-container">
        <div class="card" id="login-card" style="display: none;">
        <form action="login.php" method="post">
    <div class="title_container">
        <br><p class="title">Welcome to</p>
        <p class="title">NoTify</p><br>
        <span class="subtitle">Get started with our app, just create an account and enjoy the experience.</span><br><br>
    </div> 
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required>
    <!-- <span class="error"><?php echo $login_username_err;?></span><br> -->
                
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required>
    <!-- <span class="error"><?php echo $login_password_err;?></span><br> -->

    <input type="submit" name="login" value="Login">
</form>
        </div>

        <div class="card" id="register-card" style="display: none;">
            <!-- Registration Form -->
            <form action="register.php" method="post">
    <div class="title">Register Here</div><br>

    <!-- First Name -->
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" required>
    <br>
    <div class="error-message"><?php echo $fnameErr;?></div> <!-- Error message for first name -->

    <!-- Last Name -->
    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname" required>
    <br>
    <div class="error-message"><?php echo $lnameErr;?></div> <!-- Error message for last name -->

    <!-- Username -->
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"required>
    <br>
    <div class="error-message"><?php echo $usernameErr;?></div> <!-- Error message for username -->

    <!-- Email -->
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required="@">
    <br>
    <div class="error-message"><?php echo $emailErr;?></div> <!-- Error message for email -->

    <!-- Password -->
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <div class="error-message"><?php echo $passwordErr;?></div> <!-- Error message for password -->

    <!-- Confirm Password -->
    <label for="repassword">Confirm password:</label>
    <input type="password" id="repassword" name="repassword" required>
    <br>
    <div class="error-message"><?php echo $repasswordErr;?></div> <!-- Error message for confirm password -->

    <!-- Submit Button -->
    <input type="submit" name="register" value="Register">
</form>
        </div>
    </div>
   
</div>

<script>
    document.getElementById('switch-to-register').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('login-card').style.display = 'none';
        document.getElementById('register-card').style.display = 'block';
        document.getElementById('home-card').style.display = 'none'; // Hide home card
        document.getElementById('switch-to-home').classList.remove('active'); // Remove active class from home switch
    });

    document.getElementById('switch-to-login').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('register-card').style.display = 'none';
        document.getElementById('login-card').style.display = 'block';
        document.getElementById('home-card').style.display = 'none'; // Hide home card
        document.getElementById('switch-to-home').classList.remove('active'); // Remove active class from home switch
    });

    document.getElementById('switch-to-home').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('register-card').style.display = 'none';
        document.getElementById('login-card').style.display = 'none';
        document.getElementById('home-card').style.display = 'block'; // Show home card
        document.getElementById('switch-to-home').classList.add('active'); // Add active class to home switch

        // Remove active class from other switches
        document.getElementById('switch-to-register').classList.remove('active');
        document.getElementById('switch-to-login').classList.remove('active');
    });
</script>


</body>
</html>
