<?php

if(isset($_POST['addPost'])){

    $title = $_POST["blogtitle"];
    $blog = $_POST["blogdesc"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($title, $blog) !== false){
        header("Location: ../admin-add-to-blog.php?status=emptyinput");
        exit();
    }


    $query = "INSERT INTO blogs (title, blog) VALUES ('$title', '$blog')";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        header("Location: ../admin-add-to-blog.php?status=success");
        exit();
    }else{
        header("Location: ../admin-add-to-blog.php?status=error");
        exit();
    }

}
else {
    header("Location: ../admin-add-to-blog.php");
    exit();
}
