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

<body class="dark-edition">
    <div class="wrapper ">

        <?php 
// include "topheader.php";
?>
        <!-- End Navbar -->
        <?php
                    if (isset($_POST['submit'])) {
                      include '../connect.php';

                      $username = mysqli_real_escape_string($con, $_POST['username']);
                      $password = mysqli_real_escape_string($con, $_POST['password']);

                      $sql = "SELECT  * FROM user WHERE username='$username' and password='$password'";
                      $query = mysqli_query($con, $sql);

                      $dd = mysqli_fetch_array($query);

                      if ($row = mysqli_num_rows($query) > 0) {
                        
                        
                        // $_SESSION['email'] = $dd['email'];
                        // $_SESSION['username'] = $username;

                        //header(location: dashboard.php);

                        echo "<script>alert('Login Successful ✔✔✔'); window.location='dashboard.php'; </script>";
                      } else{
                        echo "<script> alert('Matric N0 or Password not correct')</script>";
                      }
                     }
            ?>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-6" style="margin:auto; padding-top: 100px; display:block;">
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"> Sign In</h4>
                        </div>
                        <form method="POST" action="">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" name="username" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>

                                <div class="card-footer" style="margin:auto; display:block;">
                                    <button type="submit" id="btn_save" name="submit" required
                                        class="btn btn-fill btn-primary">Login</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title"> Categories List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ps">
                            <table class="table table-hover tablesorter " id="">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Categories</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    include '../connect.php';
                                    $sql = "SELECT * FROM product_cat ORDER BY id DESC";
                                    $query = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_array($query)){
                                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['pro_cat']; ?></td>

                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Account Info</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ps">
                            <table class="table table-hover tablesorter " id="">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    include '../connect.php';
                                    $sql = "SELECT * FROM users";
                                    $query = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_array($query)){
                                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['password']; ?></td>

                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
                <!-- <div class="col-md-5">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Subscribers</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>$brand_id</td>
                                    <td>$brand_title</td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->



            </div>
        </div>
        <?php
include "footer.php";
?>