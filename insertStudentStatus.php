<?php
include './connection/conn.php';

// session_start();
// if (!isset($_SESSION['Username']))
//   header('location: ../index.php');

// ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
include ('./include/header.php');
?>

  <style>
    .checkbox-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      display: flex;
    }

    .left,
    .right {
      flex: 1;
      margin: 10px;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
    include ('./include/sidebar.php');
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
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Insert Student Status</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>
          <hr style="margin-top: 0px;" />
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample" action="actionStudentStatus.php" method="POST">
                  <div class="form-group">
                    <?php
                    // $select_content = "SELECT * FROM tblprogram ORDER BY YearID ASC";
                    $select_content = "SELECT * FROM tblprogram ORDER BY YearID ASC, SemesterID ASC";

                    $result = mysqli_query($conn, $select_content);
                    ?>
                    <label for="exampleSelectGender"> Select Program</label>
                    <div class="col-md-14">
                      <select required class="form-control form-control-sm" name="ProgramID" id="selectID">
                        <option selected disabled> Select Program</option>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                          $YearID = $row['YearID'];
                          $SemesterID = $row['SemesterID'];
                          $ShiftID = $row['ShiftID'];
                          $DegreeID = $row['DegreeID'];
                          $AcademicYearID = $row['AcademicYearID'];
                          $MajorID = $row['MajorID'];
                          $BatchID = $row['BatchID'];
                          $CampusID = $row['CampusID'];
                          $StartDate = $row['StartDate'];
                          $EndDate = $row['EndDate'];
                          $CreatedDate = $row['CreatedDate'];
                          
                          $YearNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT YearNameEN FROM tblyear WHERE YearID = $YearID"))['YearNameEN'] ?? '';
                          $SemesterNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SemesterNameEN FROM tblSemester WHERE SemesterID = $SemesterID"))['SemesterNameEN'] ?? '';
                          $ShiftNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ShiftNameEN FROM tblShift WHERE ShiftID = $ShiftID"))['ShiftNameEN'] ?? '';
                          $DegreeNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT DegreeNameEN FROM tblDegree WHERE DegreeID = $DegreeID"))['DegreeNameEN'] ?? '';
                          $AcademicYear = mysqli_fetch_assoc(mysqli_query($conn, "SELECT AcademicYear FROM tblAcademicYear WHERE AcademicYearID = $AcademicYearID"))['AcademicYear'] ?? '';
                          $MajorNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MajorNameEN FROM tblMajor WHERE MajorID = $MajorID"))['MajorNameEN'] ?? '';
                          $BatchNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT BatchNameEN FROM tblBatch WHERE BatchID = $BatchID"))['BatchNameEN'] ?? '';
                          $CampusNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT CampusNameEN FROM tblCampus WHERE CampusID = $CampusID"))['CampusNameEN'] ?? '';
                          ?>
                          <!-- <option value="<?php echo $row["ProgramID"]; ?>" <?php echo $selected; ?>> -->
                          <option value="<?php echo $row["ProgramID"]; ?>">
                            <?php echo $MajorNameEN
                              . " [" . $DegreeNameEN . "]"
                              . "-[" . $BatchNameEN . "]"
                              . "-[" . $ShiftNameEN . "]"
                              . "-[" . $YearNameEN . "]"
                              . "-[" . $SemesterNameEN . "]"
                              . "-[" . $AcademicYear . "] "
                              . "  [Start: " . $StartDate . " "
                              . " End: " . $EndDate . " "
                              . " Created: " . $CreatedDate . "]"
                              ?>
                          </option>
                          <!-- &nbsp;<br/> -->
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Select Program</label>
                        <div class="col-sm-9">
                          <select class="form-control form-control-sm" name="SexID">
                            <option>Program</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Select Program</label>
                        <div class="col-sm-9">
                          <select class="form-control form-control-sm" name="SexID">
                            <option>Program</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Assign Date</label>
                        <div class="col-sm-9">
                          <?php $current_date = date("Y-m-d"); ?>
                          <input type="date" required name="AssignDate" value="<?php echo $current_date ?>"
                            class="form-control form-control-sm" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Note</label>
                        <div class="col-sm-9">
                          <input class="form-control form-control-sm" name="Note" id="exampleTextarea1">
                        </div>
                      </div>
                    </div>
                  </div>
                  <script>
                      $(document).ready(function () {
                        $('#selectID').on('change', function () { // Listen for change event on #selectID
                          var ProgramID = $(this).val(); // Get the selected ProgramID
                          $.ajax({
                            type: 'POST',
                            url: 'fetchStudentCurrentProgram.php',
                            data: { id: ProgramID },
                            success: function (data) {
                              $('#show').html(data); // Populate #show with options returned from fetchStudent.php
                            }
                          });
                          $.ajax({
                            type: 'POST',
                            url: 'fetchNewStudent.php', // New AJAX call for fetching old students
                            data: { id: ProgramID },
                            success: function (data) {
                              $('#oldStudents').html(data); // Populate #oldStudents with options returned from fetchOldStudents.php
                            }
                          });
                        });
                      });
                    </script>
                  <div class="row">
                    <!-- New student table -->
                    <div class="col-md-6">
                      <div class="table-responsive">
                        <label class="form-label">Select Student</label>
                        <!-- Existing code for new students table... -->
                        <table class="table table-bordered table-hover table-sm text-center">
                          <thead>
                            <tr>
                              <th> Assign</th>
                              <th>ID</th>
                              <th>Name In Latin</th>
                              <th>Name In Khmer</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody id="oldStudents">

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- Old student table -->
                    <div class="col-md-6">
                      <div class="table-responsive">
                        <label class="form-label">Student in Current Program</label>
                        <table class="table table-bordered table-hover table-sm text-center">
                          <thead>
                            <tr>
                              <th>Assign</th>
                              <th>ID</th>
                              <th>Name In Latin</th>
                              <th>Name In Khmer</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody id="show">
                            <!-- This will be populated with AJAX -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <br />
                  <button type="submit" name="btnInsert" class="btn btn-info mr-2">Save</button>
                  <a href="./indexStudentStatus.php">
                    <button type="button" name="btnCancel" class="btn btn-light">Cancel</button>
                  </a>
                </form>

              </div>
            </div>

          </div>

          <!-- <hr style="width1" /> -->
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->

</body>

</html>

<!-- <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Assign Date</label>
                        <div class="col-sm-9">
                        <?php
                        $current_date = date("Y-m-d");
                        ?>
                          <input type="date" required name="AssignDate" value="<?php echo $current_date ?>"
                            class="form-control form-control-sm" />
                        </div>
                      </div>
                    </div> -->

<!-- 
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Assign</label>
                        <div class="col-sm-9">
                          <select required class="form-control form-control-sm" name="Assigned"
                            id="exampleSelectGender">
                            <option value="1">Assigned</option>
                            <option value="0">Not Assigned</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  // Query to get YearNameEN
                          $select_year = "SELECT YearNameEN FROM tblyear WHERE YearID = $YearID";
                          $result_year = mysqli_query($conn, $select_year);
                          $YearNameEN = ($RowCon = mysqli_fetch_assoc($result_year)) ? $RowCon['YearNameEN'] : '';

                          // Query to get SemesterNameEN
                          $select_Sem = "SELECT SemesterNameEN FROM tblSemester WHERE SemesterID = $SemesterID";
                          $result_Sem = mysqli_query($conn, $select_Sem);
                          $SemesterNameEN = ($RowCon = mysqli_fetch_assoc($result_Sem)) ? $RowCon['SemesterNameEN'] : '';

                          // Query to get ShiftNameEN
                          $select_Sh = "SELECT ShiftNameEN FROM tblShift WHERE ShiftID = $ShiftID";
                          $result_Sh = mysqli_query($conn, $select_Sh);
                          $ShiftNameEN = ($RowCon = mysqli_fetch_assoc($result_Sh)) ? $RowCon['ShiftNameEN'] : '';

                          // Query to get DegreeNameEN
                          $select_Dg = "SELECT DegreeNameEN FROM tblDegree WHERE DegreeID = $DegreeID";
                          $result_Dg = mysqli_query($conn, $select_Dg);
                          $DegreeNameEN = ($RowCon = mysqli_fetch_assoc($result_Dg)) ? $RowCon['DegreeNameEN'] : '';

                          // Query to get AcademicYear
                          $select_ay = "SELECT AcademicYear FROM tblAcademicYear WHERE AcademicYearID = $AcademicYearID";
                          $result_ay = mysqli_query($conn, $select_ay);
                          $AcademicYear = ($RowCon = mysqli_fetch_assoc($result_ay)) ? $RowCon['AcademicYear'] : '';

                          // Query to get MajorNameEN
                          $select_Mj = "SELECT MajorNameEN FROM tblMajor WHERE MajorID = $MajorID";
                          $result_Mj = mysqli_query($conn, $select_Mj);
                          $MajorNameEN = ($RowCon = mysqli_fetch_assoc($result_Mj)) ? $RowCon['MajorNameEN'] : '';

                          // Query to get BatchNameEN
                          $select_Ba = "SELECT BatchNameEN FROM tblBatch WHERE BatchID = $BatchID";
                          $result_Ba = mysqli_query($conn, $select_Ba);
                          $BatchNameEN = ($RowCon = mysqli_fetch_assoc($result_Ba)) ? $RowCon['BatchNameEN'] : '';

                          // Query to get CampusNameEN
                          $select_Cp = "SELECT CampusNameEN FROM tblCampus WHERE CampusID = $CampusID";
                          $result_Cp = mysqli_query($conn, $select_Cp);
                          $CampusNameEN = ($RowCon = mysqli_fetch_assoc($result_Cp)) ? $RowCon['CampusNameEN'] : '';
                          //$selected = ($row["ProgramID"] == $ProgramID) ? "selected" : ""; -->