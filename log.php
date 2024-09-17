<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>
   
</head>
<style>
* {
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0fff1;
    box-sizing: border-box;
}

/* nav */
.navbar {
    background: linear-gradient(45deg, lightgreen, green);
    overflow: hidden;
}

.navbar a {
    float: right;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar a.active {
    
    color: white;
}

.navbar a:hover {
    background-color: #96e072;
    color: black;
}   
    form {
    width: 400px;
    margin: 50px auto; /* Center the container */
    background-color: #fff;
    padding: 2rem 1rem;
    border-radius: 10px;
    text-align: center;
    display: flex;
    flex-direction: column;
    gap: 1px;
    background: linear-gradient(45deg, lightgreen, green);
    padding: 20px;
    border-radius: 20px;

    
    
}

input[type="text"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;

}

input[type="submit"] {
    background-color: #96e072;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
.title {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    color: black;
}
.subtitle {
    font-size: 1rem;
    max-width: 80%;
    text-align: center;
    line-height: 1.1rem;
    color: black;
}
</style>
<body>

<div class="navbar">
    <a href="reg.php">Register</a>
    <a href="log.php">Sign In</a>
    <a class="active" href="index.php">Home</a>
</div>

    
    <form action="login.php" method="post"> 
        
    <div class="title_container">
    <br><p class="title">Login to your Account</p><br>
    <span class="subtitle">Get started with our app, just create an account and enjoy the experience.</span><br><br>
  </div>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
        
            <div class="acc-text">New here?<a href="reg.php"><span style="color : black; cursor : pointer;">  Create Account</span></a>
      </div>
    </form>
</body>
</html>