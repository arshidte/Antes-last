<?php 
session_start();
if(isset($_SESSION["username"])){
  header("Location: ./admin-dashboard.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Antes</title>
        <!--Animation-->
        <link rel="stylesheet" href="../assets/css/base.css">
        <!--Animation-->
        <link rel="stylesheet" href="../assets/css/style.css">
    
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet" />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" defer data-deferred="1"></script>
        <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet">
    
        <!--Animation-->
    
        <script>
            document.documentElement.className = "js";
            var supportsCssVars = function() {
                var e, t = document.createElement("style");
                return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e
            };
            supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
        </script>
        <!--Animation-->
    </head>
<body>
    <!-- header section starts here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/images/logo.svg" alt="logo" class="logo" /></a>

            <span class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-transparent"></span>
            </span>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav mr-auto w-100 justify-content-end nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-12 col-md-6 d-flex flex-column">
                <h3>Login - Admin</h3>
                <hr>
                <div style="background: #002D5D; padding: 25px;" class="rounded">
                    <form style="color: white;" action="Includes/login.inc.php" method="post">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Username</label>
                          <input type="text" name="username" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" name="userpwd" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                      </form>

                      <?php
                      if(isset($_GET["error"])) {
                          if($_GET["error"] == "emptyinput") {
                              echo "<h5 class='text-danger mt-3'>Fill in all the fields!</h5>";
                          }
                          else if($_GET["error"] == "wronglogin") {
                              echo "<h5 class='text-danger mt-3'>Incorrect login information!</h5>";
                          }
                      }
                       ?>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/index.js"></script>


        <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js " integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF " crossorigin="anonymous "></script>


        <!--Animation scripts-->
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/charming.min.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="assets/js/demo.js"></script>
        <!--Animation scripts-->
</body>
</html>