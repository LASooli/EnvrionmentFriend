<?php
if (session_id() === "") {
    session_start();
}
include("htaccess/databaseconnect.php");

$username = $_POST['loginUser'];
$password = $_POST['loginPassword'];


    $query = "SELECT * FROM Users
 WHERE username = '$username'
AND password = SHA('$password');";
    echo "<p>$query</p>";
    // Perform query to see how many users there are
    $result = $conn -> query($query);
    if ($conn->error) {
        echo "<p>ERROR: Could not update database</p>\n";
    } else {
         if($result->num_rows === 0) {
             print("Incorrect Username AND/OR Password");
         } else {
             print("login");
             $_SESSION['authenticatedUser'] = $username;
             $row = $result->fetch_assoc();
             $role = $row['role'];
             $_SESSION['role'] = $role;
         }
    }


mysqli_close($conn);

if (isset($_SESSION['lastPage'])){
    $lastPage = $_SESSION['lastPage'];
    header("Location: $lastPage");
    exit;
} else {
    header('Location: index.php');
    exit;
}