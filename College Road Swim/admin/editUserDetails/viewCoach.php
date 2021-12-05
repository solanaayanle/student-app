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
    <?php $coachResults = mysqli_query($conn, "SELECT * FROM coach"); ?>
    <h1 class="text-center">Update coach users</h1>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Coach Name</th>
            <th scope="col">Coach Email</th>
            <th scope="col">Coach Username</th>
            <th scope="col">Squad Name</th>
            <th scope="col">Squad ID</th>
            <th scope="col">Password</th>
        </tr>
        </thead>
        <?php while ($row = mysqli_fetch_array($coachResults)) {?>
            <tr>
                <td scope="row"><?php echo $row['coachName']; ?></td>
                <td><?php echo $row['coachEmail']; ?></td>
                <td><?php echo $row['coachUsername']; ?></td>
                <td><?php
                    $coach_id = $row['coach_id'];
                    $query3 = "SELECT * FROM squad WHERE coach_id='$coach_id'";
                    $result3 = mysqli_query($conn, $query3) or die ( mysqli_error());
                    $row3 = mysqli_fetch_assoc($result3);
                    echo $row3['squad_name']; ?></td>
                <td><?php echo $row['squad_id']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <a href="editCoach.php?id=<?php echo $row['coach_id'];?>" type="button" class="btn btn-warning">Edit
                    </a>
                </td>
                <td>
                    <a href="deleteCoach.php?id=<?php echo $row['coach_id'];?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>

        <?php }?>
    </table>
    <a class="btn btn-warning" href="../addUsers/addCoach.php">Add new record</a>
    <a class="btn btn-primary" href="../adminDashboard.php">Go back to the dashboard</a>
</div>
</body>
</html>