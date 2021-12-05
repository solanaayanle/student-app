
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coach Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php  require_once('../shared/config.php');
if (isset($_POST['coachLogin'])) {
$coachUsername = mysqli_escape_string($conn, $_POST['username1']);
$coachPassword = mysqli_escape_string($conn, $_POST['password1']);
if (empty($coachUsername)) {
array_push($errors, "Username is required");
}
if (empty($coachPassword)) {
array_push($errors, "Password is required");
}
if (count($errors) == 0) {
$sql = "SELECT * FROM coach WHERE coachUsername= '$coachUsername' AND password= '$coachPassword'";
$resultBack = mysqli_query($conn, $sql);
if (mysqli_num_rows($resultBack) == 1) {
$data1 = mysqli_fetch_assoc($resultBack);
$_SESSION['userData']=$data1;
$_SESSION['username2'] = $coachUsername;
header('location: coachDashboard.php');
}else {
array_push($errors, "The username/password is incorrect");
}
}
}
?>


<div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
        <h2 class="text-center">Coach Sign In</h2>
        <form action="coachLogIn.php" method="post">
            <?php require_once('../shared/errors.php'); ?>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="username1"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password1" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" name="coachLogin">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
    </div>
</div>

</body>
</html>