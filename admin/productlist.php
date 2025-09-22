 <?php
 
include "sidenav.php";
include "topheader.php";

?>
 <!-- End Navbar -->
 <div class="content">
     <div class="container-fluid">


         <div class="col-md-14">
             <div class="card ">
                 <div class="card-header card-header-primary">
                     <h4 class="card-title"> Products List</h4>

                 </div>
                 <div class="card-body">
                     <div class="table-responsive ps">
                     <table class="table tablesorter " id="page1">
    <thead class=" text-primary">
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Vendor</th>
            <th>Date</th>
            <th>Total</th>
            <th>
                <a class=" btn btn-primary" href="addproduct.php">Add New Product</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../connect.php';
        $sql = "SELECT p.*, v.v_name FROM products p 
                LEFT JOIN vendor v ON p.p_loct = v.id 
                ORDER BY p.id DESC";
        $query = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td>
                    <img src='p_img/<?php echo $row['p_img']; ?>' style='width:50px; height:50px; border:groove #000'>
                </td>
                <td><?php echo $row['p_name']; ?></td>
                <td>&#8358; <?php echo number_format($row['p_price']); ?></td>
                <td><?php echo $row['v_name']; ?></td>
                <td><?php echo $row['p_date']; ?></td>
                <td><?php echo $row['p_tota']; ?></td>
                <td>
                    <a class=' btn btn-info' href='edit_product.php?product_id=<?php echo $row['id']; ?>'>Edit</a>
                    <a onclick="return confirm('Are you sure to delete this user?');" class=' btn btn-success' href='delete.php?product_id=<?php echo $row['id']; ?>'>Delete</a>
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
             <nav aria-label="Page navigation example">
                 <ul class="pagination">
                     <li class="page-item">
                         <a class="page-link" href="#" aria-label="Previous">
                             <span aria-hidden="true">&laquo;</span>
                             <span class="sr-only">Previous</span>
                         </a>
                     </li>

                     <li class="page-item"><a class="page-link" href=""></a></li>

                     <li class="page-item">
                         <a class="page-link" href="#" aria-label="Next">
                             <span aria-hidden="true">&raquo;</span>
                             <span class="sr-only">Next</span>
                         </a>
                     </li>
                 </ul>
             </nav>



         </div>


     </div>
 </div>
 <?php
include "footer.php";
?>