<?php 

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_POST['updatepw'])){
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $r_password = mysqli_real_escape_string($conn, $_POST['r_password']);

    if(!empty($password) || !empty($r_password)) {
        if($password === $r_password) {
            $update_password = "UPDATE admin SET userpwd='$password' WHERE useremail='info@antes.com' LIMIT 1";
            $update_password_run = mysqli_query($conn, $update_password);

            if($update_password_run) {
                header("Location: ../admin-dashboard-changepw.php?msg=updatesuccess");
                exit();
            }else{
            header("Location: ../admin-dashboard-changepw.php?msg=wentwrong");
            exit();
        }

        }else{
            header("Location: ../admin-dashboard-changepw.php?msg=notmatch");
            exit();
        }
    }else{
        header("Location: ../admin-dashboard-changepw.php?msg=emptyfield");
        exit();
    }
}