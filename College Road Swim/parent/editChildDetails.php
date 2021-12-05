<?php
require_once ('../shared/config.php');
$usernameID = $_SESSION['userData']['username_id'];
$query = "SELECT * FROM users WHERE username_id='$usernameID'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parent Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <h1 class="text-center">Update Child's Details</h1>
    <?php
    if(isset($_POST['updateChild']) && $_POST['updateChild']==1)
    {
        $firstName =$_REQUEST['firstName'];
        $lastName =$_REQUEST['lastName'];
        $email =$_REQUEST['email'];
        $phoneNumber =$_REQUEST['phoneNumber'];
        $streetName =$_REQUEST['streetName'];
        $streetNumber =$_REQUEST['streetNumber'];
        $city =$_REQUEST['city'];
        $postCode =$_REQUEST['postCode'];
        $update = "UPDATE users SET firstName='$firstName', lastName='$lastName', email='$email', phoneNumber='$phoneNumber', streetName='$streetName', streetNumber='$streetNumber', city='$city', postCode='$postCode' WHERE username_id='$usernameID'";
        mysqli_query($conn, $update) or die('Error: ' . mysqli_error($conn));
        echo '<h3 class="text-center">Record Updated Successfully</h3>';
        header( "refresh:3;url=..parents.php" );
    }else {
    ?>
    <br>
    <form name="form" method="post" action="">
    <div class="form-group">
        <input type="hidden" name="updateChild" value="1" />
        <input name="id" type="hidden" value="<?php echo $row[$usernameID];?>" />

        <label>Change first name</label>
        <input class="form-control" type="text" name="firstName" size="20" maxlength="50" value="<?php echo $row['firstName']; ?>" />
    </div>
    <div class="form-group">
        <label>Change last name</label>
        <input class="form-control" type="text" name="lastName" size="20" maxlength="50" value="<?php echo $row['lastName']; ?>" />
    </div>
    <div class="form-group">
        <label>New email address</label>
        <input class="form-control" type="text" name="email" size="20" maxlength="50" value="<?php echo $row['email']; ?>" />
    </div>
    <div class="form-group">
        <label>Street Name</label>
        <input class="form-control" type="text" name="streetName" size="20" maxlength="50" value="<?php  echo $row['streetName']; ?>" />
    </div>
    <div class="form-group">
        <label>Street Number</label>
        <input class="form-control" type="text" name="streetNumber" size="20" maxlength="50" value="<?php echo $row['streetNumber'];; ?>" />
    </div>
    <div class="form-group">
        <label>City</label>
        <input class="form-control" type="text" name="city" size="20" maxlength="50" value="<?php echo $row['city']; ?>" />
    </div>
    <div class="form-group">
        <label>Postcode</label>
        <input class="form-control" type="text" name="postCode" size="20" maxlength="50" value="<?php echo $row['postCode'];  ?>" />
    </div>
    <div class="form-group">
        <label>Change phone number</label>
        <input class="form-control" type="text" name="phoneNumber" size="20" maxlength="50" value="<?php echo $row['phoneNumber']; ; ?>" />
    </div>
    <?php } ?>
    <div class="form-group">
        <input name="submit"  class="btn btn-danger" type="submit" value="Update" />
    </div>
    </form>
    <a href="parent.php">
        <button type="button" class="btn btn-warning">Back</button>
    </a>
</div>
</body>
</html>