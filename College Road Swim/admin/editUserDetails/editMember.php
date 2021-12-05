<?php  require_once('../../shared/config.php');
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE username_id='$id'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>;
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <h1 class="text-center">Update User</h1>
    <?php
    if(isset($_POST['addNewMember']) && $_POST['addNewMember']==1)
    {
        $id = $_GET['id'];
        $firstName =$_REQUEST['firstName'];
        $lastName =$_REQUEST['lastName'];
        $email =$_REQUEST['email'];
        $dateOfBirth =$_REQUEST['dateOfBirth'];
        $phoneNumber =$_REQUEST['phoneNumber'];
        $streetName =$_REQUEST['streetName'];
        $streetNumber =$_REQUEST['streetNumber'];
        $city =$_REQUEST['city'];
        $postCode =$_REQUEST['postCode'];
        $password =$_REQUEST['password'];
        $update = "UPDATE registration.users SET firstName='$firstName', lastName='$lastName', email='$email', dateOfBirth='$dateOfBirth', phoneNumber='$phoneNumber', streetName='$streetName', streetNumber='$streetNumber', city='$city', postCode='$postCode', password='$password' WHERE username_id='$id'";
        mysqli_query($conn, $update) or die('Error: ' . mysqli_error($conn));
        echo '<h3 class="text-center">Record Updated Successfully</h3>';
        header( "refresh:3;url=../editUserDetails/viewMembers.php" );
    }else {
    ?>
<div>
    <form name="form" method="post" action="">
        <input type="hidden" name="addNewMember" value="1" />
        <input name="id" type="hidden" value="<?php echo $row[$id];?>" />
        <div class="form-group">
            <label>Change first name</label>
            <input class="form-control" type="text" name="firstName" size="20" maxlength="50" value="<?php echo $row['firstName'];?>" />
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
            <label>Date of Birth</label>
            <input class="form-control" type="date" name="dateOfBirth" size="20" maxlength="50" value="<?php echo $row['dateOfBirth']; ?>" />
        </div>
        <div class="form-group">
            <label>Change phone number</label>
            <input class="form-control" type="number" name="phoneNumber" size="20" maxlength="50" value="<?php echo $row['phoneNumber']; ?>" />
        </div>
        <div class="form-group">
            <label>Street Name</label>
            <input class="form-control" type="text" name="streetName" size="20" maxlength="50" value="<?php echo $row['streetName']; ?>" />
        </div>
        <div class="form-group">
            <label>Street Number</label>
            <input class="form-control" type="text" name="streetNumber" size="20" maxlength="50" value="<?php echo $row['streetNumber']; ?>" />
        </div>
        <div class="form-group">
            <label>City</label>
            <input class="form-control" type="text" name="city" size="20" maxlength="50" value="<?php echo $row['city']; ?>" />
        </div>
        <div class="form-group">
            <label>Postcode</label>
            <input class="form-control" type="text" name="postCode" size="20" maxlength="50" value="<?php echo $row['postCode']; ?>" />
        </div>
        <div class="form-group">
            <label>Change password</label>
            <input class="form-control" type="password" name="password" size="20" maxlength="50" />
        </div>
        <?php } ?>
        <div class="form-group">
            <input name="submit"  class="btn btn-danger" type="submit" value="Update" />
        </div>
    </form>

</div>

</div>
</body>
</html>