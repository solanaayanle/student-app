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
<div class="col-sm-auto">
    <?php $memberResults = mysqli_query($conn, "SELECT * FROM users"); ?>
    <h1 class="text-center">Update member users</h1>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">User Type</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Street Name</th>
            <th scope="col">Street Number</th>
            <th scope="col">Postcode</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <?php while ($row = mysqli_fetch_array($memberResults)) {?>
            <tr>
                <td scope="row"><?php echo $row['userType']; ?></td>
                <td><?php echo $row['firstName']; ?></td>
                <td><?php echo $row['lastName']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['dateOfBirth']; ?></td>
                <td ><?php echo $row['phoneNumber']; ?></td>
                <td><?php echo $row['streetName']; ?></td>
                <td><?php echo $row['streetNumber']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td>
                    <a href="editMember.php?id=<?php echo $row['username_id'];?>" type="button" class="btn btn-warning">Edit
                    </a>
                <td>
                    <a href="addToSquad.php?id=<?php echo $row['username_id'];?>" type="button" class="btn btn-warning">Add to Squad
                    </a>
                </td>
                <td>
                     <a href="deleteMembers.php?id=<?php echo $row['username_id'];?>" class="btn btn-danger">Delete</a>
                     </td>
            </tr>

        <?php }?>
    </table>
    <a class="btn btn-warning" href="../addUsers/addAdminUser.php">Add new record</a>
    <a class="btn btn-primary" href="../adminDashboard.php">Go back to the dashboard</a>
</div>
</body>
</html>