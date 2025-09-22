 <?php

include "sidenav.php";
include "topheader.php";



?>
      <!-- End Navbar -->
      <div class="content">
      <div class="container-fluid">
          <form action="" method="POST" enctype="multipart/form-data">
              <div class="row">

              <?php
                include '../connect.php';

                if (isset($_POST['submit'])) {
                  $p_name = mysqli_real_escape_string($con, $_POST['p_name']);

                  $sql = "INSERT INTO product_cat(pro_cat) VALUES('$p_name')";
                  $query = mysqli_query($con, $sql);
                  if ($query == TRUE) {
                    echo "<script> alert('Product Added to Category Successfully ✔️✔️✔️'); window.location='index.php'; </script>";
                  }else {
                    echo "<script> alert('Product Not Added to Category');</script>";
                   
                  }



                  
                }
                
                ?>
                  <div class="col-md-7">
                      <div class="card">
                          <div class="card-header card-header-primary">
                              <h5 class="title">Add  Product Category</h5>
                          </div>
                          <div class="card-body">

                              <div class="row">

                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Product Category</label>
                                          <input type="text"  required name="p_name"
                                              class="form-control">
                                      </div>
                                  </div>
                          
                      <div class="card-footer">
                              <button type="submit" id="btn_save" name="submit" required
                                  class="btn btn-fill btn-primary">Add Product</button>
                          </div>
                      </div>
                  </div>
                  

              </div>
          </form>

      </div>
  </div>
      <?php
include "footer.php";
?>