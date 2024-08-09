<?php
include('connection.php');
include('aside.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Showcase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .image-container {
            width: 80px;
            height: 80px;
            overflow: hidden;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f4f4f4;
        }

        .image-container img {
            width: 100%;
            height: auto;
        }

        th {
            color: black;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .panel-container {
            max-width: 1000px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .panel-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 15px 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .table-container {
            padding: 20px;
        }

        .table th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
        }

        .btn-action {
            display: inline-block;
            margin-right: 5px;
        }

        i {
            margin-left: 10px;
        }

        .demo {
            background-color: yellow;
        }
    </style>
</head>

<body>
    <div class="panel-container">
        <div class="panel-header">
            User Information
        </div>
        <div class="table-container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Discription</th>
                        <th>image</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Data rows will be populated here -->
                    <?php
                    $fet = mysqli_query($mysqli, "SELECT `id`, `Cat_name`, `Cate_discription`, `image` FROM `add_categorey`");
                    while ($row = mysqli_fetch_assoc($fet)) {

                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['Cat_name'] ?></td>
                            <td><?php echo $row['Cate_discription'] ?></td>
                            <td><?php echo $row['image'] ?></td>


                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info btn-action">Edit</a>
                                <a href="fetch.php?id=<?php echo $row['id']; ?>" onclick="return confirm ('Are you sure you want to delete this record?')" class="btn btn-sm btn-danger btn-action" name="delt"> Delete<i class="fas fa-trash-alt"></i></a>
                            </td>

                        </tr>
                    <?php
                    } ?>
                    <!-- More data rows -->
                </tbody>
            </table>
        </div>
    </div>

    <?php
    if (isset($_GET['id'])) {

        $del = $_GET['id'];
        $delrow = mysqli_query($mysqli, "DELETE FROM `add_categorey` WHERE id=$del");
    
        if($delrow){
            echo "<script>alert('succecfully Deleted')
            window.location.href='fetch.php';</script>";
        }else{
            echo "<script>alert ('data not Deleted')</script>";

        }

    }


    ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>