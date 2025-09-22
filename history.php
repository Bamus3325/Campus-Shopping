<?php include '_include/head.php' ?>


<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping History</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="history.php">History</a>
                </nav>
            </div>
        </div>
    </div>
</section>


<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">id</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Email</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $use = $_SESSION['email'];
                     include 'connect.php';
                       $sql = "SELECT * FROM payment WHERE email ='$use' ORDER BY id DESC";
                      $query = mysqli_query($con, $sql);
                      $i = 1;
                       while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <h5>
                                    &#8358; <?php
                                    $num = $row['amount'];

                                $t_num = intval(substr($num, 0, -2));

                                echo number_format($t_num);
                                      ?>


                                </h5>
                            </td>
                            <td>
                                <h5><?php echo $_SESSION['email']; ?></h5>
                            </td>
                            <td>
                            <h5><?php echo $row['locat']; ?></h5>
                            </td>
                            <td>
                                <h5><?php echo $row['cdate']; ?></h5>
                            </td>
                            <td style="text-align: center;">
                                <div class="button-group-area mt-10">
                                <a href="prod.php?id=<?php echo $row['reference_id']; ?>" class="genric-btn primary circle">View Order Product</a>
                                <?php
                                if ($row['status']== 0) {
                                    ?>
                                <a href="edit_locat.php?id=<?php echo $row['reference_id']; ?>" class="genric-btn warning circle">Edit Location</a>
                                
                                    <button class='genric-btn danger circle'>Pending ⚠ ⚠ ⚠</button>
                                    <?php
                                }else {?>
                                    <button class='genric-btn success circle'>Success ✔✔</button>
                                    <?php
                                }
                                ?>
                                
                                </div>
                            </td>
                        </tr>
                        <?php
                        $i++;
                       }
                       ?>



                    </tbody>
                </table>
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
function payWithPaystack() {
    var handler = PaystackPop.setup({
        key: 'pk_test_dfe0fe7e693a5ec797a6d13c77f47bca8560cea9', // pk_live_78320e5c946255a5f7b9433705122c5fb720cc55
        //   $use = $_SESSION['email'];
        email: '<?php echo $use; ?>',
        amount: <?php echo $row1['value_sum']; ?>00,
        currency: "NGN",
        ref: 'MY' + Math.floor((Math.random() * 1000000000) +
            1
        ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

        callback: function(response) {
            let message = 'Payment Completed! ref is ' + response.reference;
            alert(message);
            window.location = 'verify_transaction.php?reference=' + response.reference;
            //document.write('<?php // include 'connect.php'; $conn->query("UPDATE student SET payment = 1 WHERE email='$email'") or die(mysqli_error($conn)); ?>');
        },
        onClose: function() {
            alert('window closed');
        }
    });
    handler.openIframe();
}
</script>