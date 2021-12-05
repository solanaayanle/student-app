<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
require_once('../../shared/config.php');
?>
<body>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <?php $adminResults = mysqli_query($conn, "SELECT * FROM admin"); ?>
    <h1 class="text-center">Update admin user</h1>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <?php while ($row = mysqli_fetch_array($adminResults)) {?>
            <tr>
                <td scope="row"><?php echo $row['adminEmail']; ?></td>
                <td><?php echo $row['adminUsername']; ?></td>
                <td><?php echo $row['adminPassword']; ?></td>
                <td>
                    <a href="editAdmin.php?id=<?php echo $row['id'];?>" type="button" class="btn btn-warning">Edit
                    </a>
                </td>
                <td>
                    <a href="deleteAdmin.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>

        <?php }?>
    </table>
    <a class="btn btn-warning" href="../addUsers/addAdminUser.php">Add new record</a>
    <a class="btn btn-primary" href="../adminDashboard.php">Go back to the dashboard</a>
</div>
</body>
</html>