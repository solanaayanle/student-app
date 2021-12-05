<?php  require_once('../../shared/config.php');
$id = $_GET['id'];
$query = "SELECT * FROM coach WHERE coach_id='$id'";
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
    <h1 class="text-center">Update Coach</h1>
    <?php
    if(isset($_POST['addNewCoach']) && $_POST['addNewCoach']==1)
    {
        $id = $_GET['id'];
        $coachName =$_REQUEST['coachName'];
        $email =$_REQUEST['coachEmail'];
        $coachUsername =$_REQUEST['coachUsername'];
        $squadName =$_REQUEST['squad_name'];
        $squad_id =$_REQUEST['squad_id'];
        $password =$_REQUEST['password'];
        $update = "UPDATE coach SET coachName='$coachName', coachEmail='$email', coachUsername='$coachUsername', squad_name='$squadName', squad_id='$squad_id', password='$password' WHERE coach_id='$id'";
        mysqli_query($conn, $update) or die('Error: ' . mysqli_error($conn));
        echo '<h3 class="text-center">Record Updated Successfully</h3>';
        header( "refresh:3;url=../editUserDetails/viewCoach.php" );
    }else {
    ?>
    <div>
        <form name="form" method="post" action="">
            <input type="hidden" name="addNewCoach" value="1" />
            <input name="id" type="hidden" value="<?php echo $row[$id];?>" />
            <div class="form-group">
                <label>Change Coach name</label>
                <input class="form-control" type="text" name="coachName" size="20" maxlength="50" value="<?php echo $row['coachName'];?>" />
            </div>
            <div class="form-group">
                <label>New email address</label>
                <input class="form-control" type="text" name="coachEmail" size="20" maxlength="50" value="<?php echo $row['coachEmail']; ?>" />
            </div>
            <div class="form-group">
                <label>Change Username</label>
                <input class="form-control" type="text" name="coachUsername" size="20" maxlength="50" value="<?php echo $row['coachUsername']; ?>" />
            </div>
            <div class="form-group">
                <label>Change Squad Name</label>
                <input class="form-control" type="text" name="squad_name" size="20" maxlength="50" value="<?php echo $row['squad_name']; ?>" />
            </div>
            <div class="form-group">
                <label>Squad ID</label>
                <input class="form-control" type="text" name="squad_id" size="20" maxlength="50" value="<?php echo $row['squad_id']; ?>" />
            </div>
            <div class="form-group">
                <label>Change password</label>
                <input class="form-control" type="password" name="password" size="20" maxlength="50" />
            </div>
            <div class="form-group">
                <input name="submit"  class="btn btn-danger" type="submit" value="Update" />
            </div>
        </form>
        <?php } ?>
    </div>

</div>
</body>
</html>