<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php require_once('shared/config.php');
if (isset($_POST['login'])) {
    $username1 = mysqli_escape_string($conn, $_POST['username1']);
    $password1 = mysqli_escape_string($conn, $_POST['password1']);
    if (empty($username1)) {
        array_push($errors, "Username is required");
    }
    if (empty($password1)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
//        $password2 = md5($password1);
        $sql = "SELECT * FROM users WHERE username_id= '$username1' AND password= '$password1'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
            $_SESSION['userData']=$data;
            $_SESSION['username1'] = $username1;
            if ($data['userType'] == 'adult')
            {
                header('location: adult/adult.php');

            } else{
                header('location: parent/parent.php');
            }
            } else {
            array_push($errors, "The username/password is incorrect");
        }
        }
    }

?>
<div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
        <h2 class="text-center">Sign In Here</h2>
        <form action="login.php" method="post">
            <?php require_once('shared/errors.php'); ?>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="username1"/>
            </div>
            <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password1" class="form-control"/>
                    </div>
            <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit" name="login">
            </div>
                    <p>Do not have an account? <a href="index.php">Register here</a></p>
        </form>
    </div>
</div>

</body>
</html>