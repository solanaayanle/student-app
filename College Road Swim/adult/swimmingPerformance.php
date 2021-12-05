<?php
require_once ('../shared/config.php');
$usernameID = $_SESSION['userData']['username_id'];
$query = "SELECT * FROM swimmingtrain WHERE username_id = '$usernameID'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Swimming performance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<h1><?php
    if (isset($_SESSION['userData'])) {
        echo "Training Details: {$_SESSION['userData']['firstName']} {$_SESSION['userData']['lastName']}";
    } ?></h1>
<br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Race</th>
        <th scope="col">Meters</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
    </tr>
    </thead>
    <?php while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <tbody>
        <tr>
            <td><?php echo $row['race'];?></td>
            <td><?php echo $row['meters']; ?></td>
            <td><?php echo $row['swimTime'];?></td>
            <td><?php echo $row['dateOfRace'];?></td>
        </tr>
        </tbody>   <?php } ?>
</table>

</div>
<a href="parent.php">
    <button type="button" class="btn btn-warning">Back</button>
</a>
</div>


</body>
</html>