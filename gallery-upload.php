<?php 

if(isset($_POST['update-gallery'])) {

    $gallery_id = $_POST['gallery_id'];
    $title = $_POST['title'];
    $newFileName = $_POST['title'];
    if(empty($newFileName)){
        $newFileName = 'product-gallery';
    }else{
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    $date = $_POST['date'];
    $location = $_POST['location'];
    $file = $_FILES['file'];
    $old_file = $_POST['old_file'];


    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];


    if($fileName !== '') {
        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array("jpg", "jpeg", "png");

        if($fileError === 0){
            if($fileSize < 5000000){
                $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "./gallery/" . $imageFullName;
            }else{
                // echo "File size is too big. You can upload files upto 5MB";
                header("Location: ./admin-add-to-gallery.php?upload=bigsizefile");
                exit();
            }
        }else{
            // echo "An error occured while uploading. Try again.";
            header("Location: ./admin-edit-gallery.php?upload=erroroccured");
            exit();
        }

    }else{
        $imageFullName = $old_file;
    }

    include_once "./Includes/dbh.inc.php";

    $query = "UPDATE gallery SET title='$title', date='$date', location='$location', imgName='$imageFullName' WHERE id='$gallery_id' ";
    
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        if($fileName !== '') {
            move_uploaded_file($fileTempName, $fileDestination);
        }
        header("Location: ./admin-dashboard-gallery.php?upload=success");
        exit();
    }
}

if (isset($_POST['submit'])) {
    
    $title = $_POST['title'];
    
    $newFileName = 'product-gallery';

    $date = $_POST['date'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $file = $_FILES['file'];

    // echo "<pre>";
    // print_r($file);
    // exit();

    $fileName = $file["name"];

    

    include_once "./Includes/dbh.inc.php";
    // Generating an unique ID for the perticular upload
    $UID = $newFileName . "." . uniqid("", true);

    $fileCount = count($file['name']);
    if($fileCount>5 || $fileCount<5){
        header("Location: ./admin-add-to-gallery.php?upload=only5");
        exit();
    }
    for($i=0;$i<$fileCount;$i++){

            $fileName = $file["name"][$i];
            $fileTempName = $file["tmp_name"][$i];
            $fileError = $file["error"][$i];
            $fileSize = $file["size"][$i];

            $imgExt = pathinfo($fileName, PATHINFO_EXTENSION);
            
            
            $imgExtLower = strtolower($imgExt);

            $allowed = array("jpg", "jpeg", "png");

            if(in_array($imgExtLower, $allowed)){
                if($fileError===0){
                    if($fileSize<5000000){
                        //Now check for the errors while uploading
                        if(empty($newFileName) || empty($date) || empty($location) || empty($description)){
                            header("Location: ./admin-add-to-gallery.php?upload=empty");
                            exit();
                        }else{
    
                            $imageFullName = $newFileName . "." . uniqid("", false) . "." . $imgExtLower;
                            $fileDestination = './gallery/'.$imageFullName;
                            
                            $sql = "INSERT INTO gallery (UID, title, date, location, description, imgName) VALUES (?, ?, ?, ?, ?, ?);";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$UID, $title, $date, $location, $description, $imageFullName]);

                            move_uploaded_file($fileTempName, $fileDestination);

                            header("Location: ./admin-add-to-gallery.php?upload=success");

                        }
                    }else{
                        // echo "File size is too big. You can upload files upto 5MB";
                        header("Location: ./admin-add-to-gallery.php?upload=bigsizefile");
                        exit();
                    }
                }else{
                    // echo "An error occured while uploading. Try again.";
                    header("Location: ./admin-add-to-gallery.php?upload=erroroccured");
                    exit();
                }
            }else{
                // echo "This file type is not supported. Upload jpg/jpeg/png";
                header("Location: ./admin-add-to-gallery.php?upload=wrongfiletype");
                exit();
            }
        
    }

}
