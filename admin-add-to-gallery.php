<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Antes | Add to Gallery</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container">
          <a class="navbar-brand" href="#"><img src="assets/images/logo.svg" alt="logo" class="logo" /></a>

          <span class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon bg-transparent"></span>
          </span>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <ul class="navbar-nav mr-auto w-100 justify-content-end nav-pills">
                  <li class="nav-item">
                      <a class="nav-link" href="Includes/logout.inc.php">Logout</a>
                  </li>
              </ul>
          </div>
      </div>
    </nav>

    <div class="container">
        <h2 class="text-center" style="margin-top: 100px">Add to Gallery</h2>
        <div class="row d-flex flex-column align-items-center mx-3">
            <div class="col-12 col-lg-6">
                <form class="row g-3" action="gallery-upload.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleFormControldate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="Date"  name="date">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Location" name="location">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlLocation" class="form-label">Tiny description</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Tiny description" name="description"></input>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlLocation" class="form-label">Upload images</label>
                        <p>You can select multiple images. &#40;Upto 5 is recommended.&#41;</p>
                        <input type="file" class="form-control" id="exampleFormControlInput5" name="file[]" multiple>
                    </div>
                    <?php 
                    if(isset($_GET["upload"])) {
                        if($_GET["upload"] == "only5") {
                            echo "<h5 class='text-danger mt-3'>Upload atleast 5 files!</h5>";
                        }
                        else if($_GET["upload"] == "empty") {
                            echo "<h5 class='text-danger mt-3'>Fields cannot be empty!</h5>";
                        }
                        else if($_GET["upload"] == "bigsizefile") {
                            echo "<h5 class='text-danger mt-3'>File size is too big! Try to upload files below 4MB.</h5>";
                        }
                        else if($_GET["upload"] == "erroroccured") {
                            echo "<h5 class='text-danger mt-3'>An error occured while uploading. Try again!</h5>";
                        }
                        else if($_GET["upload"] == "wrongfiletype") {
                            echo "<h5 class='text-danger mt-3'>Only jpg/jpeg/png files supported.</h5>";
                        }
                        else if($_GET["upload"] == "success") {
                            echo "<h5 class='text-success mt-3'>Uploaded successfully.</h5>";
                        }
                    }
                     ?>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>