<?php
$servername = "localhost";
$database = "environmentFriend";
$username = "nathan";
$password = "@Bron5a1";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";





//mysqli_close($conn);
?>

CREATE USER 'nathan'@'localhost' IDENTIFIED BY '@Bron5a1';
GRANT ALL PRIVILEGES ON * . * TO 'nathan'@'localhost';
FLUSH PRIVILEGES;
