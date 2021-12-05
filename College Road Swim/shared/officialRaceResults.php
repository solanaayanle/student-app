<?php
require_once('config.php');
$query = "SELECT * FROM finalrace";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Official Race Performance</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1 class="text-center">Official Race Performance</h1>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <div class="form-group">
        <form method="GET" action="">
            <input type="text" name="searchMembers" class="form-control" placeholder="Search">
            <input type="submit" class="form-control" value="Search">
        </form>
 <div class="container">
     <div class="row">
                <div class="col-sm">
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter by
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="officialRaceResults.php?filter=date">Date Added</a>
                        <a class="dropdown-item" href="officialRaceResults.php?filter=speed">Speed</a>
                        <a class="dropdown-item" href="officialRaceResults.php?filter=distance">Distance ascending</a>
                    </div>
                </div>
                </div>

                <div class="col-sm">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Sort by
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Alphabetically</a>
                            <a class="dropdown-item" href="#">Date of race</a>
                        </div>
                    </div>
                </div>
         <div class="col-sm"><a href="../index.php"> </div>

             <button type="button" class="btn btn-warning">Back</button>
         </a>

        </div>
        </div>


    </div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Squad</th>
                    <th scope="col">Swimmer Name</th>
                    <th scope="col">Age Group</th>
                    <th scope="col">Race</th>
                    <th scope="col">Meters</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tbody>
                <tr>
                    <td><?php
                        $squadID = $row['squad_id'];
                        $query3 = "SELECT * FROM squad WHERE squad_id ='$squadID' ";
                        $result4 = mysqli_query($conn, $query3) or die ( mysqli_error());
                        $row5 = mysqli_fetch_assoc($result4);

                        echo $row5['squad_name']; ?></td>
                    <td><?php
                        $usernameID = $row['username_id'];
                        $query5 = "SELECT * FROM users WHERE username_id ='$usernameID'";
                        $result5 = mysqli_query($conn, $query5) or die ( mysqli_error());
                        $row6 = mysqli_fetch_assoc($result5);

                        echo $row6['firstName']." ".$row6['lastName'];?></td>
                    <td><?php echo $row6['userType'];?></td>

                    <td><?php echo $row['finalRace'];?></td>
                    <td><?php echo $row['finalMeters']; ?></td>
                    <td><?php echo $row['finalTime'];?></td>
                    <td><?php echo $row['finalDateOfRace'];?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

</div>
</div>

</body>
</html>