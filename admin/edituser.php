<?php
include '../connect.php';
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);
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
                  <h4 class="card-title">Edit Users</h4>
                  <p class="card-category">Edit User profile</p>
                </div>
                <?php
                $id = $_GET['id'];
                include '../connect.php';

                if (isset($_POST['submit'])) {
                  $fname = mysqli_real_escape_string($con, $_POST['fname']);
                  $matric = mysqli_real_escape_string($con, $_POST['matric']);
                  $email = mysqli_real_escape_string($con, $_POST['email']);
                  $username = mysqli_real_escape_string($con, $_POST['username']);
                  $phone = mysqli_real_escape_string($con, $_POST['phone']);
                  $dept = mysqli_real_escape_string($con, $_POST['dept']);

                  $sql = "UPDATE users SET matric = '$matric',fname = '$fname',email = '$email',username = '$username',phone = '$phone',dept = '$dept' WHERE id = '$id'"; 
                  $query = mysqli_query($con, $sql);
                  if ($query == TRUE) {
                    echo "<script> alert('User Updated Successfully ✔️✔️✔️'); window.location='manageuser.php'; </script>";
                  }else {
                    echo "<script> alert('User NOT Updated');</script>";
                   
                  }



                  
                }
                
                ?>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Full Name</label>
                          <input type="text"  name="fname" value="<?php echo $row['fname']; ?>" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Matric Number</label>
                          <input type="text" name="matric" value="<?php echo $row['matric']; ?>" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" required>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">phone number</label>
                          <input type="number" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Department</label>
                          <input type="text" name="dept" value="<?php echo $row['dept']; ?>" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary pull-right">Update User</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <?php
include "footer.php";
?>