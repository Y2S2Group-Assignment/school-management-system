<!DOCTYPE html>
<html lang="en">

<?php
include ('./include/header.php');
?>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <?php
    include ('./include/sidebar.php');
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <?php
      include ('./include/nav.php');
      ?>

      <?php
      include_once ("./connection/conn.php");

      if (isset($_GET['edit_faculty'])) {
        $edit = $_GET['edit_faculty'];
        $query = "SELECT * FROM tblfaculty WHERE FacultyID = $edit ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
      }
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Faculty Form</h4>
                  <form class="form-sample pt-3" method="POST" action="action.php" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <input type="hidden" name="FacultyID"
                            value="<?php echo isset($row['FacultyID']) ? $row['FacultyID'] : '' ?>">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Faculty Name KH</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              name="FacultyKH" placeholder="Faculty KH"
                              value="<?php echo isset($row['FacultyKH']) ? $row['FacultyKH'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Faculty Name EN</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              name="FacultyEN" placeholder="Faculty EN"
                              value="<?php echo isset($row['FacultyEN']) ? $row['FacultyEN'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                          <label for="exampleInputUsername1">DateTime</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1" placeholder="Username">
                          </div>
                        </div>
                      </div> -->
                    </div>


                    <a href="faculty.php">
                      <button type="button" class="btn btn-danger">Cancel</button>
                    </a>

                    <button type="submit" class="btn btn-primary" name="c_faculty">Submit</button>



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