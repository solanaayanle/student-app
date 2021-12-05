<?php  require_once('../../shared/config.php');
$id = $_REQUEST['id'];
$query = "SELECT * FROM admin where id='$id'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>;
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="form">
    <h1 class="text-center">Update Record</h1>
    <?php
    if(isset($_POST['addNewAdmin']) && $_POST['addNewAdmin']==1)
    {
        $id = $_REQUEST['id'];
        $adminEmail =$_REQUEST['email'];
        $adminUsername =$_REQUEST['username'];
        $adminPassword =$_REQUEST['adminPassword'];
        $update = "UPDATE admin SET adminEmail='$adminEmail', adminUsername='$adminUsername', adminPassword='$adminPassword' WHERE id='$id'";
        mysqli_query($conn, $update) or die('Error: ' . mysqli_error($conn));
        echo '<h3 class="text-center">Record Updated Successfully</h3>';
        header( "refresh:3;url=../editUserDetails/viewAdminUsers.php" );
    }else {
    ?>
    <div>
        <form name="form" method="post" action="" class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
            <input type="hidden" name="addNewAdmin" value="1" />
            <?php require_once('../../shared/errors.php'); ?>
            <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                <div class="form-group">
                    <label>Admin Email</label>
                    <input class="form-control" type="text" name="email" size="30" maxlength="40" value="<?php echo $row['adminEmail'];?>" />
                </div>
                <div class="form-group">
                    <label>Admin Username</label>
                    <input class="form-control" type="text" name="username" size="20" maxlength="20"  value="<?php echo $row['adminUsername'];?>" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="adminPassword" class="form-control" size="20" maxlength="20"/>
                    <p><small>Please use a combination of letters, numbers, and the underscore only. Must be between 4 and 20 characters long.</small></p>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="updatedAdminConfirm_password"  class="form-control" size="20" maxlength="20"/>
                </div>
                <div class="form-group">
                   <input name="submit"  class="btn btn-danger" type="submit" value="Update" />
                </div>
        </form>
        <?php } ?>

    </div>
</body>
</html>