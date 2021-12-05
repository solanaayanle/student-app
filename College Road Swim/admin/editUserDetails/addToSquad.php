<?php  require_once('../../shared/config.php');
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE username_id='$id'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
/*$id = $_GET['id'];
$firstName =$_REQUEST['firstName'];
$lastName =$_REQUEST['lastName'];*/?>;
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
        $squadName = mysqli_real_escape_string($conn, $_POST['squadName']);
        $randomId =  microtime() + floor(rand()*10000);
        $addSquad = "INSERT INTO viewsquads(squad_name, username_id, id) VALUES ('$squadName', '$id', '$randomId')";
        mysqli_query($conn, $addSquad) or die('Error: ' . mysqli_error($conn));
     echo '<h3 class="text-center">Record Updated Successfully</h3>';
        header( "refresh:3;url=../editUserDetails/viewSquad.php" );
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
                <label>Add to Squad</label>
                <input class="form-control" type="text" name="squadName" size="20" maxlength="50" />
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