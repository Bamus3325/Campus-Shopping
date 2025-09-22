<?php
// session_start();
// include("../db.php");

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="panel-body">
            <a>
            </a>
        </div>
        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"> Users List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>FullName</th>
                                    <th>Matric NO</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include '../connect.php';
                            $i = 1;
                            $query = mysqli_query($con, "SELECT * FROM users");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                               <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['matric']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['dept']; ?></td>

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
        <div class="row">
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
        </div>
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