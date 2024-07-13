<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>

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
                <h4 class="card-title">Student Subject Fail Report</h4>
                <!-- <div class="pt-3 pb-3">
                  <a href="c_schedule.php">
                    <button type="button" class="btn btn-primary w-15 float-right">Add New Schedule</button>
                  </a>
                </div> -->

                <!-- <div class="col-md-8 pt-5">
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
                </div> -->

                <div class="row pt-3">

                  <div class="col-md-4">
                    <div class="form-group row">

                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Year</label>
                        <select class="form-control border border-primary " id="yearSelect" name="YearID"
                          id="floatingSelect" aria-label="Floating label select example">
                          <option selected disabled value="">Please Select</option>
                          <?php

                          $select_mainmenu = "SELECT * FROM tblyear";
                          $resultMain = mysqli_query($conn, $select_mainmenu);

                          while ($Main_row = mysqli_fetch_array($resultMain)) {
                            $selected = ($Main_row['YearID'] == $row['YearID']) ?
                              'selected' : '';
                            echo "<option value='" . $Main_row['YearID'] . " ' $selected>" .
                              $Main_row['YearEN'] . "</option>";
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
                        <label for="exampleInputUsername1">Semester</label>
                        <select class="form-control border border-primary " id="semesterSelect" name="SemesterID"
                          id="floatingSelect" aria-label="Floating label select example">
                          <option selected disabled value="">Please Select</option>
                          <?php

                          $select_mainmenu = "SELECT * FROM tblsemester";
                          $resultMain = mysqli_query($conn, $select_mainmenu);

                          while ($Main_row = mysqli_fetch_array($resultMain)) {
                            $selected = ($Main_row['SemesterID'] == $row['SemesterID']) ?
                              'selected' : '';
                            echo "<option value='" . $Main_row['SemesterID'] . " ' $selected>" .
                              $Main_row['SemesterEN'] . "</option>";
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
                        <label for="exampleInputUsername1">Batch</label>
                        <select class="form-control border border-primary " id="batchSelect" name="BatchID"
                          id="floatingSelect" aria-label="Floating label select example">
                          <option selected disabled value="">Please Select</option>
                          <?php

                          $select_mainmenu = "SELECT * FROM tblbatch";
                          $resultMain = mysqli_query($conn, $select_mainmenu);

                          while ($Main_row = mysqli_fetch_array($resultMain)) {
                            $selected = ($Main_row['BatchID'] == $row['BatchID']) ?
                              'selected' : '';
                            echo "<option value='" . $Main_row['BatchID'] . " ' $selected>" .
                              $Main_row['BatchEN'] . "</option>";
                          }
                          ;
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                
                </div>

                <div class="row">
                <div class="col-md-3">
                    <div class="form-group row">

                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Major</label>
                        <select class="form-control border border-primary " id="majorSelect" name="MajorID"
                          id="floatingSelect" aria-label="Floating label select example">
                          <option selected disabled value="">Please Select</option>
                          <?php

                          $select_mainmenu = "SELECT * FROM tblmajor";
                          $resultMain = mysqli_query($conn, $select_mainmenu);

                          while ($Main_row = mysqli_fetch_array($resultMain)) {
                            $selected = ($Main_row['MajorID'] == $row['MajorID']) ?
                              'selected' : '';
                            echo "<option value='" . $Main_row['MajorID'] . " ' $selected>" .
                              $Main_row['MajorEN'] . "</option>";
                          }
                          ;
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group row">

                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Shift</label>
                        <select class="form-control border border-primary " id="shiftSelect" name="ShiftID"
                          id="floatingSelect" aria-label="Floating label select example">
                          <option selected disabled value="">Please Select</option>
                          <?php

                          $select_mainmenu = "SELECT * FROM tblshift";
                          $resultMain = mysqli_query($conn, $select_mainmenu);

                          while ($Main_row = mysqli_fetch_array($resultMain)) {
                            $selected = ($Main_row['ShiftID'] == $row['ShiftID']) ?
                              'selected' : '';
                            echo "<option value='" . $Main_row['ShiftID'] . " ' $selected>" .
                              $Main_row['ShiftEN'] . "</option>";
                          }
                          ;
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group row">

                    <div class="col-sm-12">
                      <label for="exampleInputUsername1">Degree</label>
                      <select class="form-control border border-primary " id="degreeSelect" name="DegreeID"
                        id="floatingSelect" aria-label="Floating label select example">
                        <option selected disabled value="">Please Select</option>
                        <?php

                        $select_mainmenu = "SELECT * FROM tbldegree";
                        $resultMain = mysqli_query($conn, $select_mainmenu);

                        while ($Main_row = mysqli_fetch_array($resultMain)) {
                          $selected = ($Main_row['DegreeID'] == $row['DegreeID']) ?
                            'selected' : '';
                          echo "<option value='" . $Main_row['DegreeID'] . " ' $selected>" .
                            $Main_row['DegreeNameEN'] . "</option>";
                        }
                        ;
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group row">

                    <div class="col-sm-12">
                      <label for="exampleInputUsername1">Campus</label>
                      <select class="form-control border border-primary " id="campusSelect" name="CampusID"
                        id="floatingSelect" aria-label="Floating label select example">
                        <option selected disabled value="">Please Select</option>
                        <?php

                        $select_mainmenu = "SELECT * FROM tblcampus";
                        $resultMain = mysqli_query($conn, $select_mainmenu);

                        while ($Main_row = mysqli_fetch_array($resultMain)) {
                          $selected = ($Main_row['CampusID'] == $row['CampusID']) ?
                            'selected' : '';
                          echo "<option value='" . $Main_row['CampusID'] . " ' $selected>" .
                            $Main_row['CampusEN'] . "</option>";
                        }
                        ;
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                </div>


               






                <button type='button' id='exportButton' class='btn btn-primary w-15 float-right'>Save as PDF</button>
              </div>
            </div>

          </div>

          <div id="showReport" class="reportContent">
            <!-- <div class="card">
              <div class="card-body">
                <h4 class="card-title">Student Schedule List</h4>
               
                <div class="table-responsive pt-3"  id="showSchedule">
                 
                </div>
              </div>
            </div> -->
          </div>



        </div>
        <!-- row end -->
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:./partials/_footer.html -->

      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <script>



    // $(document).ready(function () {
    //   $('#selectSchedule').on('change', function () {
    //       var ProgramID = $(this).val(); // Get the selected ProgramID
    //       //var ShiftID = $(this).find('option:selected').data('shift-id'); 
    //       console.log("Selected ProgramID:", ProgramID); // Debugging output

    //       $.ajax({
    //           type: 'POST',
    //           url: './report/fetchsubfail.php',
    //           data: { id: ProgramID },
    //           success: function (data) {
    //               $('#showReport').html(data); // Populate #showSchedule with options returned from fetchSchedule.php
    //               // Attach the ProgramID and ShiftID to the showSchedule container for later use
    //               $('#showReport').data('program-id', ProgramID);
    //               // $('#showSchedule').data('shift-id', ShiftID);
    //           },
    //           error: function(jqXHR, textStatus, errorThrown) {
    //               console.error('Error fetching schedules:', textStatus, errorThrown);
    //               $('#showSchedule').html('<option selected disabled value="">Error fetching schedules</option>');
    //           }
    //       });
    //   });
    // });

    $(document).ready(function () {
      function fetchPrograms() {
        var batchID = $('#batchSelect').val();
        var majorID = $('#majorSelect').val();
        var shiftID = $('#shiftSelect').val();
        var degreeID = $('#degreeSelect').val();
        var campusID = $('#campusSelect').val();
        var yearID = $('#yearSelect').val();
        var semesterID = $('#semesterSelect').val();


        if (yearID && semesterID && batchID && majorID && shiftID && degreeID && campusID) {
          $.ajax({
            url: './report/fetchsubfail.php',
            type: 'POST',
            data: { yearID: yearID, semesterID: semesterID, batchID: batchID, majorID: majorID, shiftID: shiftID, degreeID: degreeID, campusID: campusID },
            success: function (response) {
              $('#showReport').html(response);
            }
          });
        }
      }
      $('#batchSelect, #majorSelect, #shiftSelect, #degreeSelect, #campusSelect, #yearSelect, #semesterSelect').change(function () {
        fetchPrograms(); // Call fetchPrograms function on change event
      });
    });



    document.addEventListener('DOMContentLoaded', function () {
      const exportButton = document.getElementById('exportButton');
      if (exportButton) {
        exportButton.addEventListener('click', function () {
          console.log('Button clicked'); // Debugging line
          generatePDF();
        });
      } else {
        console.error('Export button not found');
      }
    });

    function generatePDF() {
      html2canvas(document.querySelector(".reportContent"), {
        scale: 2, // Increase the scale to improve resolution
        useCORS: true // Enable cross-origin resource sharing
      }).then(canvas => {
        console.log('Canvas captured:', canvas); // Debugging line

        // Check if jsPDF is available globally or from another source
        if (typeof jsPDF !== 'undefined') {
          const imgData = canvas.toDataURL('image/png');
          const pdf = new jsPDF('landscape');
          const imgWidth = 297; // A4 paper width in mm
          const pageHeight = 210; // A4 paper height in mm
          const imgHeight = canvas.height * imgWidth / canvas.width;
          let heightLeft = imgHeight;
          let position = 0;

          pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
          heightLeft -= pageHeight;

          while (heightLeft >= 0) {
            position = heightLeft - imgHeight;
            pdf.addPage();
            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
          }

          console.log('PDF generated successfully'); // Debugging line
          pdf.save("Student_Achievement_Report.pdf");
        } else {
          console.error('jsPDF is not defined');
        }
      }).catch(error => {
        console.error('Error capturing canvas or generating PDF:', error);
      });
    }



    // document.addEventListener('DOMContentLoaded', function() {
    //   const exportButton = document.getElementById('exportButton');
    //   if (exportButton) {
    //     exportButton.addEventListener('click', function() {
    //       console.log('Button clicked'); // Debugging line
    //       generatePDF();
    //     });
    //   } else {
    //     console.error('Export button not found');
    //   }
    // });

    // function generatePDF() {
    //   html2canvas(document.querySelector(".reportContent"), {
    //     scale: 2, // Increase the scale to improve resolution
    //     useCORS: true // Enable cross-origin resource sharing
    //   }).then(canvas => {
    //     console.log('Canvas captured:', canvas); // Debugging line
    //     const imgData = canvas.toDataURL('image/png');
    //     console.log('Image data:', imgData); // Debugging line

    //     console.log('Canvas captured:', canvas);
    // const { jsPDF } = window.jspdf;
    // console.log('jsPDF object:', jsPDF); // Check if jsPDF is correctly assigned
    //     const pdf = new jsPDF('landscape');
    //     const imgWidth = 297; // A4 paper width in mm
    //     const pageHeight = 210; // A4 paper height in mm
    //     const imgHeight = canvas.height * imgWidth / canvas.width;
    //     let heightLeft = imgHeight;
    //     let position = 0;

    //     pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
    //     heightLeft -= pageHeight;

    //     while (heightLeft >= 0) {
    //       position = heightLeft - imgHeight;
    //       pdf.addPage();
    //       pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
    //       heightLeft -= pageHeight;
    //     }

    //     console.log('PDF generated successfully'); // Debugging line
    //     pdf.save("Student_Achievement_Report.pdf");
    //   }).catch(error => {
    //     console.error('Error capturing canvas or generating PDF:', error);
    //   });
    // }




    // document.addEventListener('DOMContentLoaded', function() {
    //   const exportButton = document.getElementById('exportButton');
    //   if (exportButton) {
    //     exportButton.addEventListener('click', function() {
    //       console.log('Button clicked'); // Debugging line
    //       generatePDF();
    //     });
    //   } else {
    //     console.error('Export button not found');
    //   }
    // });

    // function generatePDF() {
    //   html2canvas(document.querySelector(".reportContent"), {
    //     scale: 2, // Increase the scale to improve resolution
    //     useCORS: true // Enable cross-origin resource sharing
    //   }).then(canvas => {
    //     console.log('Canvas captured:', canvas); // Debugging line

    //     // Access jsPDF directly from window object, adjust as per your version or source
    //     const jsPDF = window.jspdf.jsPDF; // Modify this line as needed

    //     if (jsPDF) {
    //       const imgData = canvas.toDataURL('image/png');
    //       const pdf = new jsPDF('landscape');
    //       const imgWidth = 297; // A4 paper width in mm
    //       const pageHeight = 210; // A4 paper height in mm
    //       const imgHeight = canvas.height * imgWidth / canvas.width;
    //       let heightLeft = imgHeight;
    //       let position = 0;

    //       pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
    //       heightLeft -= pageHeight;

    //       while (heightLeft >= 0) {
    //         position = heightLeft - imgHeight;
    //         pdf.addPage();
    //         pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
    //         heightLeft -= pageHeight;
    //       }

    //       console.log('PDF generated successfully'); // Debugging line
    //       pdf.save("Student_Achievement_Report.pdf");
    //     } else {
    //       console.error('jsPDF is not defined');
    //     }
    //   }).catch(error => {
    //     console.error('Error capturing canvas or generating PDF:', error);
    //   });
    // }




  </script>
</body>

</html>