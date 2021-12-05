<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
require_once('../../shared/config.php');
?>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <h1 class="text-center">Add Admin User</h1>
    <br>
    <form action="addAdminUser.php" method="post">
        <?php require_once('../../shared/errors.php'); ?>
    <div class="form-group">
        <label>Admin Email</label>
        <input class="form-control" type="text" name="adminEmail" size="30" maxlength="40" value="<?php if (isset($email)) echo $email; ?>" />
    </div>
    <div class="form-group">
                <label>Admin Username</label>
                <input class="form-control" type="text" name="adminUsername_id" size="20" maxlength="20" value="<?php if (isset($username)) echo $username; ?>" />
    </div>
    <div class="form-group">
                <label>Password</label>
                <input type="password" name="adminPassword" class="form-control" size="20" maxlength="20"/>
                <p><small>Please use a combination of letters, numbers, and the underscore only. Must be between 4 and 20 characters long.</small></p>
    </div>
    <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="adminConfirm_password"  class="form-control" size="20" maxlength="20"/>
     </div>
     <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Submit" name="adminRegistration">
                <a href="../adminDashboard.php"> <input type="button" class="btn btn-primary" value="Back"></a>
     </div>
</form>
</div>
</body>
</html>