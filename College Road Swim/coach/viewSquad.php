<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coach </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
require_once('../shared/config.php');
?>
<body>
<div class="col-sm-auto">
    <?php
    $coachName = $_SESSION['userData']['coachName'];
    $query = "SELECT * FROM coach WHERE coachName = '$coachName'";
    $result = mysqli_query($conn, $query) or die (mysqli_error());
    $row2 = mysqli_fetch_array($result);
    $coachSquadID = $row2['squad_id'];

    $query1 = "SELECT * FROM squad WHERE squad_id = '$coachSquadID'";
    $result2 = mysqli_query($conn, $query1) or die ( mysqli_error());
    $row3 = mysqli_fetch_assoc($result2);
    $squadName = $row3['squad_name'];

    $query2 = "SELECT * FROM viewsquads WHERE squad_name = '$squadName'";
    $result3 = mysqli_query($conn, $query2) or die ( mysqli_error());

   ?>
    <h1 class="text-center">View Squad</h1>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th colspan="3">Training Performance</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <?php while ($row4 = mysqli_fetch_assoc($result3)) {
            $memberName = $row4['username_id'];
            $query3 = "SELECT * FROM users WHERE username_id = '$memberName'";
            $result4 = mysqli_query($conn, $query3) or die ( mysqli_error());
            $row5 = mysqli_fetch_assoc($result4);
          ?>
            <tr>
                <td>
                    <?php echo $row5['firstName'];?>
                </td>
                <td><?php echo $row5['lastName']; ?></td>
                <td><b>Race: </b><?php
                    $query6 = "SELECT * FROM swimmingtrain WHERE username_id = '$memberName'";
                    $result6 = mysqli_query($conn, $query6) or die ( mysqli_error());
                    $row6 = mysqli_fetch_assoc($result6);
                    echo $row6['race']; ?>  </td>
                <td><b>Meters: </b><?php echo $row6['meters']; ?>m</td>
                <td><b>Time: </b><?php echo $row6['swimTime']; ?>s</td>

                <td>
                    <a href="addTraining.php?id=<?php echo $memberName;?>" type="button" class="btn btn-warning">Add Performance
                    </a>
                <td>

            </tr>

        <?php }?>
    </table>
    <a class="btn btn-primary" href="coachDashboard.php">Go back to the dashboard</a>
</div>
</body>
</html>