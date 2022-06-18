<?php
if (isset($_SESSION[$box])) {
    $name = $_SESSION[$box];
    echo "value='$name'"; }
?>