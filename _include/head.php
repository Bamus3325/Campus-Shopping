<?php
session_start();

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<!-- Mirrored from preview.colorlib.com/theme/karma/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Mar 2024 22:01:28 GMT -->

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="img/fav.png">

    <meta name="author" content="CodePixar">

    <meta name="description" content>

    <meta name="keywords" content>

    <meta charset="UTF-8">

    <title>Campus Order</title>

    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/main.css">
    <script nonce="9250560a-b622-46cd-b0eb-c19841fac4b9">
    try {
        (function(w, d) {
            ! function(du, dv, dw, dx) {
                du[dw] = du[dw] || {};
                du[dw].executed = [];
                du.zaraz = {
                    deferred: [],
                    listeners: []
                };
                du.zaraz.q = [];
                du.zaraz._f = function(dy) {
                    return async function() {
                        var dz = Array.prototype.slice.call(arguments);
                        du.zaraz.q.push({
                            m: dy,
                            a: dz
                        })
                    }
                };
                for (const dA of ["track", "set", "debug"]) du.zaraz[dA] = du.zaraz._f(dA);
                du.zaraz.init = () => {
                    var dB = dv.getElementsByTagName(dx)[0],
                        dC = dv.createElement(dx),
                        dD = dv.getElementsByTagName("title")[0];
                    dD && (du[dw].t = dv.getElementsByTagName("title")[0].text);
                    du[dw].x = Math.random();
                    du[dw].w = du.screen.width;
                    du[dw].h = du.screen.height;
                    du[dw].j = du.innerHeight;
                    du[dw].e = du.innerWidth;
                    du[dw].l = du.location.href;
                    du[dw].r = dv.referrer;
                    du[dw].k = du.screen.colorDepth;
                    du[dw].n = dv.characterSet;
                    du[dw].o = (new Date).getTimezoneOffset();
                    if (du.dataLayer)
                        for (const dH of Object.entries(Object.entries(dataLayer).reduce(((dI, dJ) => ({
                                ...dI[1],
                                ...dJ[1]
                            })), {}))) zaraz.set(dH[0], dH[1], {
                            scope: "page"
                        });
                    du[dw].q = [];
                    for (; du.zaraz.q.length;) {
                        const dK = du.zaraz.q.shift();
                        du[dw].q.push(dK)
                    }
                    dC.defer = !0;
                    for (const dL of [localStorage, sessionStorage]) Object.keys(dL || {}).filter((dN => dN
                        .startsWith("_zaraz_"))).forEach((dM => {
                        try {
                            du[dw]["z_" + dM.slice(7)] = JSON.parse(dL.getItem(dM))
                        } catch {
                            du[dw]["z_" + dM.slice(7)] = dL.getItem(dM)
                        }
                    }));
                    dC.referrerPolicy = "origin";
                    dC.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(du[
                        dw])));
                    dB.parentNode.insertBefore(dC, dB)
                };
                ["complete", "interactive"].includes(dv.readyState) ? zaraz.init() : du.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document)
    } catch (e) {
        throw fetch("/cdn-cgi/zaraz/t"), e;
    };
    </script>
</head>

<body>

    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">

                    <a class="navbar-brand logo_h" href="index.html"><img src="img/logo1.png" alt></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                            <?php if(!isset($_SESSION['email'])){
                                ?>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a onclick="return alert('Please Login to your Account ❗❗❗');"
                                            class="nav-link" href="login.php">View Vendors</a>
                                    </li>
                                    <!-- <li class="nav-item"><a onclick="return alert('Please Login to your Account ❗❗❗');"
                                            class="nav-link" href="login.php">MIN Campus Products</a>
                                    </li>
                                    <li class="nav-item"><a onclick="return alert('Please Login to your Account ❗❗❗');"
                                            class="nav-link" href="login.php">PS Campus Products</a>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a onclick="return alert('Please Login to your Account ❗❗❗');" href="login.php"
                                    class="nav-link">Settings</a>

                            </li>

                            <li class="nav-item"><a onclick="return alert('Please Login to your Account ❗❗❗');"
                                    class="nav-link" href="login.php">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.php">Login/Register</a></li>
                            <?php 

                             }else {
                               ?>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="ven.php">View Vendors</a>
                                    </li>
                                    <!-- <li class="nav-item"><a class="nav-link" href="mini.php">MIN Campus Products</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="ps.php">PS Campus Products</a>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="settings.php" class="nav-link">Settings</a>

                            </li>

                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                            <li class="nav-item"><i class="ti-bag"></i> <a class="nav-link" href="carts.php">Carts</a>
                                <?php
                            $use = $_SESSION['email'];
                             include 'connect.php';
                             $query = mysqli_query($con, "SELECT * FROM product_detail WHERE user ='$use' and status ='0'");
                             $query1 = mysqli_query($con, "SELECT * FROM users WHERE email ='$use'");
                             $row = mysqli_fetch_array($query1);
                             $r = mysqli_num_rows( $query);
                            ?>
                                <sup
                                    style="color: #fff; background-color: red; border-radius:50%; font-size: 12px; padding: 3px 5px;"><?php echo $r; ?><sup>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> -->
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Hi <b
                                        style="color: red; font-size: 16px;"><?php echo $row['username']; ?></b></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li class="nav-item"><a class="nav-link" onclick="return confirm('Are you sure to Logout?');" href="logout.php">Hi  <b style="color: red; font-size: 16px;"><?php echo $row['username']; ?></b></a></li> -->
                            <?php
                             }
                            ?>


                        </ul>

                        <ul class="nav navbar-nav navbar-right">

                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
            <form class="d-flex justify-content-between" method="POST" action="search.php">
                    <input type="text" class="form-control" id="search_input" name="search" placeholder="Search Here">
                    <button type="submit" name="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>