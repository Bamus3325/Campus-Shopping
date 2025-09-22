 <?php

include "sidenav.php";
include "topheader.php";



?>
 <!-- End Navbar -->
 <div class="content">
     <div class="container-fluid">
         <!-- your content here -->
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header card-header-primary">
                     <h4 class="card-title">Add Users</h4>
                     <p class="card-category">Complete User profile</p>
                 </div>
                 <?php
                include '../connect.php';

                if (isset($_POST['submit'])) {
                  $fname = mysqli_real_escape_string($con, $_POST['fname']);
                  $location = mysqli_real_escape_string($con, $_POST['location']);
                  $p_loct = mysqli_real_escape_string($con, $_POST['p_loct']);
                  
                  $matric = mysqli_real_escape_string($con, $_POST['matric']);
                  $email = mysqli_real_escape_string($con, $_POST['email']);
                  $username = mysqli_real_escape_string($con, $_POST['username']);
                  $password = mysqli_real_escape_string($con, $_POST['password']);
                  $phone = mysqli_real_escape_string($con, $_POST['phone']);
                  $dept = mysqli_real_escape_string($con, $_POST['dept']);

                  $query1 = mysqli_query($con, "SELECT * FROM users WHERE email= '$email' OR matric= '$matric'");
                  if (mysqli_num_rows($query1) > 0) {
                    echo "<script> alert('Email or Matric N0 already Exist...❌❌');</script>";
                  }else {
                    $sql = "INSERT INTO users(fname, matric, email, phone, dept, location, p_loct, username, password) 
                          VALUES('$fname','$matric','$email','$phone','$dept','$location','$p_loct','$username','$password')";
                  $query = mysqli_query($con, $sql);
                  if ($query == TRUE) {
                    echo "<script> alert('User Register Successfully ✔️✔️✔️');  </script>";
                  }else {
                    echo "<script> alert('User NOT Register');</script>";
                   
                  }
                  }

                  
                  
                }
                
                ?>
                 <div class="card-body">
                     <form action="" method="POST" enctype="multipart/form-data">
                         <div class="row">

                             <div class="col-md-6">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Full Name</label>
                                     <input type="text" name="fname" class="form-control" required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Matric Number</label>
                                     <input type="text" name="matric" class="form-control" required>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Email</label>
                                     <input type="email" name="email" class="form-control" required>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Username</label>
                                     <input type="text" name="username" class="form-control" required>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Password</label>
                                     <input type="password" name="password" class="form-control" required>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">phone number</label>
                                     <input type="number" name="phone" class="form-control" required>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Location</label>
                                     <input type="text" name="location" class="form-control" required>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Location</label>
                                     <select name="p_loct" class="form-control" required>
                                         <option value="">---Select Campus---</option>
                                         <option value="MINI">MINI</option>
                                         <option value="PS">PS</option>

                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Department</label>
                                     <input type="text" name="dept" class="form-control" required>
                                 </div>
                             </div>
                         </div>


                         <button type="submit" name="submit" class="btn btn-primary pull-right">Register User</button>
                         <div class="clearfix"></div>
                     </form>
                 </div>
             </div>
         </div>


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