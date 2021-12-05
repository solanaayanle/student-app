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
if (isset($_POST['coachRegistration'])) {
//Retrieve user data from registration page
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username_id']);
    $squadName = mysqli_real_escape_string($conn, $_POST['squadName']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if (empty($email)) {
        array_push($errors, "Please enter your email");
    }
    if ((preg_match('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/', $email)) && ($email != null)) {
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        array_push($errors, "Please enter a valid email address");
    }

    if (empty($username)) {
        array_push($errors, "Please enter your username");
    }
    if ((preg_match('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/', $username)) && ($username != null)) {
        $username = mysqli_real_escape_string($conn, $username);
        array_push($errors, "Please enter a valid email address");
    }
// Make sure the username is unique and not taken:
    $query = mysqli_query($conn, "SELECT username_id FROM admin WHERE username_id='$username'");
    if (!$query) {
        die('Error: ' . mysqli_error($conn));
    }
    if (mysqli_num_rows($query) > 0) {
        echo '<p class="error">That username has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.</p>';
    }

    if (empty($password)) {
        array_push($errors, "Please enter a password ");
    }

    if ($confirmPassword != $password) {
        array_push($errors, "Password does not match");
    }
    if (count($errors) == 0) {
        $pass = md5($password);
        $id = microtime() + floor(rand()*10000);
        $squad_id = microtime() + floor(rand()*10000);;
        $sql = "INSERT INTO coach (coach_id, coachName, coachEmail, coachUsername, squad_name, squad_id, password) VALUES ('$id', '$firstName', '$email', '$username', '$squadName', '$squad_id', '$pass')";
        if ($conn->query($sql) === TRUE) {
            echo '<h3>Record added successfully</h3>';
            header("refresh:2;url=adminDashboard.php");
        } else {
            echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
            echo ('Error: ' . mysqli_error($conn));
        }
    }
}
?>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <h1 class="text-center">Add Coach</h1>
    <br>
    <form action="addCoach.php" method="post">
        <div class="form-group">
            <label>Coach Name</label>
            <input class="form-control" type="text" name="firstName" size="20" maxlength="20" value="<?php if (isset($firstName)) echo $firstName; ?>"/>
        </div>
        <div class="form-group">
            <label>Coach Email</label>
            <input class="form-control" type="text" name="email" size="30" maxlength="40" value="<?php if (isset($email)) echo $email; ?>" />
        </div>
        <div class="form-group">
            <label>Coach Username</label>
            <input class="form-control" type="text" name="username_id" size="20" maxlength="20" value="<?php if (isset($username)) echo $username; ?>" />
        </div>
        <div class="form-group">
            <label>Squad Name</label>
            <input class="form-control" type="text" name="squadName" size="20" maxlength="20" value="<?php if (isset($squadName)) echo $squadName; ?>"/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" size="20" maxlength="20"/>
            <p><small>Please use a combination of letters, numbers, and the underscore only. Must be between 4 and 20 characters long.</small></p>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password"  class="form-control" size="20" maxlength="20"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Submit" name="coachRegistration">
            <a href="../adminDashboard.php"> <input type="button" class="btn btn-primary" value="Back"></a>
        </div>
    </form>
</div>
</body>
</html>