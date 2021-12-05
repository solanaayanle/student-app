
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
if (isset($_POST['addMember'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username_id']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['dateOfBirth']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $streetName = mysqli_real_escape_string($conn, $_POST['streetName']);
    $streetNumber = mysqli_real_escape_string($conn, $_POST['streetNumber']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $postCode = mysqli_real_escape_string($conn, $_POST['postCode']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);
//Error message array
    //Check to see if any field is missing, not in correct format or if password is incorrect
    if (empty($firstName)) {
        array_push($errors, "Please enter your first name");
    }
    if ((preg_match('/[A-Za-z]/', $firstName)) && ($lastName != null)) {
    } else {
        $firstName = mysqli_real_escape_string($conn, $firstName);
        array_push($errors, "Please enter your name using letters only");
    }

    if (empty($lastName)) {
        array_push($errors, "Please enter your last name");
    }
    if ((preg_match('/[A-Za-z]/', $lastName)) && ($lastName != null)) {
    } else {
        $lastName = mysqli_real_escape_string($conn, $lastName);
        array_push($errors, "Please enter your last name using letters only");
    }


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
    $query = mysqli_query($conn, "SELECT username_id FROM users WHERE username_id='$username'");
    if (!$query)
    {
        die('Error: ' . mysqli_error($conn));
    }
    if(mysqli_num_rows($query) > 0){

        echo '<p class="error">That username has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.</p>';
        }

    if (empty($dateOfBirth)) {
        array_push($errors, "Please enter your date of birth");
    }

    if (empty($phoneNumber)) {
        array_push($errors, "Please enter a valid phone number");
    }

    if (empty($streetName)) {
        array_push($errors, "Please enter your street name");
    }

    if (empty($streetNumber)) {
        array_push($errors, "Please enter your street number ");
    }
    if (empty($city)) {
        array_push($errors, "Please enter your city");
    }
    if (empty($postCode)) {
        array_push($errors, "Please enter your postcode ");
    }
    if (empty($password)) {
        array_push($errors, "Please enter a password ");
    }

    if ($confirmPassword != $password) {
        array_push($errors, "Password does not match");
    }

    if (count($errors) == 0) {
        $pass = md5($password);
        if (isset($_POST['adultCheck']) && $_POST['adultCheck'] == 'adult') {
            $adultAccount = mysqli_real_escape_string($conn, $_POST['adultCheck']);
            echo "Adult account";
//            $query = mysqli_query($conn, "INSERT INTO users () VALUES ('$adultAccount')");
            $sql = "INSERT INTO users (userType, firstName, lastName, email, username_id, dateOfBirth, phoneNumber, streetName, streetNumber, city, postcode, password) VALUES ('$adultAccount','$firstName', '$lastName', '$email', '$username', '$dateOfBirth', '$phoneNumber', '$streetName', '$streetNumber', '$city', '$postCode','$pass')";
            if ($conn->query($sql) === TRUE) {
                echo '<h3>Record added successfully</h3>';
                header("refresh:2;url=adminDashboard.php");
            } else {
                echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
                echo('Error: ' . mysqli_error($conn));
            }


        } else if (isset($_POST['parentCheck']) && $_POST['parentCheck'] == 'child') {
            $childAccount = mysqli_real_escape_string($conn, $_POST['parentCheck']);
            echo "Parent/Child account";
//            $query = mysqli_query($conn, "INSERT INTO users (userType) VALUES ('$childAccount')");
            $sql = "INSERT INTO users (userType, firstName, lastName, email, username_id, dateOfBirth, phoneNumber, streetName, streetNumber, city, postcode, password) VALUES ('$childAccount','$firstName', '$lastName', '$email', '$username', '$dateOfBirth', '$phoneNumber', '$streetName', '$streetNumber', '$city', '$postCode','$pass')";
            if ($conn->query($sql) === TRUE) {
                echo '<h3>Record added successfully</h3>';
                header("refresh:2;url=adminDashboard.php");
            } else {
                echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
                echo('Error: ' . mysqli_error($conn));
            }

        } else {
            echo('Error: ' . mysqli_error($conn));

        }
    }
}
?>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <h1 class="text-center">Add User</h1>
    <br>
    <form action="addMemberUser.php" method="post">
        <?php require_once('../../shared/errors.php'); ?>
    <div class="form-group">
        <label>Member type</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adultCheck" value="adult">
            <label class="form-check-label" for="adultCheck">
                Adult
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="parentCheck" id="exampleRadios2" value="child">
            <label class="form-check-label" for="parentCheck">
                Parent/Child
            </label>
        </div>
    </div>
    <div class="form-group">
        <label>First Name</label>
        <input class="form-control" type="text" name="firstName" size="20" maxlength="20" value="<?php if (isset($firstName)) echo $firstName; ?>"/>
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input class="form-control" type="text" name="lastName" size="20" maxlength="20" value="<?php if (isset($lastName)) echo $lastName; ?>"/>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="text" name="email" size="30" maxlength="40" value="<?php if (isset($email)) echo $email; ?>" />
        <div>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="username_id" size="20" maxlength="20" value="<?php if (isset($username)) echo $username; ?>" />
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input class="form-control" type="date" name="dateOfBirth" size="20" value="<?php if (isset($dateOfBirth)) echo $dateOfBirth; ?>" />
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="number" name="phoneNumber" size="20" maxlength="50" value="<?php if (isset($phoneNumber)) echo $phoneNumber; ?>" />
            </div>
            <div class="form-group">
                <label>Street Name</label>
                <input class="form-control" type="text" name="streetName" size="20" maxlength="50" value="<?php if (isset($streetName)) echo $streetName; ?>" />
            </div>

            <div class="form-group">
                <label>Street Number</label>
                <input class="form-control" type="number" name="streetNumber" size="8" maxlength="20" value="<?php if (isset($streetNumber)) echo $streetNumber; ?>" />
            </div>
            <div class="form-group">
                <label>City</label>
                <input class="form-control" type="text" name="city" size="20" maxlength="20" value="<?php if (isset($city)) echo $city; ?>" />
            </div>
            <div class="form-group">
                <label>Postcode</label>
                <input class="form-control" type="text" name="postCode" size="20" maxlength="8" value="<?php if (isset($postCode)) echo $postCode; ?>" />
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
                <input type="submit" class="btn btn-danger" value="Submit" name="addMember">
                <a href="../adminDashboard.php"> <input type="button" class="btn btn-primary" value="Back"></a>
            </div>
</div>
</body>
</html>