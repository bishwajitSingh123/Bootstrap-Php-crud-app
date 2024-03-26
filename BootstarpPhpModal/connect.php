<?php

$conn = new mysqli("localhost", "root", "", "bootstrapcrud");
if (!$conn) {
    // echo "sucess";
    die(mysqli_error($conn));
}
?>