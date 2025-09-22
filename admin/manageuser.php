<?php
session_start();


include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Manage User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table tablesorter table-hover" id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>User ID</th>
                                    <th>Full Name</th>
                                    <th>User Name</th>
                                    <th>Campus</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th><a href="adduser.php" class="btn btn-success">Add New User</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            include '../connect.php';
                            $query = mysqli_query($con, "SELECT * FROM users");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['matric']; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['p_loct']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['dept']; ?></td>

                                    <td>
                                        <a href='edituser.php?id=<?php echo $row['id']; ?>' type='button' rel='tooltip'
                                            title='' class="btn btn-info btn-sm" data-original-title='Edit User'>
                                            <i class='material-icons'>Edit</i>
                                        </a>
                                        <a onclick="return confirm('Are You Sure You want to Delete this User ❌❌');"
                                            href='deluser.php?id=<?php echo $row['id']; ?>' type='button' rel='tooltip'
                                            title='' class='btn btn-danger btn-sm' data-original-title='Delete User'>
                                            <i class='material-icons'>Delete</i>
                                        </a>
                                    </td>
                                </tr>

                                <?php
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
</div>
<?php
include "footer.php";
?>