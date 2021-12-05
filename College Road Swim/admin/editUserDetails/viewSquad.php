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
    <?php $viewAllMembers = mysqli_query($conn, "SELECT * FROM users"); ?>
    <h1 class="text-center">View Squad</h1>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Squad Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Coach</th>
            <th scope="col">Last Performance</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <?php while ($row = mysqli_fetch_array($viewAllMembers)) {
            //Get Squad_id  where squad_name = squid_id
            $userID = $row['username_id'];
            $query1 = "SELECT * FROM viewsquads WHERE username_id = '$userID'";
            $result2 = mysqli_query($conn, $query1) or die ( mysqli_error());
            $row2 = mysqli_fetch_assoc($result2);
            $viewAllSquad = mysqli_query($conn, "SELECT * FROM squad");
            ?>
            <tr>
                <td scope="row"><?php echo $row2['squad_name']; ?></td>
                <td><?php echo $row['firstName']; ?></td>
                <td><?php echo $row['lastName']; ?></td>
                <td><?php
                    //Get squad Name
                      $squadName = $row2['squad_name'];
                      $query3 = "SELECT * FROM squad WHERE squad_name='$squadName'";
                      $result3 = mysqli_query($conn, $query3) or die ( mysqli_error());
                      $row3 = mysqli_fetch_assoc($result3);
                      $squadID = $row3['squad_id'];
                      //Get Coach
                      $coachID = $row3['coach_id'];
                      $row21 =  mysqli_fetch_array($viewAllSquad);
                      $viewCoach = mysqli_query($conn, "SELECT * FROM coach WHERE coach_id = '$coachID'");
                      $row4 =  mysqli_fetch_array($viewCoach);
                    echo $row4['coachName'];
                ?></td>
                <td>120m - 4mins</td>
                <td>
                    <a href="addToSquad.php?id=<?php echo $row['username_id'];?>" type="button" class="btn btn-warning">Add to Squad
                    </a>
                </td>
            </tr>

        <?php }?>
    </table>
    <a class="btn btn-warning" href="../addUsers/addMemberUser.php">Add new record</a>
    <a class="btn btn-primary" href="../adminDashboard.php">Go back to the dashboard</a>
</div>
</body>
</html>