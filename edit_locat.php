<?php include '_include/head.php' ?>


<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="carts.php">Carts</a>
                </nav>
            </div>
        </div>
    </div>
</section>


<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <form method="POST" action="">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $_GET['id'];
                    $use = $_SESSION['email'];
                     include 'connect.php';
                       $sql = "SELECT * FROM product_detail WHERE user ='$use' and prod_id ='$id'";
                      $query = mysqli_query($con, $sql);
                       while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="admin/p_img/<?php echo $row['p_img']; ?>"
                                            style="width:150px;height:150px;">
                                    </div>
                                    <div class="media-body">
                                        <p><?php echo $row['p_name']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>&#8358; <?php echo number_format($row['p_price']); ?></h5>
                            </td>
                            <td>
                                <h5><?php echo $row['p_qty']; ?></h5>
                            </td>
                            <td>
                                <h5>&#8358; <?php echo number_format($row['p_tota']); ?></h5>
                            </td>
                        </tr>
                        <?php
                       }
                       ?>
                        <?php
                        $id = $_GET['id'];
					    include 'connect.php';

					    $usemail = $_SESSION['email'];
					    $sql1 = "SELECT SUM(p_tota) AS value_sum FROM product_detail WHERE user= '$usemail' and prod_id = '$id'";
					    $query1 = mysqli_query($con, $sql1);
                        if ($r = mysqli_num_rows($query) > 0) {
                            $row1 = mysqli_fetch_array($query1);
                            ?>
                        <tr>
                            <td>
                                <div class="row" style="align-items: center; text-align: center;">
                                    <div style="padding-left: 30px;">
                                        <h4><strong>Location:</strong></h4>
                                    </div>
                                    &nbsp;
                                    <div>
                                        <input type="text" name="locate" class="form-control" required>
                                    </div>

                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                                <h4><strong>Grand Total:</strong></h4>
                            </td>
                            <td>
                                <h4><strong>&#8358; <?php echo  number_format($row1['value_sum']); ?></strong></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <div class="button-group-area mt-40">
                                    <button type="submit" name="submit" class="genric-btn primary circle arrow">Update Location</button>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>

                            </td>
                        </tr>
                        <?php

                        }
					    
						?>



                    </tbody>
                </table>
                </form>
                <?php
$id = $_GET['id'];
include 'connect.php';

if(isset($_POST['submit'])){
    $usemail = $_SESSION['email'];

	$locate = mysqli_real_escape_string($con, $_POST['locate']);
	// $prod_id = mysqli_real_escape_string($con, $_POST['prod_id']);
	$query2 = mysqli_query($con, "UPDATE users SET location = '$locate' WHERE email = '$usemail'");
    if ($query2 == TRUE) {
        echo "<script> alert('Location Updated Successfully'); window.location='history.php';</script>";
    }


	
}


?>
            </div>
        </div>
    </div>
</section>


<?php include '_include/footer.php' ?>
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
    integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
    data-cf-beacon='{"rayId":"866503c51a22385a","b":1,"version":"2024.2.4","token":"cd0b4b3a733644fc843ef0b185f98241"}'
    crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/karma/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Mar 2024 22:03:38 GMT -->

</html>
<script>