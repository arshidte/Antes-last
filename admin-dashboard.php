<?php 
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ./admin.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antes | Dashboard</title>
    <!--Animation-->
    <link rel="stylesheet" href="assets/css/base.css">
    <!--Animation-->
    <link rel="stylesheet" href="assets/css/style.css">


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

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container">
          <a class="navbar-brand" href="#"><img src="assets/images/logo.svg" alt="logo" class="logo" /></a>

          <span class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon bg-transparent"></span>
          </span>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <ul class="navbar-nav mr-auto w-100 justify-content-end nav-pills">
                  <li class="nav-item">
                      <a class="nav-link" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="admin-dashboard-gallery.php">Manage Gallery</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="admin-dashboard-blogs.php">Manage Blogs</a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="admin-dashboard-changepw.php">Change password</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="Includes/logout.inc.php">Logout</a>
                  </li>
              </ul>
          </div>
      </div>
    </nav>

  <div class="container">
    <div class="row" style="height: 100vh;">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <img class="img-fluid" src="assets/images/Antes-logo-big.svg" alt="">
      </div>
    </div>
  </div>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>