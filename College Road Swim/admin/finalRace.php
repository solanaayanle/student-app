<?php  require_once('../shared/config.php');
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE username_id='$id'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>;
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <h1 class="text-center">Update User</h1>
    <?php
    if(isset($_POST['addToSquad']) && $_POST['addToSquad']==1)
    {
        $memberRace = mysqli_real_escape_string($conn, $_POST['race']);
        $memberTime = mysqli_real_escape_string($conn, $_POST['swimTime']);
        $memberDate = mysqli_real_escape_string($conn, $_POST['dateOfRace']);
        $memberMeters = mysqli_real_escape_string($conn, $_POST['meters']);

        $query1 = "SELECT * FROM swimmingtrain where username_id = '$id'";


        $result2 = mysqli_query($conn, $query1) or die ( mysqli_error());
        $row3 = mysqli_fetch_assoc($result2);

        $squadID = $row3['squad_id'];
        $squadCoach =  $row3['coach_id'];


        $randomId =  microtime() + floor(rand()*10000);
        $addSquad = "INSERT INTO finalrace (finalID, username_id, squad_id, coach_id, finalRace, finalMeters, finalTime, finalDateOfRace)  
VALUES('$randomId', '$id', '$squadID', '$squadCoach', '$memberRace', '$memberMeters', '$memberTime', '$memberDate')";

        mysqli_query($conn, $addSquad) or die('Error: ' . mysqli_error($conn));
        echo '<h3 class="text-center">Record Updated Successfully</h3>';
        header( "refresh:3;url= editFinalRace.php" );
    }else {
    ?>
    <div>
        <form name="form" method="post" action="">
            <input type="hidden" name="addToSquad" value="1" />
            <input name="id" type="hidden" value="<?php echo $row[$id];?>" />
            <label>First Name</label>
            <p class="form-control" type="text" name="firstName" size="20" maxlength="50"><?php echo $row['firstName'];?></p>
            <div class="form-group">
                <label>Last name</label>
                <p class="form-control" type="text" name="lastName" size="20" maxlength="50" ><?php echo $row['lastName']; ?></p>
            </div>
            <div class="form-group">
                <label>Race</label>
                <input class="form-control" type="text" name="race" size="20" maxlength="50" />
            </div>
            <div class="form-group">
                <label>Meters</label>
                <input class="form-control" type="text" name="meters" size="20" maxlength="50" />
            </div>
            <div class="form-group">
                <label>Swim Time</label>
                <input class="form-control" type="text" name="swimTime" size="20" maxlength="50" />
            </div>
            <div class="form-group">
                <label>Date of Race</label>
                <input class="form-control" type="date" name="dateOfRace" size="20" maxlength="50" />
            </div>

            <?php } ?>
            <div class="form-group">
                <input name="submit"  class="btn btn-danger" type="submit" value="Submit" />
            </div>
        </form>

    </div>

</div>
</body>
</html>