<?php
$scriptList = array('js/jquery3.3.js', 'js/StripePay.js');
include("header.php"); include("checkLogin.php");

include("htaccess/validationFunctions.php");


?>
<main>

    <?php
    //print_r($_POST);
    $token = $_POST['stripeToken'];
    //echo "<p>this is the $token";
    
    $formNames = array('Name', 'Email', 'Address1', 'Address2', 'City',
        'Postcode', 'cardType', 'card_num', 'exp_month', 'exp_year', 'cvc');
    $errorcounter = 0;
    foreach($formNames as $formName) {
        $_SESSION[$formName] = $_POST[$formName];
        if (isEmpty($_POST[$formName])){
            $errorcounter++;
            echo "<p>Empty Error: $formName </p>";
        }
        }

    $numberForms = array('Postcode', 'card_num', 'exp_month', 'exp_year', 'cvc');
    foreach ($numberForms as $numberForm) {
        if (!isDigits($_POST[$numberForm])){
            echo "<p>Digit Error: $numberForm</p>";
            $errorcounter++;
        }
    }

    if (!isEmail($_POST['Email'])){
        echo "<p>Error: Not a valid email</p>";
        $errorcounter++;
    }


    if (!checkCardNumber($_POST['cardType'], $_POST['card_num'])){
        echo"<p>Error: Card Number invalid";
        $errorcounter++;
    }
    if (!checkCardVerification($_POST['cardType'], $_POST['cvc'])){
        echo"<p>Error: Card Verification number invalid";
        $errorcounter++;
    }
    if (!checkCardDate($_POST['exp_month'], $_POST['exp_year'])){
        echo"<p>Error: Card Date must be in the future";
        $errorcounter++;
    }

    if (!$errorcounter == 0){
        echo"No. of Errors: $errorcounter";
    }else{
        //include('getCart2.php');
        include('getCartContents.php');
        include('submit.php');

        }
        //echo '<script> alert(sessionStorage.getItem("cart")); </script>';
    ?>
    <div id="itemTable">

    </div>
</main>
<?php include("footer.php"); ?>
</body>
</html>