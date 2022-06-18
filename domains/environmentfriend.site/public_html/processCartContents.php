
<?php

if (session_id() === "") {
    session_start();
}
    ?>


<table><thead>Cart Items:</thead>
<tr>
    <th>Title</th>
    <th>Price</th>
</tr>
    <?php

    $arr = json_decode(file_get_contents("php://input"));
    /** get orders */
    $orders = simplexml_load_file('htaccess/orders.xml');
    $newOrder = $orders->addChild('order');
    $delivery = $newOrder->addChild('delivery');
    $delivery->addChild('user', $_SESSION['authenticatedUser']);
    $delivery->addChild('name', $_SESSION['Name']);
    $delivery->addChild('email', $_SESSION['Email']);
    $delivery->addChild('address', $_SESSION['Address1']);
    $delivery->addChild('city', $_SESSION['City']);
    $delivery->addChild('postcode', $_SESSION['Postcode']);
    $items = $orders->addChild('items');
    $priceSum = 0.0;
    if(is_array($arr) || is_object($arr)){
        foreach ($arr as $value) {
            echo "<tr><td>$value->title</td><td>$value->price</td></tr>";
            $item = $items->addChild('item');
            $item->addChild('title', $value->title);
            $item->addChild('price', $value->price);
            $priceSum += $value->price;
        }}
    $_SESSION['priceSum'] = $priceSum;
    $orders->saveXML('htaccess/orders.xml');
    //echo"success";
    //echo"processCartContents";
    //print_r($priceSum);
    ?>
</table>