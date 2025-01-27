<?php
$host = "localhost";
$user = 'root';
$pass = ''; 
$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql = "CREATE DATABASE holder";  
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);

}
$sql = "CREATE TABLE holder.users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    pass VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP)";

    if (mysqli_query($conn, $sql)) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
mysqli_close($conn);

?>