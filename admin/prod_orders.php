<?php
session_start();

include 'sidenav.php';
include 'topheader.php';
?>
<!-- End Navbar -->
<div class='content'>
    <div class='container-fluid'>
        <!-- your content here -->
        <div class='col-md-14'>
            <div class='card '>
                <div class='card-header card-header-primary'>
                    <h4 class='card-title'>Order Products </h4>
                </div>

                <div class='card-body'>
                    <div class='table-responsive ps'>
                        <table class='table table-hover tablesorter ' id=''>
                            <thead class=' text-primary'>
                                <tr>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_GET['order_id'];
                                include '../connect.php';
                                $sql = "SELECT * FROM product_detail WHERE prod_id ='$id'";
                                $query = mysqli_query( $con, $sql );
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    
                                <tr>
                                <td><?php echo $row['user']; ?></td>
                                    <td>
                                        <img src="p_img/<?php echo $row['p_img']; ?>" style="width:50px;height:50px;">
                                </td>
                                    
                                <td><?php echo $row['p_name']; ?></td>
                                    <td><?php echo $row['p_category']; ?></td>
                                    <td>&#8358; <?php echo number_format($row['p_price']); ?></td>
                                    <td><?php echo $row['p_qty']; ?></td>
                                    <td>&#8358; <?php echo number_format($row['p_tota']); ?></td>
                                </tr>

                                    <?php
                                }

                                ?>
                                <?php
                                 include '../connect.php';
                        $id = $_GET['order_id'];

					    // $usemail = $_SESSION['email'];
					    $sql1 = "SELECT SUM(p_tota) AS value_sum FROM product_detail WHERE prod_id = '$id'";
					    $query1 = mysqli_query($con, $sql1);
                        $row1 = mysqli_fetch_array($query1);
                            ?>
                                <tr>
                                <td></td>
                                    <td></td>
                                    
                                <td></td>
                                    <td><a class="btn btn-success" href="orders.php">Back</a</td>
                                    <td></td>
                                    <td>Grand Total:</td>
                                    <td><h4><strong>&#8358; <?php echo  number_format($row1['value_sum']); ?></strong></h4></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class='ps__rail-x' style='left: 0px; bottom: 0px;'>
                            <div class='ps__thumb-x' tabindex='0' style='left: 0px; width: 0px;'></div>
                        </div>
                        <div class='ps__rail-y' style='top: 0px; right: 0px;'>
                            <div class='ps__thumb-y' tabindex='0' style='top: 0px; height: 0px;'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>