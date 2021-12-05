<?php
session_start();
//Connect to the Database
$conn = mysqli_connect ('localhost', 'root', '', 'registration');
//Error message for Database
if (mysqli_connect_errno($conn)) {
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

$errors = array();

//Adults Registration
if (isset($_POST['registration'])) {
    //Retrieve user data from registration page
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
    if (!$query) {
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
        $sql = "INSERT INTO users (userType, firstName, lastName, email, username_id, dateOfBirth, phoneNumber, streetName, streetNumber, city, postcode, password) VALUES ('Adult','$firstName', '$lastName', '$email', '$username', '$dateOfBirth', '$phoneNumber', '$streetName', '$streetNumber', '$city', '$postCode','$pass')";
        if ($conn->query($sql) === TRUE) {
            echo '<h3>Thank you for registering!</h3>';
            header( "refresh:3;url=login.php" );
             }
          else {
              echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
          }
        }
}

//Child's Registration

if (isset($_POST['registerChild'])) {
    //Retrieve user data from registration page
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
        $sql = "INSERT INTO users (userType, firstName, lastName, email, username_id, dateOfBirth, phoneNumber, streetName, streetNumber, city, postcode, password) VALUES ('Child', '$firstName', '$lastName', '$email', '$username', '$dateOfBirth', '$phoneNumber', '$streetName', '$streetNumber', '$city', '$postCode','$pass')";
        if ($conn->query($sql) === TRUE) {
            echo '<h3>Thank you for registering!</h3>';
            header( "refresh:3;url=login.php" );
        }
        else {
            echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
        }
    }
}

//Admin registration
if (isset($_POST['adminRegistration'])) {
//Retrieve user data from registration page
//    $id =  $_POST['id'];
    $email = mysqli_real_escape_string($conn, $_POST['adminEmail']);
    $username = mysqli_real_escape_string($conn, $_POST['adminUsername_id']);
    $password = mysqli_real_escape_string($conn, $_POST['adminPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['adminConfirm_password']);

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
    $query = mysqli_query($conn, "SELECT adminUsername FROM admin WHERE adminUsername='$username'");
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
//        $hashed_password = md5($password);
        $id = microtime() + floor(rand()*10000);;
        $sql = "INSERT INTO admin (id, adminEmail, adminPassword, adminUsername) VALUES ('$id', '$email', '$password', '$username')";
        if ($conn->query($sql) === TRUE) {
            echo '<h3>Record added successfully</h3>';
            header("refresh:2;url=../adminDashboard.php");
        } else {
            echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
            echo ('Error: ' . mysqli_error($conn));
        }
    }
}
