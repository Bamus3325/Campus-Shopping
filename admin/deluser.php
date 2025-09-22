<?php
include '../connect.php';
$id = $_GET['id'];
$query = mysqli_query($con, "DELETE FROM users WHERE id = '$id'");
if ($query == TRUE) {
  echo "<script> alert('User Deleted Successfully ✔️✔️✔️'); window.location='manageuser.php'; </script>";
}else {
  echo "<script> alert('User NOT Deleted'); window.location='manageuser.php';</script>";
 
}
?>