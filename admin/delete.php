<?php
include '../connect.php';
$id = $_GET['product_id'];
$query = mysqli_query($con, "DELETE FROM products WHERE id= '$id'");
if ($query == TRUE) {
    echo "<script>alert('Product Deleted Successful ✔✔✔'); window.location='productlist.php'; </script>";
}else {
    echo "<script>alert('Product Not Deleted Successful'); </script>";

}
?>