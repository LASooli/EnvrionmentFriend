
<?php
if (session_id() === "") {
    session_start();
}
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];


?>

<!DOCTYPE html>

<html lang="en">
<body>
<head>
        <title>EnvironmentFriend</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    <?php
foreach ($scriptList as $script) {
    echo "<script src='$script'></script>";
}

?></head>


        <header>
            <h1>EnvironmentFriend</h1>


            <?php if (isset($_SESSION['authenticatedUser'])) { ?>
            <div id="logout">
                <p>Welcome, <?php $username = $_SESSION['authenticatedUser']; $role = $_SESSION['role'];  echo"$username";?><span id="logoutUser"></span></p>
                <form id="logoutForm" action="logout.php" method="post">
                    <input type="submit" id="logoutSubmit" value="Logout">
                </form>
            </div>

            <?php } else { ?>
            <div id="user">
                <div id="login">
                    <form id="loginForm" action="login.php" method="post">
                        <label for="loginUser">Username: </label>
                        <input type="text" name="loginUser" id="loginUser" required><br>
                        <label for="loginPassword">Password: </label>
                        <input type="password" name="loginPassword" id="loginPassword" required><br>
                        <input type="submit" id="loginSubmit" value="Login">
                    </form>
                    <button id="registerButton"><a href="register.php">Register</a></button>
                </div>
            <?php } ?>






            </div>
            <nav><ul>

                    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);

if ($currentPage === 'index.php') { echo "<li> Home";
} else {
    echo "<li> <a href='index.php'>Home</a>";
}
if ($currentPage === 'aboutUs.php') { echo "<li> Classic";
} else {
    echo "<li> <a href='aboutUs.php'>About Us</a>";
}
if ($currentPage === 'shop.php') { echo "<li> Shop";
} else {
    echo "<li> <a href='shop.php'>Shop</a>";
}
if ($currentPage === 'something.php') { echo "<li> Something";
} else {
    echo "<li> <a href='something.php'>Something</a>";
}
if ($currentPage === 'contact.php') { echo "<li> Contact";
} else {
    echo "<li> <a href='contact.php'>Contact</a>";
}
if ($currentPage === 'checkout.php') { echo "<li> Cart";
} else {
    if (isset($_SESSION['authenticatedUser'])) {
        echo "<li> <a href='checkout.php'>Cart</a>";
    } else {
        echo"<li>Cart(login)</li>";
    }
}
if ($currentPage === 'orders.php') { echo "<li> Orders";
} else {
    if (isset($_SESSION['authenticatedUser'])) {
        echo "<li> <a href='orders.php'>Orders</a>";
    } else {
        echo "<li>Orders(login)</li>";
    }
}
  ?>
                </ul></nav></header>