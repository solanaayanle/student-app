<?php
require_once('../../shared/config.php');
$id=$_GET['id'];
$query = "DELETE FROM users WHERE username_id='$id'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
echo '<h3>Record deleted successfully</h3>';
header("refresh:3;url=viewMembers.php");
?>