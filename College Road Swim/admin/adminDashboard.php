<?php  require_once ('../shared/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
        <h2 class="text-center"><?php
            if (isset($_SESSION['userData'])) {
                echo "Hello, {$_SESSION['userData']['adminUsername']} (Admin)";
            } ?></h2>
        <ul class="list-group">
            <li class="list-group-item">
                    <div class="dropdown">
                            <div id="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="addUsers/addAdminUser.php">Add admin user</a>
                                <a class="dropdown-item" href="addUsers/addCoach.php">Add coach user</a>
                                <a class="dropdown-item" href="addUsers/addMemberUser.php">Add member</a>
                            </div>
                        </div>
            </li>
            <li class="list-group-item">
                    <div class="dropdown">
                            <div id="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="editUserDetails/viewAdminUsers.php">View/Edit admin user</a>
                                <a class="dropdown-item" href="editUserDetails/viewCoach.php">View/Edit coach</a>
                                <a class="dropdown-item" href="editUserDetails/viewMembers.php">View/Edit member</a>
                                <a class="dropdown-item" href="editUserDetails/viewSquad.php">View Squad</a>
                            </div>
                        </div></li>
            <li class="list-group-item"><a href="editFinalRace.php">Edit Official Race Performance</a></li>
            <li class="list-group-item"><a href="validateFinalRace.php">Validate Official Race Performance</a></li>
        </ul>
        <br>
        <a href="adminLogin.php">
            <button type="button" class="btn btn-warning">Log out</button>
        </a>
    </div>
</div>
</body>
</html>