<!DOCTYPE html>
<html lang="en">

<?php
require ('function.php');
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

    if (isset($_GET['edit_status'])) {
      $edit = $_GET['edit_status'];
      $query = "SELECT * FROM tblstudentstatus WHERE StudentStatusID = $edit ";
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
                          <input type="hidden" name="StudentStatusID"
                            value="<?php echo isset($row['StudentStatusID']) ? $row['StudentStatusID'] : '' ?>">

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
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Program</label>
                            <select class="form-control border border-primary " name="ProgramID" id="floatingSelect"
                              aria-label="Floating label select example">
                              <option selected disabled value="">Please Select</option>
                             
                              <?php
                              // Fetch all programs
                              $select_mainmenu = "SELECT * FROM tblprogram";
                              $resultMain = mysqli_query($conn, $select_mainmenu);

                              while ($Main_row = mysqli_fetch_array($resultMain)) {
                                $ProgramID = $Main_row['ProgramID'];

                                // Fetch the corresponding YearEN for each program
                                $YearID = $Main_row['YearID'];
                                // $YearEN = "";
                                $SemesterID = $Main_row['SemesterID'];
                                $ShiftID = $Main_row['ShiftID'];
                                $DegreeID = $Main_row['DegreeID'];
                                $AcademicYearID = $Main_row['AcademicYearID'];
                                $MajorID = $Main_row['MajorID'];
                                $BatchID = $Main_row['BatchID'];
                                $CampusID = $Main_row['CampusID'];

                                if (isset($YearID)) {
                                  $subselect_menu1 = "SELECT * FROM tblyear WHERE YearID = $YearID";
                                  $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                  if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                    $YearEN = $row_subdata1['YearEN'];
                                  }
                                }
                                
                                if (isset($SemesterID)) {
                                  $subselect_menu2 = "SELECT * FROM tblsemester WHERE SemesterID = $SemesterID";
                                  $subresultMenu2 = mysqli_query($conn, $subselect_menu2);
                                  if ($row_subdata2 = mysqli_fetch_assoc($subresultMenu2)) {
                                    $SemesterEN = $row_subdata2['SemesterEN'];
                                  }
                                }
                                if (isset($ShiftID)) {
                                  $subselect_menu3 = "SELECT * FROM tblshift WHERE ShiftID = $ShiftID";
                                  $subresultMenu3 = mysqli_query($conn, $subselect_menu3);
                                  if ($row_subdata3 = mysqli_fetch_assoc($subresultMenu3)) {
                                    $ShiftEN = $row_subdata3['ShiftEN'];
                                  }
                                }
                                if (isset($DegreeID)) {
                                  $subselect_menu4 = "SELECT * FROM tbldegree WHERE DegreeID = $DegreeID";
                                  $subresultMenu4 = mysqli_query($conn, $subselect_menu4);
                                  if ($row_subdata4 = mysqli_fetch_assoc($subresultMenu4)) {
                                    $DegreeNameEN = $row_subdata4['DegreeNameEN'];
                                  }
                                }
                                if (isset($AcademicYearID)) {
                                  $subselect_menu5 = "SELECT * FROM tblacademicyear WHERE AcademicYearID = $AcademicYearID";
                                  $subresultMenu5 = mysqli_query($conn, $subselect_menu5);
                                  if ($row_subdata5 = mysqli_fetch_assoc($subresultMenu5)) {
                                    $AcademicYear = $row_subdata5['AcademicYear'];
                                  }
                                }
                                if (isset($MajorID)) {
                                  $subselect_menu6 = "SELECT * FROM tblmajor WHERE MajorID = $MajorID";
                                  $subresultMenu6 = mysqli_query($conn, $subselect_menu6);
                                  if ($row_subdata6 = mysqli_fetch_assoc($subresultMenu6)) {
                                    $MajorEN = $row_subdata6['MajorEN'];
                                  }
                                }
                                if (isset($BatchID)) {
                                  $subselect_menu7 = "SELECT * FROM tblbatch WHERE BatchID = $BatchID";
                                  $subresultMenu7 = mysqli_query($conn, $subselect_menu7);
                                  if ($row_subdata7 = mysqli_fetch_assoc($subresultMenu7)) {
                                    $BatchEN = $row_subdata7['BatchEN'];
                                  }
                                }
                                if (isset($CampusID)) {
                                  $subselect_menu8 = "SELECT * FROM tblcampus WHERE CampusID = $CampusID";
                                  $subresultMenu8 = mysqli_query($conn, $subselect_menu8);
                                  if ($row_subdata8 = mysqli_fetch_assoc($subresultMenu8)) {
                                    $CampusEN = $row_subdata8['CampusEN'];
                                  }
                                }

                                // Check if this program should be selected
                                $selected = ($Main_row['ProgramID'] == $row['ProgramID']) ? 'selected' : '';

                                // Print the option element
                                echo "<option value='" . $ProgramID . "' $selected>
                                " . $ProgramID . " - ". $YearEN ." - " . $SemesterEN ." - " . $ShiftEN ." - " . $DegreeNameEN ." - " . $AcademicYear ." - " . $MajorEN .
                                " - " . $BatchEN ." - " . $CampusEN . "</option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Assigned</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              name="Assigned" placeholder="Assigned"
                              value="<?php echo isset($row['Assigned']) ? $row['Assigned'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Note</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              name="Note" placeholder="Note"
                              value="<?php echo isset($row['Note']) ? $row['Note'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Assign Date</label>
                            <input type="date" class="form-control border border-primary " id="exampleInputUsername1"
                              name="AssignDate" placeholder="Assign Date"
                              value="<?php echo isset($row['AssignDate']) ? $row['AssignDate'] : '' ?>">
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="row">


                    </div>


                    <a href="statusList.php"><button type="button" class="btn btn-danger">
                        Cancel
                      </button>
                    </a>

                    <button type="submit" class="btn btn-primary" name="c_status">
                      Submit
                    </button>

                  </form>
                </div>
              </div>
            </div>
          </div>


          <!-- row end -->

        </div>
        <!-- row end -->
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