<?php 
include_once "./Includes/dbh.inc.php";
if(isset($_POST['deleteData'])) {
    $gallery_id = $_POST['delete_id'];

    $check_img_query = "SELECT imgName FROM gallery WHERE UID='$gallery_id'";
    // $img_res = mysqli_query($conn, $check_img_query);
    // $res_data = mysqli_fetch_array($img_res);

    

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $check_img_query)){
        echo "SQL statement failed.";
    }else{
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
            
        while($row = mysqli_fetch_assoc($result)){
            // echo "<pre>";
            // echo $row['imgName'];
            if(file_exists('gallery/'.$row['imgName'])){
                unlink('gallery/'.$row['imgName']);
            }
        } 
    }

        $query = "DELETE FROM gallery WHERE UID='$gallery_id'";
        $query_run = mysqli_query($conn, $query);

    if($query_run){
        header('Location: admin-dashboard-gallery.php?res=deletedsuccessfully');
    }else{
        header('Location: admin-dashboard-gallery.php?res=erroroccured');
    }

    


    // $image = $res_data['imgName'];


    

        

        
    // }else{
        
    // }
}
?>