<?php include '_include/head.php' ?>


<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Product Category page</h1>
                <nav class="d-flex align-items-center">
                    <a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.php">Product Category</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Browse Categories</div>
                <ul class="main-categories">
                    <?php
                                  include 'connect.php';
                                  $sql = "SELECT * FROM product_cat ORDER BY id DESC";
                                  $query = mysqli_query($con, $sql);
                                  while($row = mysqli_fetch_array($query)){
                                      ?>
                    <li type="circle" class="main-nav-list"><a href="category.php?cat=<?php echo $row['pro_cat']; ?>">
                            <?php echo $row['pro_cat'] ?>
                        </a>
                    </li>
                    <?php
                  }
                  ?>
                </ul>
            </div>

        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">

            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting" style="color: #fff;">
                    DEFAULT SORTING
                </div>
                <div class="sorting mr-auto">
                    <select>
                        <option value="1">Show All</option>
                    </select>
                </div>
                <div style="color: #fff;">
                    <div>ITEMS</div>
                </div>
            </div>


            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <?php
                                  include 'connect.php';
                                  if (isset($_POST['submit'])) {
                                      $search = mysqli_real_escape_string($con, $_POST['search']);

                                  $sql = "SELECT * FROM products WHERE p_name LIKE '%$search%'";
                                  $query = mysqli_query($con, $sql);
                                  if (mysqli_num_rows($query) > 0) {
                                      while($row = mysqli_fetch_array($query)){
                                      ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product"
                            style="margin:auto; padding-top: 20px; text-align: center; display:block;">
                            <img class="img-fluid" src="admin/p_img/<?php echo $row['p_img']; ?>"
                                style="width:250px;height:200px;">
                            <div class="product-details" style="margin:auto; text-align: center; display:block;">
                                <h6><?php echo $row['p_name']; ?></h6>

                                <div style="margin:auto; text-align: center; display:block;">
                                    <h6><strong>&#8358; <?php echo number_format($row['p_price']); ?></strong></h6>
                                </div>

                                <?php
                                if ($row['p_tota'] == 0) {
                                  ?>
                                <div class="price">
                                    <h6><strong>Out of Stock</strong> 😐😐😐</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="#" class="genric-btn danger disable circle">Un-Available</a>
                                    <!-- <p style="margin:auto; text-align: center; display:block;" class="btn-primary">Out of Stock</p> -->

                                </div>
                                <?php
                                }else {
                                  ?>
                                <div class="price">
                                    <h6><strong>Available: <?php echo $row['p_tota']; ?></strong></h6>
                                </div>
                                <?php
                                if(!isset($_SESSION['email'])){
                                  ?>
                                <div class="prd-bottom">
                                    <a href="login.php" onclick="return alert('Please Login to your Account ❗❗❗');"
                                        class="primary-btn">
                                        <p style="margin:auto; text-align: center; display:block;">View Item</p>
                                    </a>
                                </div>
                                <?php
                                }else {
                                  ?>
                                <div class="prd-bottom">
                                    <a href="product_detail.php?id=<?php echo $row['id'];?>" class="primary-btn">
                                        <p style="margin:auto; text-align: center; display:block;">View Item</p>
                                    </a>
                                </div>
                                <?php
                                }
                                ?>

                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <?php
                  }
                                  }else {
                                      echo "<strong><i style='color: red; padding: 150px;'>Sorry No results found. 😐😐😐</i></strong>";

                                  }
                                  
              }
                  ?>






                </div>
        </div>
    </div>
    </section>

</div>
</div>
</div>




<?php include '_include/footer.php' ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="container relative">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="product-quick-view">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="quick-view-carousel">
                            <div class="item" style="background: url(img/organic-food/q1.jpg);">
                            </div>
                            <div class="item" style="background: url(img/organic-food/q1.jpg);">
                            </div>
                            <div class="item" style="background: url(img/organic-food/q1.jpg);">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="quick-view-content">
                            <div class="top">
                                <h3 class="head">Mill Oil 1000W Heater, White</h3>
                                <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span
                                        class="ml-10">$149.99</span></div>
                                <div class="category">Category: <span>Household</span></div>
                                <div class="available">Availibility: <span>In Stock</span></div>
                            </div>
                            <div class="middle">
                                <p class="content">Mill Oil is an innovative oil filled radiator with the most modern
                                    technology. If you are
                                    looking for something that can make your interior look awesome, and at the same
                                    time give you the pleasant
                                    warm feeling during the winter.</p>
                                <a href="#" class="view-full">View full Details <span
                                        class="lnr lnr-arrow-right"></span></a>
                            </div>
                            <div class="bottom">
                                <div class="color-picker d-flex align-items-center">Color:
                                    <span class="single-pick"></span>
                                    <span class="single-pick"></span>
                                    <span class="single-pick"></span>
                                    <span class="single-pick"></span>
                                    <span class="single-pick"></span>
                                </div>
                                <div class="quantity-container d-flex align-items-center mt-15">
                                    Quantity:
                                    <input type="text" class="quantity-amount ml-15" value="1" />
                                    <div class="arrow-btn d-inline-flex flex-column">
                                        <button class="increase arrow" type="button" title="Increase Quantity"><span
                                                class="lnr lnr-chevron-up"></span></button>
                                        <button class="decrease arrow" type="button" title="Decrease Quantity"><span
                                                class="lnr lnr-chevron-down"></span></button>
                                    </div>
                                </div>
                                <div class="d-flex mt-20">
                                    <a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
                                    <a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
                                    <a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
    data-cf-beacon='{"rayId":"866503b62e9e23de","b":1,"version":"2024.3.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
    crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/karma/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Mar 2024 22:03:35 GMT -->

</html>