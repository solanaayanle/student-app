<?php ?><?php  require_once ('../shared/config.php'); ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coach</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
        <h2 class="text-center"><?php
            if (isset($_SESSION['userData'])) {
                echo "Hello, {$_SESSION['userData']['coachName']} (Coach)";
            } ?></h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="viewSquad.php">View Squad</a></li>
        </ul>
        <br>
        <a href="coachLogIn.php">
            <button type="button" class="btn btn-warning">Log out</button>
        </a>
    </div>
</div>
</body>
</html>