<?php
//session_start();
require_once ('../shared/config.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parent Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
        <h2 class="text-center"><?php
            if (isset($_SESSION['userData'])) {
                echo "Parent of: {$_SESSION['userData']['firstName']} {$_SESSION['userData']['lastName']}";
            } ?></h2>
        <h3 class="text-center">Squad Name</h3>
        <ul class="list-group">
            <li class="list-group-item"><a href="editChildDetails.php">Edit your child's personal details</a></li>
            <li class="list-group-item"><a href="childSwimmingPerformance.php">Swimmer performance</a></li>
            <li class="list-group-item"><a href="../shared/officialRaceResults.php">Official Race Performance</a></li>
        </ul>
        <a href="../logout.php">
            <button type="button" class="btn btn-warning">Log out</button>
        </a>
    </div>
    </div>
</div>

</body>
</html>