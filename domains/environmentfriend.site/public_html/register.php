<?php
if (session_id() === "") {
    session_start();
}
if (isset($_SESSION['authenticatedUser'])) {
    if (isset($_SESSION['lastPage'])){
    $lastPage = $_SESSION['lastPage'];
    header("Location: $lastPage");
    exit;
} else {
    header('Location: ../index.php');
    exit;
}
};
?>




<fieldset>
    <legend>New User Details</legend>

    <form>
        <?php
            $formNames = array('Username', 'Password', 'Confirm_Password', 'Email');
foreach ($formNames as $formName){
    if (($formName == 'Password') || ($formName == 'Confirm_Password')){
        echo "<p><label for=$formName>$formName</label>
                    <input type='password' name='$formName' id='$formName' required></p>"; //maybe add option to show
    } else {
        echo "<p><label for=$formName>$formName</label>
                    <input type='text' name='$formName' id='$formName' required></p>";
    }
                    }

?>
        <input type="submit" name="registerUser" id="registerUser" value="Register">

    </form>
</fieldset>
<?php

include('htaccess/databaseconnect.php');


$formOK = false;
if (isset($_GET['Username'])) {
    $formOK = true;
    $username = $_GET['Username'];
    $password1 = $_GET['Password'];
    $password2 = $_GET['Confirm_Password'];
    $email = $_GET['Email'];
    
    // Perform query to see how many users there are with given username
    $result = $conn -> query("SELECT * FROM Users WHERE username = '$username'");
    if ($result->num_rows === 0) {
        // OK, there is no user with that username
        print("You can use that name! ");
    } else {
        $formOK = false;
        print("Username already in use.");
    }

    if ($password1 != $password2) {
        $formOK = false;
        print("Passwords do not match. ");
    }
    if (strlen($password1) < 8) {
        print("Password needs to be at least 8 characters. ");
        $formOK = false;
    }
    
    

    }
    if ($formOK) {
        $query = "INSERT INTO Users (username, password, email, role) 
            VALUES ('$username', SHA('$password1'), '$email', 'user');";
        $conn->query($query);

        if ($conn->error) {
            print(" Something went wrong ");
        }
        
        $_SESSION['authenticatedUser'] = $username;
             $row = $result->fetch_assoc();
             $role = $row['role'];
             $_SESSION['role'] = $role;
        
        header("Location: ../index.php");
        exit;
        
        $result->free();
        $conn->close();
    }


?>