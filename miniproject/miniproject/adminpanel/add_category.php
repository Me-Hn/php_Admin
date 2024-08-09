<?php
include('connection.php');
include('aside.php') 
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>

    </div>

    <!-- Content Row -->
    <div class="card-body">

        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label danger">Category Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="cname" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category Description</label>
                <input type="text" class="form-control" name="discription" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category Image</label>
                <input type="file" class="form-control" name="cimage" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary" name="catbtn" >Add Category</button>
        
    </div>
</div>
</div>

<?php

if (isset($_POST['catbtn'])) {
    // Retrieve form data
    $cat_name = $_POST['cname'];
    $cat_disc = $_POST['discription']; // Corrected spelling here
    $cat_img = $_FILES['cimage']['name'];
    $temp_cat = $_FILES['cimage']['tmp_name']; // Corrected variable name
    
    // Define the destination path for the uploaded file
    $destination = "img/".$cat_img;
    
    // Move the uploaded file to the destination
    if (move_uploaded_file($temp_cat, $destination)) {
        // Prepare and execute the SQL query
    $query = mysqli_query($mysqli,"INSERT INTO `add_categorey`( `Cat_name`, `Cate_discription`, `image`) VALUES ('$cat_name',' $cat_disc',' $cat_img ')")  ;   
        // Make sure $mysqli is a valid connection object
        echo "<script>alert('succecfully Added')
        window.location.href='fetch.php';</script>";
    } 
    else {
        echo "Failed to upload file.";
    }
}



?>

<!-- Footer -->
<?php
include('footer.php');
?>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>