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

if(isset($_POST['submit'])){

	$v_name = mysqli_real_escape_string($con, $_POST['v_name']);
	$v_loct = mysqli_real_escape_string($con, $_POST['v_loct']);
	

	$rand = rand(1000000000,9999999999);
	$imagename = $_FILES['image']['name'];
	$imagesync = $_FILES['image']['tmp_name'];
	$imagetype = $_FILES['image']['type'];
	$targetdir = "p_img/";
	$img = $rand.'_'.$imagename;
	$extension = pathinfo($imagename, PATHINFO_EXTENSION);

if (!in_array($extension, ['jpg','jpeg','png','JPG','JPEG','PNG'])){
   ?>
  <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      The File Uploaded is Not jpg, jpeg, png Format
  </div>
  <?php
}else{

if (move_uploaded_file($imagesync,$targetdir.$img)){
	
	$sql = "INSERT INTO vendor(v_name, v_img, v_loct) 
				VALUES('$v_name','$img','$v_loct')";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script>alert('Vendor Added Successful ✔✔✔'); </script>";
	}else {
		echo "<script>alert('Vendor Not Added Successful'); </script>";

	}
}
}

}


?>
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header card-header-primary">
                              <h5 class="title">Add  New Vendor</h5>
                          </div>
                          <div class="card-body">

                              <div class="row">

                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Vendor Name</label>
                                          <input type="text"  required name="v_name"
                                              class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="">
                                          <label for="">Add Image</label>
                                          <input type="file" id="fileinput" name="image"
                                              class="btn btn-fill btn-success" required>
                                          <img src="#" id="preview" alt="selected image"
                                              style="display:none; width:200px; height:100px;"><br>
                                      </div>
                                  </div>
                                  <br><br><br><br>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Vendor Location</label>
                                          <select name="v_loct" class="form-control" required>
                                              <option value="">---Select Campus---</option>
                                              <option value="MINI">MINI</option>
                                              <option value="PS">PS</option>

                                          </select>
                                          <!-- <input type="number" id="product_type" name="product_type" required="[1-6]" class="form-control"> -->
                                      </div>
                                  </div>
                          
                      <div class="card-footer">
                              <button type="submit" id="btn_save" name="submit" required
                                  class="btn btn-fill btn-primary">Add Vendor</button>
                          </div>
                      </div>
                  </div>
                  

              </div>
          </form>

          <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"> Vendors List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Profile Pixture</th>
                                    <th>Name</th>
                                    <th>Campus</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include '../connect.php';
                            $i = 1;
                            $query = mysqli_query($con, "SELECT * FROM vendor");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                               <tr>
                                    <td><?php echo $i ?></td>
                                    <td><img src='p_img/<?php echo $row['v_img']; ?>'
                                    style='width:50px; height:50px; border:groove #000'></td>
                                    <td><?php echo $row['v_name']; ?></td>
                                    <td><?php echo $row['v_loct']; ?></td>

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