<?php
require_once('../shared/config.php');
$query = "SELECT * FROM finalrace";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Race Performance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <h1 class="text-center">Edit Race Performance</h1>
    <a href="../admin/adminDashboard.php">
        <button type="button" class="btn btn-warning">Dashboard</button>
    </a>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
    </div>

    <div>
        <table class="table">
            <thead>

            <tr>
                <th scope="col">Squad</th>
                <th scope="col">Swimmer Name</th>
                <th scope="col">Age Group</th>
                <th scope="col">Race</th>
                <th scope="col">Meters</th>
                <th scope="col">Time</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead><?php while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tbody>
            <tr>
                <td><?php
                    $squadID = $row['squad_id'];
                    $query3 = "SELECT * FROM squad WHERE squad_id ='$squadID' ";
                    $result4 = mysqli_query($conn, $query3) or die ( mysqli_error());
                    $row5 = mysqli_fetch_assoc($result4);

                    echo $row5['squad_name']; ?></td>
                <td><?php
                    $usernameID = $row['username_id'];
                    $query5 = "SELECT * FROM users WHERE username_id ='$usernameID'";
                    $result5 = mysqli_query($conn, $query5) or die ( mysqli_error());
                    $row6 = mysqli_fetch_assoc($result5);

                    echo $row6['firstName']." ".$row6['lastName'];?></td>
                <td><?php echo $row6['userType'];?></td>

                <td><?php echo $row['finalRace'];?></td>
                <td><?php echo $row['finalMeters']; ?></td>
                <td><?php echo $row['finalTime'];?></td>
                <td><?php echo $row['finalDateOfRace'];?></td>
                <td> <a href="finalRace.php?id=<?php echo $row['username_id'];?>" type="button" class="btn btn-warning">Update
                    </a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>