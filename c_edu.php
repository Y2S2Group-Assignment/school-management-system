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

        if (isset($_GET['edit_edu'])) {
          $edit = $_GET['edit_edu'];
          $query = "SELECT * FROM tbleducationalbackground WHERE StudentID = $edit ";
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
                  <h4 class="card-title">Student Education Form</h4>
                 
                  <form class="form-sample" action="action.php" method="POST">
                    <p class="card-description">
                      Education Information
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                        <input type="hidden" name="EducationalBackgroundID"
                            value="<?php echo isset($row['EducationalBackgroundID']) ? $row['EducationalBackgroundID'] : '' ?>">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">School Type</label>
                              <select class="form-control border border-primary " name="SchoolTypeID" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled value="">Please Select</option>
                                    <?php

                                      $select_mainmenu = "SELECT * FROM tblschooltype";
                                      $resultMain = mysqli_query($conn, $select_mainmenu);

                                      while ($Main_row = mysqli_fetch_array($resultMain)) {
                                          $selected = ($Main_row['SchoolTypeID'] == $row['SchoolTypeID']) ?
                                              'selected' : '';
                                          echo "<option value='" . $Main_row['SchoolTypeID'] . " ' $selected>" .
                                              $Main_row['SchoolTypeEN'] . "</option>";
                                      }
                                      ;
                                    ?>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">School Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"name="NameSchool"
                              placeholder="School Name"value="<?php echo isset($row['NameSchool']) ? $row['NameSchool'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Academic Year</label>
                              <select class="form-control border border-primary " name="AcademicYearID" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled value="">Please Select</option>
                                    <?php

                                      $select_mainmenu = "SELECT * FROM tblacademicyear";
                                      $resultMain = mysqli_query($conn, $select_mainmenu);

                                      while ($Main_row = mysqli_fetch_array($resultMain)) {
                                          $selected = ($Main_row['AcademicYearID'] == $row['AcademicYearID']) ?
                                              'selected' : '';
                                          echo "<option value='" . $Main_row['AcademicYearID'] . " ' $selected>" .
                                              $Main_row['AcademicYear'] . "</option>";
                                      }
                                      ;
                                    ?>
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Province</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"name="Province"
                              placeholder="Province" value="<?php echo isset($row['Province']) ? $row['Province'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                        

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Student</label>
                              <select class="form-control border border-primary " name="StudentID" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled value="">Please Select</option>
                                    <?php

                                      $select_mainmenu = "SELECT * FROM tblstudentinfo";
                                      $resultMain = mysqli_query($conn, $select_mainmenu);

                                      while ($Main_row = mysqli_fetch_array($resultMain)) {
                                          $selected = ($Main_row['StudentID'] == $row['StudentID']) ?
                                              'selected' : '';
                                          echo "<option value='" . $Main_row['StudentID'] . " ' $selected>" .
                                              $Main_row['NameInLatin'] . "</option>";
                                      }
                                      ;
                                    ?>
                              </select>
                          </div>
                        </div>
                      </div>

                    </div>

                    <a href="educationList.php"><button type="button" class="btn btn-danger">
                        Cancel
                      </button>
                    </a>
                    <button type="submit" class="btn btn-primary" name="c_edu">
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