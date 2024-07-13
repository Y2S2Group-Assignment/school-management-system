<!DOCTYPE html>
<html lang="en">

<?php
require('function.php');
include ('./include/header.php');
?>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <?php
    include ('./include/sidebar.php');
    ?>

      <?php
        include_once ("./connection/conn.php");

        if (isset($_GET['edit_user'])) {
          $edit = $_GET['edit_user'];
          $query = "SELECT * FROM tbluser WHERE id = $edit ";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
        }
      ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <?php
      include ('./include/nav.php');
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Lecturer Form</h4>
                 
                  <form class="form-sample" action="action.php" method="POST">
                    <p class="card-description">
                      Leturer Information
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                        <input type="hidden" name="id"
                            value="<?php echo isset($row['id']) ? $row['id'] : '' ?>">

                            <div class="col-sm-12">
                            <label for="exampleInputUsername1">Full Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"name="fullname"
                              placeholder="Full Name"value="<?php echo isset($row['fullname']) ? $row['fullname'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Email</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"name="email"
                              placeholder="Email"value="<?php echo isset($row['email']) ? $row['email'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">UserName</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"name="username"
                              placeholder="UserName"value="<?php echo isset($row['username']) ? $row['username'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Password</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"name="password"
                              placeholder="Password"value="<?php echo isset($row['password']) ? $row['password'] : '' ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    

                    <a href="lecturer.php"><button type="button" class="btn btn-danger">
                        Cancel
                      </button>
                    </a>
                    <button type="submit" class="btn btn-primary" name="c_lecturer">
                      Submit
                    </button>
                   
                  </form>
                </div>
              </div>
            </div>
          </div>


       
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:./partials/_footer.html -->
      <footer class="footer">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com
                2020</span>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a
                  href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                  href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from
                Bootstrapdash.com</span>
            </div>
          </div>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


</body>

</html>