<?php include '_include/head.php' ?>

<section class='banner-area organic-breadcrumb'>
    <div class='container'>
        <div class='breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end'>
            <div class='col-first'>
                <h1>Login/Register</h1>
                <nav class='d-flex align-items-center'>
                    <a href=''>Home<span class='lnr lnr-arrow-right'></span></a>
                    <a href='login.php'>Login/Register</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class='login_box_area section_gap'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-6'>
                <div class='login_box_img'>
                    <img class='img-fluid' src='img/login.jpg' alt>
                    <div class='hover'>
                        <h4>New to our website?</h4>
                        <p>It's where students can find everything they need conveniently located within or near the
                            Campus</p>
                        <a class="primary-btn" href="register.php">Create an Account</a>
                    </div>
                </div>
            </div>
            <?php
                    if (isset($_POST['submit'])) {
                      include 'connect.php';

                      $username = mysqli_real_escape_string($con, $_POST['username']);
                      $password = mysqli_real_escape_string($con, $_POST['password']);

                      $sql = "SELECT  * FROM users WHERE matric='$username' and password='$password'";
                      $query = mysqli_query($con, $sql);

                      $dd = mysqli_fetch_array($query);

                      if ($row = mysqli_num_rows($query) > 0) {
                        
                        
                        $_SESSION['email'] = $dd['email'];
                        $_SESSION['username'] = $username;

                        //header(location: dashboard.php);

                        echo "<script>alert('Login Successful ✔✔✔'); window.location='index.php'; </script>";
                      } else{
                        echo "<script> alert('Matric N0 or Password not correct')</script>";
                      }
                     }
            ?>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    <form class="row login_form" action="" method="POST">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="username" placeholder="Matric N0"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Matric N0'" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="name" name="password" placeholder="Password"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Keep me logged in</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" name="submit" value="submit" class="primary-btn">Log In</button>
                            <a href="#">Forgot Password?</a>
                        </div>
                    </form>
                </div>
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
    data-cf-beacon=' {
    ' rayId':'866503d85b2f385a', 'b' :1, 'version' :'2024.2.4', 'token' :'cd0b4b3a733644fc843ef0b185f98241'} '
    crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/karma/login.html by HTTrack Website Copier/3.x [XR&CO' 2014 ], Sat, 16
    Mar 2024 22:04:21 GMT -->
< /html>