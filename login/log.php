<?php
session_start();

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "holder";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

if(!$conn){
    die("Connection failed: " . $conn->connect_error());
}

$user = $_POST['username'];
$pass = $_POST['pass'];

$username = $conn->real_escape_string($user);
$pass = $conn->real_escape_string($pass);

$sql = "SELECT * FROM users WHERE username = '$user' AND pass = '$pass'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    echo "Login successful";
}
else{
    echo "Login failed";
}
$conn->close();

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h2>login</h2>
    <!-- Display the message if set -->
    <?php if (isset ($message)){
        echo "<p>$message</p>";
    }
    ?>
    <form action = "" method="post">
        <label for = "username">Username:</label><br>
        <input type="text" id="username" name="username"><br>

        <label for = "pass">Password:</label><br>
        <input type="password" id="pass" name="pass"><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>