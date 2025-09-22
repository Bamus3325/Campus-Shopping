<!doctype html>
<html lang="en">

<head>
    <title>Hello, Admin!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link href="assets/css/black-dashboard.css" rel="stylesheet" />

</head>
<style>
/* Sidebar: Full height */
.sidebar {
    height: 100vh; /* Full viewport height */
    overflow: hidden; /* Prevents the sidebar from overflowing */
}

/* Sidebar wrapper: Enable scrolling */
.sidebar-wrapper {
    height: calc(100vh - 80px); /* Subtract the height of the header or logo if any */
    overflow-y: auto; /* Enables vertical scrolling */
    padding-bottom: 10px; /* Small padding to ensure scroll doesn't hide the last link */
}


</style>
<body class="dark-edition">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
            <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo">
                <a href="" class="simple-text logo-normal">
                    Hello Admin!
                </a>
            </div>
            <div class="sidebar-wrapper ps-container ps-theme-default"
                data-ps-id="3a8db1f4-24d8-4dbf-85c9-4f5215c1b29a">
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.php">
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="adduser.php">
                            <p>Add User</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="addvend.php">
                            <p>Add Vendor</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="addcat.php">
                            <p>Add Product Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productlist.php">
                            <p>Product List</p>
                        </a>

                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="orders.php">
                            <p>Order Products</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="addproduct.php">
                            <p>Add Products</p>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="manageuser.php">
                            <p>Manage User</p>
                        </a>
                    </li> -->
                    <li class="nav-item ">
                        <a class="nav-link" href="logout.php">
                            <p>Logout</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
                </ul>
            </div>
        </div>
        <script>
          // Initialize PerfectScrollbar
document.addEventListener("DOMContentLoaded", function() {
    var sidebar = document.querySelector('.sidebar-wrapper');
    var ps = new PerfectScrollbar(sidebar, {
        suppressScrollX: true, // Disable horizontal scroll
        wheelSpeed: 2,
        minScrollbarLength: 50
    });
});
        </script>