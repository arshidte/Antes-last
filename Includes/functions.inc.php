<?php

function emptyInputLogin($username, $userpwd) {
    
    if(empty($username) || empty($userpwd)){
        // If there is a mistake, result returns as true.
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function adminExists($conn, $username, $userpwd) {
    $sql = "SELECT * FROM admin WHERE username = ? OR useremail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../admin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $userpwd);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginAdmin($conn, $username, $userpwd) {
    $adminExists = adminExists($conn, $username, $username);

    if($adminExists === false) {
        header("Location: ../admin.php?error=wronglogin");
        exit();
    }

    $dBpwd = $adminExists["userpwd"];

    if($userpwd !== $dBpwd) {
        header("Location: ../admin.php?error=wronglogin");
        exit();
    }else{
        session_start();
        $_SESSION["id"] = $adminExists["id"];
        $_SESSION["username"] = $adminExists["username"];
        header("Location: ../admin-dashboard.php");
        exit();
    }
}