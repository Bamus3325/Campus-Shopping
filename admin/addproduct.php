  <?php

    include "sidenav.php";
    include "topheader.php";

    ?>
  <style>
      option {
          color: blue;
      }
  </style>
  <!-- End Navbar -->
  <?php

    include '../connect.php';

    if (isset($_POST['submit'])) {

        $p_name = mysqli_real_escape_string($con, $_POST['p_name']);
        $p_desc = mysqli_real_escape_string($con, $_POST['p_desc']);
        $p_price = mysqli_real_escape_string($con, $_POST['p_price']);
        $p_loct = mysqli_real_escape_string($con, $_POST['p_loct']);

        $p_cat = mysqli_real_escape_string($con, $_POST['p_cat']);
        $p_tota = mysqli_real_escape_string($con, $_POST['p_tota']);
        $p_date = mysqli_real_escape_string($con, $_POST['p_date']);

        $rand = rand(1000000000, 9999999999);
        $imagename = $_FILES['image']['name'];
        $imagesync = $_FILES['image']['tmp_name'];
        $imagetype = $_FILES['image']['type'];
        $targetdir = "p_img/";
        $img = $rand . '_' . $imagename;
        $extension = pathinfo($imagename, PATHINFO_EXTENSION);

        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'])) {
    ?>
          <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              The File Uploaded is Not jpg, jpeg, png Format
          </div>
  <?php
        } else {

            if (move_uploaded_file($imagesync, $targetdir . $img)) {

                $sql = "INSERT INTO products(p_name, p_img, p_desc, p_price, p_loct, p_category, p_tota, p_date) 
				VALUES('$p_name','$img','$p_desc','$p_price','$p_loct','$p_cat','$p_tota','$p_date')";
                $query = mysqli_query($con, $sql);

                if ($query == TRUE) {
                    echo "<script>alert('Product Added Successful ✔✔✔'); window.location='productlist.php'; </script>";
                } else {
                    echo "<script>alert('Product Not Added Successful'); </script>";
                }
            }
        }
    }


    ?>
  <div class="content">
      <div class="container-fluid">
          <form action="" method="POST" enctype="multipart/form-data">
              <div class="row">


                  <div class="col-md-7">
                      <div class="card">
                          <div class="card-header card-header-primary">
                              <h5 class="title">Add Product</h5>
                          </div>
                          <div class="card-body">

                              <div class="row">

                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Product Name</label>
                                          <input type="text" required name="p_name" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="">
                                          <label for="">Add Image</label>
                                          <input type="file" id="fileinput" name="image"
                                              class="btn btn-fill btn-success" required>
                                          <img src="#" id="preview" alt="selected image"
                                              style="display:none; width:200px; height:100px;"><br>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Description</label>
                                          <textarea rows="4" cols="80" id="details" required name="p_desc"
                                              class="form-control"></textarea>
                                      </div>
                                  </div>

                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Pricing</label>
                                          <input type="number" id="price" name="p_price" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Product Vendor</label>
                                          <select name="p_loct" class="form-control" required>
                                              <option value="">---Select Vendor---</option>
                                              <?php
                                                include '../connect.php';
                                                $query = mysqli_query($con, "SELECT * FROM vendor");
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                  <option value="<?php echo $row['id']; ?>"><?php echo $row['v_name']; ?>
                                                  </option>
                                              <?php
                                                }
                                                ?>

                                          </select>
                                          <!-- <input type="number" id="product_type" name="product_type" required="[1-6]" class="form-control"> -->
                                      </div>
                                  </div>
                              </div>



                          </div>

                      </div>
                  </div>
                  <div class="col-md-5">
                      <div class="card">
                          <div class="card-header card-header-primary">
                              <h5 class="title">Categories</h5>
                          </div>
                          <div class="card-body">

                              <div class="row">

                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Product Category</label>
                                          <select name="p_cat" class="form-control" required>
                                              <option value="">---Select Category---</option>
                                              <?php
                                                include '../connect.php';
                                                $query = mysqli_query($con, "SELECT * FROM product_cat ORDER BY id DESC");
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                  <option><?php echo $row['pro_cat']; ?></option>
                                              <?php
                                                }
                                                ?>
                                          </select>
                                          <!-- <input type="number" id="product_type" name="product_type" required="[1-6]" class="form-control"> -->
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="">Product Total</label>
                                          <input type="number" id="brand" name="p_tota" required class="form-control">
                                      </div>
                                  </div>


                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Date</label>
                                          <input type="text" value="<?php echo date('d-m-Y'); ?>" name="p_date"
                                              class="form-control" readonly>
                                      </div>
                                  </div>
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
  <script type="text/javascript">
      document.getElementById('fileinput').addEventListener('change', function() {
          var file = this.files[0];
          if (file) {
              var reader = new FileReader();
              reader.onload = function(event) {
                  document.getElementById('preview').setAttribute('src', event.target.result);
                  document.getElementById('preview').style.display = 'block';

              };
              reader.readAsDataURL(file);
          }

      });
  </script>