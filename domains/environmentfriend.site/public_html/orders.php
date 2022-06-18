<main>
    <?php
    if (session_id() === "") {
    session_start();
    }

    if (!isset($_SESSION['authenticatedUser'])) {
        header('Location: index.php');
        exit;
    }
    ?>


<?php
$scriptList = array('js/jquery3.3.js');
include('header.php'); include("checkLogin.php");

$orders = simplexml_load_file('htaccess/orders.xml');

$usersOrders = 0;

$sessionUser = $_SESSION['authenticatedUser'];
print_r($sessionUser);

foreach ($orders->order as $order) {
    $user = $order->delivery->user;
    if ($_SESSION['role'] === 'user') {
        if ($sessionUser == $user) {
            $user = $order->delivery->user;
            echo "<p>User: $user</p>";
            $name = $order->delivery->name;
            echo "<p>Name: $name</p>";
            $email = $order->delivery->email;
            echo "<p>Email: $email</p>";
            $address = $order->delivery->address;
            echo "<p>Address: $address</p>";
            $city = $order->delivery->city;
            echo "<p>City: $city";
            $postcode = $order->delivery->postcode;
            echo "<p>Postcode: $postcode</p>";


            $items = $orders->xpath('//item');
            foreach ($items as $item) {
                $title = $item->title;
                echo "<p>Title: $title</p>";
                $price = $item->price;
                echo "<p>Price: $price</p>";
            }
            $usersOrders++;
        }

    }
    else {
        echo "<p>User: $user</p>";
        $name = $order->delivery->name;
        echo "<p>Name: $name</p>";
        $email = $order->delivery->email;
        echo "<p>Email: $email</p>";
        $address = $order->delivery->address;
        echo "<p>Address: $address</p>";
        $city = $order->delivery->city;
        echo "<p>City: $city";
        $postcode = $order->delivery->postcode;
        echo "<p>Postcode: $postcode</p>";


        $items = $orders->xpath('//item');
        foreach ($items as $item) {
            $title = $item->title;
            echo "<p>Title: $title</p>";
            $price = $item->price;
            echo "<p>Price: $price</p>";
        }
    }

}
if ($usersOrders === 0){
    echo "You have not made any orders.";
}





echo "</main>";


include('footer.php');
?>