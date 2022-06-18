<?php

if (session_id() === "") {
    session_start();
}



$xmlFileName = $_POST['xmlFileName'];


//$newOrder = $orders->addChild('order');

//$delivery->addChild('user', $_SESSION['authenticatedUser']);
//    $delivery->addChild('name', $_SESSION['Name']);
//$orders->saveXML('htaccess/orders.xml');


$reviews = simplexml_load_file("$xmlFileName");
$newReview = $reviews->addChild('review');
$newReview->addChild('user', $_SESSION['authenticatedUser']);
$newReview->addChild('rating', $_POST['rating']);

$reviews->saveXML("$xmlFileName");


if (isset($_SESSION['lastPage'])){
    $lastPage = $_SESSION['lastPage'];
    header("Location: $lastPage");
    exit;
} else {
    header('Location: index.php');
    exit;
}