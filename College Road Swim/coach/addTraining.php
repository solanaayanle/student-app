<?php
require_once ('../shared/config.php');
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE username_id='$id'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coach</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <h1 class="text-center">Edit Training Details</h1>
    <?php
    if(isset($_POST['addPerformance']) && $_POST['addPerformance']==1)
    {
        $memberRace = mysqli_real_escape_string($conn, $_POST['race']);
        $memberTime = mysqli_real_escape_string($conn, $_POST['timeRace']);
        $memberDate = mysqli_real_escape_string($conn, $_POST['dateOfRace']);
        $memberMeters = mysqli_real_escape_string($conn, $_POST['metersRace']);

        $coachID = $_SESSION['userData']['coach_id'];

        //Get Squad ID
        $query1 = "SELECT * FROM coach WHERE coach_id = '$coachID'";
        $result2 = mysqli_query($conn, $query1) or die ( mysqli_error());
        $row3 = mysqli_fetch_assoc($result2);
        $squadID = $row3['squad_id'];

        $randomId =  microtime() + floor(rand()*10000);
        $addSquad = "INSERT INTO swimmingtrain (squad_id, username_id, coach_id, race, meters, swimTime, dateOfRace, swimID) VALUES ('$squadID', '$id', '$coachID', '$memberRace', '$memberMeters', '$memberTime', '$memberDate','$randomId')";
        mysqli_query($conn, $addSquad) or die('Error: ' . mysqli_error($conn));
        echo '<h3 class="text-center">Record Updated Successfully</h3>';
        header( "refresh:3;url=../coach/viewSquad.php" );
 }else {
    ?>
    <br>
    <form name="form" method="post" action="">
        <input type="hidden" name="addPerformance" value="1" />
        <input name="id" type="hidden" value="<?php echo $row[$id];?>" />
        <label>First name</label>
        <p class="form-control" type="text" name="firstName" size="20" maxlength="50" ><?php echo $row['firstName'];?></p>
        <label>Last name</label>
        <p class="form-control" type="text" name="lastName" size="20" maxlength="50"><?php echo $row['lastName']; ?></p>
    <div class="form-group">
        <label>Race</label>
        <input class="form-control" type="text" name="race" size="20" maxlength="50"  />
    </div>
        <div class="form-group">
            <label>Meters</label>
            <input class="form-control" type="text" name="metersRace" size="20" maxlength="50"  />
        </div>
    <div class="form-group">
        <label>Time</label>
        <input class="form-control" type="text" name="timeRace" size="20" maxlength="50"  />
    </div>
    <div class="form-group">
        <label>Date</label>
        <input class="form-control" type="date" name="dateOfRace" size="20" maxlength="50"  />
    </div>
        <?php } ?>
        <div class="form-group">
            <input name="submit"  class="btn btn-danger" type="submit" value="Submit" />
        </div>
    <a href="coachDashboard.php">
        <button type="button" class="btn btn-warning">Back</button>
    </a>
        </form>
</div>
</body>
</html>