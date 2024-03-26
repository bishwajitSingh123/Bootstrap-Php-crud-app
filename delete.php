<?php
include 'connect.php';

if (isset($_POST['deleteSend'])) {//deltesend is the data key in $.ajax
    $unique = $_POST['deleteSend'];

    $sql = "DELETE FROM `crud` WHERE `crud`.`sno` = $unique";

    $result = mysqli_query($conn, $sql);
}

?>
