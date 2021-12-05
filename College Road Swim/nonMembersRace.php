<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Official Race Performance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<h1 class="text-center">Official Race Performance</h1>
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter by
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Age group ascending</a>
                <a class="dropdown-item" href="#">Speed</a>
                <a class="dropdown-item" href="#">Distance ascending</a>
            </div>
        </div>
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

    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Swimmer Name</th>
                <th scope="col">Squad</th>
                <th scope="col">Age Group</th>
                <th scope="col">Race</th>
                <th scope="col">Meters</th>
                <th scope="col">Time</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Mark</td>
                <td>blue whales</td>
                <td>child</td>
                <td>butterfly</td>
                <td>200m</td>
                <td>28.9</td>
                <td>01/02/2013</td>
            </tr>
            <tr>
                <td>Mark</td>
                <td>blue whales</td>
                <td>child</td>
                <td>butterfly</td>
                <td>200m</td>
                <td>28.9</td>
                <td>01/02/2013</td>
            </tr>
            <tr>
                <td>luck</td>
                <td>yellow whales</td>
                <td>adult</td>
                <td>butterfly</td>
                <td>200m</td>
                <td>28.9</td>
                <td>01/02/2013</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>