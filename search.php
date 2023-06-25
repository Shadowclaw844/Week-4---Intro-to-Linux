<?php
session_start();
require_once "config.php";
error_reporting(E_ERROR | E_PARSE);
?>

<html>
<head>
    <style>
        .searchHelper {
            color:white;
            text-align:center;
            margin: 0 auto;
            font-size: 30px;
        }
        
        .noResults {
            color:white;
        }

    </style>
    <title>Week 4 Box 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="d-block px-3 py-2 text-center text-bold text-white bg-danger old-bv">As we migrate databases, some functionality may be broken</div>
    <!-- include fixed-dark if broken below -->
    <nav class="navbar navbar-dark bg-dark">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Login<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </nav>

    <br><br>
    <p class="searchHelper text-dark">Search for faculty here</p>

    <form action="search.php" method="get">
    <div class="input-group mb-3" style="width:500px;margin:0 auto;">
        
        <input name="q" type="text" class="form-control" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
        </div>
        
    </div>
    </form>
    <div class="cardList">
        <?php
        //if there's a query being searched already [patched null searches displaying secrets]

        if(isset($_GET["q"])) {
            $searchQuery = $_GET["q"];
            if($_GET["q"] == "") {
                $sql = "SELECT * FROM faculty WHERE id > 1000";
            }
            else{
                $sql = "SELECT * FROM faculty WHERE (`name` LIKE '%".$searchQuery."%') OR (`id` LIKE '%".$searchQuery."%')";
            }
        } else {
            $sql = "SELECT * FROM faculty WHERE id > 0";
        }
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $user_query = "SELECT username FROM userdata WHERE id = " . $row["id"];
                $user_result = $link->query($user_query)->fetch_assoc();
                echo "
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $row["name"] . "</h5>
                        <p class='card-text'>Email: " . $row["email"] . "</p>
                    </div>
                </div>";
            }
        } else {
            echo "<h1 class='noResults text-dark text-center'>0 results</h1>";
        }
        ?>
    </div>

</body>

</html>