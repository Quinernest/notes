<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ebf2fa;
        }
        .container {
            width: 600px;
            margin: 155px auto;
            padding: 60px;
            border-radius: 10px;
            border: 1px solid #ccc;
            border-color: black;
            background-color: #73a942;
        }
        h1 {
            font-size: 32px;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            
        }
        input[type="text"],
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: none;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 12px 24px;
            background-color: #96e072;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            text-transform: uppercase;
            width: 100%;
            max-width: 150px; /* Added for responsiveness */
            margin: 0 auto; /* Center align */
        }
        input[type="submit"]:hover {
            background-color: #4ad66d;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: black;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            text-transform: uppercase;
            width: 100%;
            max-width: 200px; /* Added for responsiveness */
            margin: 10px auto; /* Center align and add spacing */
        }

         .btn:hover {
            background-color: #0056b3;
        }

         .button-wrapper {
            text-align: center; /* Align buttons in the center */
        }

        .container1 {
            display: flex;
            flex: 1;
            position: relative;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
        }

        .sidebar {
            height: 100%;
            width: 200px;
            border-radius: 10px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #73a942;
            padding-top: 20px;
            color: #fff;
            display: flex;
            flex-direction: column;
           
            
        }

        .sidebar h1 {
            color: black;
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px;
            text-align: center;
        }

        .sidebar ul li a {
            color: black;
            text-decoration: none;
            display: block;
            
        }

        .sidebar img{
            padding: 25px;
        }

        .sidebar ul li a:hover {
            transform: scale(1.5, 1.5);
        }

        .content {
            flex: 1;
            padding: 30px;
            margin-left: 190px; /* Adjusted to match sidebar width */
        }

    </style>
</head>
<body>


<div class="container1">
<div class="sidebar">
        <img src="img/111.png" alt="Logo" width="150" >
        
        <a href="profile.php"> <!-- Add this line -->
        <img src="img/logo profile.png" alt="Logo" width="150"> <!-- Your logo image -->
       
    </a> <!-- Add this line -->
      
        <ul>
        <li><a href="dashboard.php">Home</a></li> 
            <li><a href="#" onclick="return confirmLogout()" class="logout">Logout</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Add New Note</h1>
        <form action="add_process.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="4" required></textarea>
            <input type="submit" value="Add Note">
        </form>
       
    </div>
</body>
</html>
