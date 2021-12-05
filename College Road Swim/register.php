<?php require_once('shared/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <h2 class="text-center">Register Here</h2>
    <p class="text-center">Please fill this form to register your account.</p>
    <form action="register.php" method="post">
     <?php require_once('shared/errors.php'); ?>
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
            <input type="submit" class="btn btn-primary" value="Submit" name="registration">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>

    </form>
        </div>
    </div>

</body>
</html>