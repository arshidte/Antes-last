<?php

if(isset($_POST['submit'])){

    $username = $_POST["username"];
    $userpwd = $_POST["userpwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $userpwd) !== false){
        header("Location: ../admin.php?error=emptyinput");
        exit();
    }

    loginAdmin($conn, $username, $userpwd);
}
else {
    header("Location: ../admin.php");
    exit();
}