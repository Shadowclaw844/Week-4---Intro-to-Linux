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
    <title>Chisel & Bits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="d-block px-3 py-2 text-center text-bold text-white bg-danger old-bv">As we migrate databases, some functionality may be broken</div>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand ml-auto text-center" href="index.php">Chisel & Bits</a>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Login<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </nav>
    <br></br>
    <center><img src="images/construction.gif" class=""></img></center>
    <div>
        <p></p>
        <form action="search.php" method="get">
        <div class="input-group mb-3" style="width:500px;margin:0 auto;">
            
            <input name="q" type="text" class="form-control" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
            </div>
            
        </div>

        <h4><center>Search for tools by name or ID</center></h4>

        </form>
    </div>

</body>

</html>