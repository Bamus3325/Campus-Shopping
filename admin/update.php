<?php
include '../connect.php';
$id = $_GET['order_id'];
$query = mysqli_query($con, "UPDATE payment SET status = '1' WHERE reference_id = '$id'");
if ($query == TRUE) {
    echo "<script> alert('Product Update ✔✔'); window.location='orders.php';</script>";
}


?>