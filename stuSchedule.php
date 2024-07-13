<!DOCTYPE html>
<html lang="en">

<?php
require 'function.php';

include './connection/conn.php';
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
      // session_start();
      include './connection/conn.php';



      $sql = " SELECT * FROM tblschedule ";
      $result = mysqli_query($conn, $sql);
      $i = 1;

      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Student Schedule List</h4>
                <div class="pt-3 pb-3">
                  <a href="c_schedule.php">
                    <button type="button" class="btn btn-primary w-15 float-right">Add New Schedule</button>
                  </a>
                </div>

                <div class="col-md-8 pt-5">
                  <div class="form-group row">

                    <div class="col-sm-12">
                      <label for="exampleInputUsername1">Program</label>
                      <select class="form-control border border-primary " name="ProgramID" id="selectSchedule"
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
                          echo "<option value='" . $ProgramID . "' data-shift-id='" . $ShiftID . "' $selected>
                                " . $ProgramID . " - " . $YearEN . " - " . $SemesterEN . " - " . $ShiftEN . " - " . $DegreeNameEN . " - " . $AcademicYear . " - " . $MajorEN .
                            " - " . $BatchEN . " - " . $CampusEN . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>


<!-- 
                <div class="table-responsive">
                  <hr>
                  <?php
                  alertMessage();
                  ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          N0.
                        </th>
                        <th>
                          Subject
                        </th>
                        <th>
                          Lecturer Name
                        </th>

                        <th>
                          Program
                        </th>

                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($row = mysqli_fetch_assoc($result)) {
                        $SubjectID = $row['SubjectID'];
                        $LecturerID = $row['LecturerID'];
                        $ProgramID = $row['ProgramID'];

                        ?>
                        <tr>
                          <td class="">
                            <b><?= $i++ ?>.</b>

                          </td>

                          <?php
                          //include "../connection/conn.php";
                          $select_menu = "SELECT * FROM tblsubject WHERE SubjectID = $SubjectID";
                          $resultMenu = mysqli_query($conn, $select_menu);
                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            ?>
                            <td class=" ">
                              <b>
                                <?php echo $row_data['SubjectEN'] ?>
                              </b>
                            </td>
                          <?php } ?>

                          <?php
                          //include "../connection/conn.php";
                          $select_menu = "SELECT * FROM tbllecturer WHERE LecturerID = $LecturerID";
                          $resultMenu = mysqli_query($conn, $select_menu);
                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            ?>
                            <td class=" ">
                              <b>
                                <?php echo $row_data['LecturerEN'] ?>
                              </b>
                            </td>
                          <?php } ?>

                          <?php

                          $select_menu = "SELECT * FROM tblprogram WHERE ProgramID = $ProgramID";
                          $resultMenu = mysqli_query($conn, $select_menu);
                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            $YearID = $row_data['YearID'];
                            $SemesterID = $row_data['SemesterID'];
                            $MajorID = $row_data['MajorID'];

                            ?>
                            <td class=" ">
                              <b>
                                <?php

                                if (isset($YearID)) {
                                  $subselect_menu1 = "SELECT * FROM tblyear WHERE YearID = $YearID";
                                  $subresultMenu1 = mysqli_query($conn, $subselect_menu1);

                                  while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                    echo "<b>" . $row_subdata1['YearEN'] . '/' . "</b>";
                                  }
                                }
                                if (isset($SemesterID)) {
                                  $subselect_menu1 = "SELECT * FROM tblsemester WHERE SemesterID = $SemesterID";
                                  $subresultMenu1 = mysqli_query($conn, $subselect_menu1);

                                  while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                    echo "<b>" . $row_subdata1['SemesterEN'] . '/' . "</b>";
                                  }
                                }
                                if (isset($MajorID)) {
                                  $subselect_menu1 = "SELECT * FROM tblmajor WHERE MajorID = $MajorID";
                                  $subresultMenu1 = mysqli_query($conn, $subselect_menu1);

                                  while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                    echo "<b>" . $row_subdata1['MajorEN'] . "</b>";
                                  }
                                }

                                ?>
                              </b>
                            </td>
                          <?php } ?>


                          <td>
                            <a href="c_schedule.php?edit_schedule=<?php echo $row['ScheduleID'] ?> ">
                              <button class="btn btn-outline-primary btn-sm edit_borrower" type="button"><i
                                  class="fa fa-edit">
                                </i></button>
                            </a>
                            <a href="action.php?d_schedule=<?php echo $row['ScheduleID'] ?>">
                              <button class="btn btn-outline-danger btn-sm delete_borrower" type="button"><i
                                  class="fa fa-trash"></i></button>
                            </a>
                          </td>
                        </tr>

                      <?php } ?>
                    </tbody>

                  </table>


                </div> -->
              </div>
            </div>

          </div>

          <div id="showSchedule">
           
          </div>



        </div>
        <!-- row end -->
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:./partials/_footer.html -->
      <footer class="footer">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                bootstrapdash.com 2020</span>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By:
                <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                  href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                  templates</a> from Bootstrapdash.com</span>
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

<script>
  // $(document).ready(function () {
  //       $('#selectSchedule').on('change', function () { // Listen for change event on #selectID
  //       var ProgramID = $(this).val(); // Get the selected ProgramID
  //       var ShiftID = $(this).find('option:selected').data('shift-id'); // Get the selected ShiftID from data attribute
  //       console.log("Selected ProgramID:", ProgramID); // Debugging output
  //       $.ajax({
  //           type: 'POST',
  //           url: 'fetchStuschedule.php',
  //           data: { id: ProgramID },
  //           success: function (data) {
  //               $('#showSchedule').html(data); // Populate #showSchedule with options returned from fetchSchedule.php
  //               // Attach the ProgramID to the showSchedule dropdown for later use
  //               $('#showSchedule').data('program-id', ProgramID);
  //           },
  //           error: function(jqXHR, textStatus, errorThrown) {
  //               console.error('Error fetching schedules:', textStatus, errorThrown);
  //               $('#showSchedule').html('<option selected disabled value="">Error fetching schedules</option>');
  //           }
  //       });
  //   });
  // });


  $(document).ready(function () {
    $('#selectSchedule').on('change', function () {
        var ProgramID = $(this).val(); // Get the selected ProgramID
        var ShiftID = $(this).find('option:selected').data('shift-id'); // Get the selected ShiftID from data attribute
        console.log("Selected ProgramID:", ProgramID); // Debugging output
        console.log("Selected ShiftID:", ShiftID); // Debugging output
        $.ajax({
            type: 'POST',
            url: 'fetchStuschedule.php',
            data: { id: ProgramID, shiftId: ShiftID },
            success: function (data) {
                $('#showSchedule').html(data); // Populate #showSchedule with options returned from fetchSchedule.php
                // Attach the ProgramID and ShiftID to the showSchedule container for later use
                $('#showSchedule').data('program-id', ProgramID);
                $('#showSchedule').data('shift-id', ShiftID);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching schedules:', textStatus, errorThrown);
                $('#showSchedule').html('<option selected disabled value="">Error fetching schedules</option>');
            }
        });
    });
  });



</script>
