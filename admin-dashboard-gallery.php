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

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- For pagination -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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

  <!-- Popup modal for delete confirmation starts here-->

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirm delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="admin-delete-gallery.php" method="post">
      <div class="modal-body">

        <input type="hidden" name="delete_id" id="delete_id">

        Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="deleteData" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>

  <!-- Popup modal for delete confirmation ends here-->

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container">
          <a class="navbar-brand" href="#"><img src="assets/images/logo.svg" alt="logo" class="logo" /></a>

          <span class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon bg-transparent"></span>
          </span>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav mr-auto w-100 justify-content-end nav-pills">
                  <li class="nav-item">
                      <a class="nav-link" href="admin-dashboard.php">Home</a>
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
      <div class="text-end" style="margin-top: 100px;">
        <button type="button" class="btn btn-success px-5 mb-5"><a href="./admin-add-to-gallery.php" class="text-decoration-none text-white">Add to Gallery</a></button>
      </div>
     <?php 
     if(isset($_GET["res"])) {
      if($_GET["res"] == "deletedsuccessfully") {
          echo "<h5 class='text-success mt-3'>Deleted successfully</h5>";
      }
      else if($_GET["res"] == "erroroccured") {
          echo "<h5 class='text-danger mt-3'>An error occured. Try again!</h5>";
      }
    }
      ?>
    <table id="tableId" class="table">
      <thead>
    <tr>
      <th></th>
      <th class="d-none" scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
      <th scope="col">Place</th>
      <th scope="col">Photo</th>
      <th scope="col">Delete</th>
    </tr>
      </thead>
      <tbody>
    <?php 
    include_once './Includes/dbh.inc.php';

    // $sql = "SELECT * FROM gallery ORDER BY id DESC";
    $sql = "SELECT * FROM gallery GROUP BY UID HAVING COUNT(UID)>1";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statement failed.";
    }else{
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td></td>
            <td class='d-none'>".$row['UID']."</td>
            <td>".$row['title']."</td>
            <td>".$row['date']."</td>
            <td>".$row['location']."</td>
            <td><img style='width: 40px' src='gallery/".$row['imgName']."'></td>
            <td>
            <button class='btn btn-danger deleteBtn'>Delete <i class='fa-solid fa-trash' style='font-size: 100%;'></i></button>
            </td>
          </tr>";
        }
    }
     ?>
      </tbody>
    </table>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    <!-- Script for pagination -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
      $(document).ready(function () {
      $('#tableId').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });
    });
    </script>
    <!-- Script for pagination end here-->

    <script>
      $(document).ready(function () {
        
        $('.deleteBtn').on('click', function() {
          $('#deleteModal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function() {
            return $(this).text();
          }).get();

          $('#delete_id').val(data[1]);

        })
      })
    </script>
  </body>
</html>
