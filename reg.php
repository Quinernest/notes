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
    gap: 1px;
    background: linear-gradient(45deg, lightgreen, green);
    padding: 30px;
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
    color: black;
    font-family: sans-serif;
    font-size: 50px;
    font-weight: 600;
    margin-top: 1px;
}
.subtitle {
    
    color: black;
    font-family: sans-serif;
    font-size: 15px;
    font-weight: 600;
    margin-top: 10px;
}
.signin {
    text-align: center;
}
.message, .signin {
    color: green;
    cursor: pointer;
    font-size: 14px;
}
.signin :hover{

}
</style>
<body>

<div class="navbar">
    <a href="reg.php">Register</a>
    <a href="log.php">Sign In</a>
    <a class="active" href="index.php">Home</a>
</div>


    <form action="register.php" method="post">
        <div class="form">
      <div class="title">Welcome</div>
      <div class="subtitle">Let's create your account!</div><br>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Register">
        <div class="acc-text">already have account?<a href="log.php"><span style="color : black; cursor : pointer;">  signin</span></a>
      </div>
    </form>
</body>
</html>
