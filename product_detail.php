<?php include '_include/head.php' ?>


<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Product Details</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="product_detail.php">Product-details</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<?php
$id = $_GET['id'];
include 'connect.php';
$query = mysqli_query($con, "SELECT * FROM products WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);
?>
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="admin/p_img/<?php echo $row['p_img']; ?>" alt>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3><?php echo $row['p_name']; ?></h3>
                    <h2>&#8358; <?php echo number_format($row['p_price']); ?></h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Category</span> : <?php echo $row['p_category']; ?></a>
                        </li>
                        <li><a href="#"><span>Campus</span> : <?php echo $row['p_loct']; ?></a></li>
                        <li><a href="#"><span>Availibility</span> : <?php echo $row['p_tota']; ?></a></li>
                    </ul>
                    <p><?php echo $row['p_desc']; ?></p>
                    <form method="POST" action="" onkeyup="calc();">
                        <div class="row">
                        <input type="hidden" name="p_img" value="<?php echo $row['p_img']; ?>"
                                class="form-control">
                            <input type="hidden" name="p_name" value="<?php echo $row['p_name']; ?>"
                                class="form-control">
                            <input type="hidden" name="p_cat" value="<?php echo $row['p_category']; ?>"
                                class="form-control">
                            <input type="number" name="p_qty" max="<?php echo $row['p_tota']; ?>" id="qty" placeholder="Enter Quantity" class="form-control"
                                required>
                            <input type="hidden" name="p_price" id="price" value="<?php echo $row['p_price']; ?>"
                                class="form-control">
                            <input type="hidden" name="user" value="<?php echo $_SESSION['email'] ?>"
                                class="form-control">

                            <input type="hidden" name="p_tota" id="total" class="form-control">
                        </div><br>
                        <div class="card_area d-flex align-items-center">

                            <input type="submit" class="primary-btn" name="submit" value="Add to Cart">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<?php

include 'connect.php';

if(isset($_POST['submit'])){

	$p_img = mysqli_real_escape_string($con, $_POST['p_img']);
	$p_name = mysqli_real_escape_string($con, $_POST['p_name']);
	$p_cat = mysqli_real_escape_string($con, $_POST['p_cat']);
	$p_qty = mysqli_real_escape_string($con, $_POST['p_qty']);
	$p_price = mysqli_real_escape_string($con, $_POST['p_price']);
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$p_tota = mysqli_real_escape_string($con, $_POST['p_tota']);

    $id = $_GET['id'];
    $query1 = mysqli_query($con, "SELECT * FROM products WHERE id = '$id'");
    $row1 = mysqli_fetch_array($query1);
    $t = $row1['p_tota'];
    $tt = $t - $p_qty;
	$query2 = mysqli_query($con, "UPDATE products SET p_tota = '$tt' WHERE id = '$id'");
    if ($query2 == TRUE) {
        $sql = "INSERT INTO product_detail(p_img, p_name, p_price, p_category, p_qty, p_tota, user) 
				VALUES('$p_img','$p_name','$p_price','$p_cat','$p_qty','$p_tota','$user')";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script>alert('Product Added to Cart ✔✔✔'); window.location='ven.php'; </script>";
	}else {
		echo "<script>alert('Product Not Added to Cart'); </script>";

	}
    }else{
		echo "<script>alert('Product Not Updated'); </script>";

    }


	
}


?>
<script>
function calc() {
    var price = document.getElementById('price');
    var qty = document.getElementById('qty');
    var tota = document.getElementById('total');


    tota.value = price.value * qty.value;
    document.getElementById('total').innerHTML = tota;


}
</script>

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
    data-cf-beacon='{"rayId":"866503ba7e69385a","b":1,"version":"2024.2.4","token":"cd0b4b3a733644fc843ef0b185f98241"}'
    crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/karma/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Mar 2024 22:03:37 GMT -->

</html>