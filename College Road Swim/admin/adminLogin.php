<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php require_once ('../shared/config.php');
if (isset($_POST['adminLogin'])) {
    $adminUsername = mysqli_escape_string($conn, $_POST['username2']);
    $adminPassword = mysqli_escape_string($conn, $_POST['password2']);
    if (empty($adminUsername)) {
        array_push($errors, "Username is required");
    }
    if (empty($adminPassword)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $sql = "SELECT * FROM admin WHERE adminUsername= '$adminUsername' AND adminPassword= '$adminPassword'";
        $resultBack = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($resultBack);
        if ($rows == 1) {
            $data1 = mysqli_fetch_assoc($resultBack);
                $_SESSION['userData']=$data1;
                $_SESSION['username2'] = $adminUsername;
                header('location: adminDashboard.php');
        }else {
            array_push($errors, "The username/password is incorrect");
        }
        }
}
?>
<div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
        <h2 class="text-center">Admin Sign In</h2>
        <form action="adminLogin.php" method="post">
            <?php require_once('../shared/errors.php'); ?>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="username2"/>
            </div>
            <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password2" class="form-control"/>
                    </div>
            <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit" name="adminLogin">
            </div>
                 </form>
    </div>
</div>
</body>
</html>