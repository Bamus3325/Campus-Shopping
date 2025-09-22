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
                    <h4 class='card-title'>Products </h4>
                </div>

                <div class='card-body'>
                    <div class='table-responsive ps'>
                        <table class='table table-hover tablesorter ' id=''>
                            <thead class=' text-primary'>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Amount</th>
                                    <th>Channel</th>
                                    <th style='text-align: center;'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../connect.php';
                                $sql = 'SELECT * FROM payment ORDER BY id DESC';
                                $query = mysqli_query( $con, $sql );
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                <tr>
                                    <td><?php echo $row['cdate']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['locat']; ?></td>
                                    <td>&#8358; <?php echo number_format($row['amount']); ?></td>
                                    <td><?php echo $row['channel']; ?></td>
                                    <td>
                                        <a class=' btn btn-success'
                                            href='prod_orders.php?order_id=<?php echo $row['reference_id']; ?>'>Veiw
                                            products</a>
                                        <?php
                                            if ($row['status']== 0) {
                                                ?>
                                        <a class=' btn btn-danger'
                                            href='update.php?order_id=<?php echo $row['reference_id']; ?>'>Pending</a>

                                        <?php
                                            }else {
                                                ?>
                                        <button class=' btn btn-success'>Success ✔✔</button>
                                        <?php
                                                
                                            }

                                            ?>


                                    </td>
                                </tr>

                                <?php
                                }

                                ?>
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