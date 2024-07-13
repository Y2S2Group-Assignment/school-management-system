<!DOCTYPE html>
<html lang="en">

<?php
require('function.php');
include ('./include/header.php');




$StudentID = null;
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
  
      include './connection/conn.php';
      if (isset($_GET['stuFamily'])) {
        $stu = $_GET['stuFamily'];
        $query = "SELECT * FROM tblfamilybackground WHERE StudentID = $stu";
        $result = mysqli_query($conn, $query);

        // Check if the query returned any result
        if ($result) {
          $row = mysqli_fetch_assoc($result);

          if ($row) {
            $StudentID = $row['StudentID'];
            $FatherNationalityID = $row['FatherNationalityID'];

            $FatherCountryID = $row['FatherCountryID'];
            $FatherOccupationID = $row['FatherOccupationID'];

            $MotherNationalityID = $row['MotherNationalityID'];

            $MotherCountryID = $row['MotherCountryID'];
            $MotherOccupationID = $row['MotherOccupationID'];

          } else {
            $_SESSION['empitydata'] = "Data is empity !";
          }
        } else {
          $_SESSION['empitydata'] = "Data is empity !";
        }
      }
      
      ?>
      <!-- partial -->
      <div class="main-panel">

        <div class="content-wrapper">

          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <h4 class="card-title">All About Students</h4>

                    <div class="template-demo">
                    <a href="stuDetail.php?stuDetail=<?php echo $row['StudentID'] ?>">
                        <button type="button" class="btn btn-outline-primary btn-fw">Student Information</button>
                      </a>
                      <a href="stuEdu.php?stuEdu=<?php echo $row['StudentID'] ?>">
                        <button type="button" class="btn btn-outline-secondary btn-fw">Student Educational</button>
                      </a>


                      <a href="stuFamily.php?stuFamily=<?php echo $row['StudentID'] ?>">
                        <button type="button" class="btn btn-outline-success btn-fw">Student Family Background</button>
                      </a>
                     
                      <a href="stuSubject.php?stuSubject=<?php echo $row['StudentID'] ?>">
                      <button type="button" class="btn btn-outline-secondary btn-fw">Student Subjects</button>
                      </a>
                    

                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-12 grid-margin">
            <div class="card">

              <div class="card-body">

                <h4 class="card-title">Student Family Background</h4>

                <?php
                empityData();
                ?>
              
                <hr>
              


                <div class="row pt-2">
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <!-- <label for="exampleInputUsername1">Photo</label> -->
                        <?php
                        if (isset($StudentID)) {
                          $select = "SELECT * FROM tblstudentinfo WHERE StudentID = $StudentID";
                          $resultMenu = mysqli_query($conn, $select);

                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            $Photo = $row_data['Photo']; // Adjust field name to your table structure
                            echo "<img src='./image/$Photo' alt='Gender Image'  width='150'>";
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>

                <?php
                //  if (isset($StudentID)) {
               
                $select_menu = "SELECT * FROM tblstudentstatus WHERE StudentID = $StudentID AND Status = 1";
                $resultMenu = mysqli_query($conn, $select_menu);
                while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                  $ProgramID = $row_data['ProgramID'];
                  ?>

                  <?php
                  $subselect_menu = "SELECT * FROM tblprogram WHERE ProgramID=$ProgramID ";
                  $subresultMenu = mysqli_query($conn, $subselect_menu);
                  while ($subrow_data = mysqli_fetch_assoc($subresultMenu)) {
                    $YearID = $subrow_data['YearID'];
                    $SemesterID = $subrow_data['SemesterID'];
                    $ShiftID = $subrow_data['ShiftID'];
                    $DegreeID = $subrow_data['DegreeID'];
                    $AcademicYearID = $subrow_data['AcademicYearID'];
                    $MajorID = $subrow_data['MajorID'];
                    $BatchID = $subrow_data['BatchID'];
                    $CampusID = $subrow_data['CampusID'];
                    ?>
                    <br><label for="exampleInputUsername1">Student Program: </label>
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
                    if (isset($ShiftID)) {
                      $subselect_menu1 = "SELECT * FROM tblshift WHERE ShiftID = $ShiftID";
                      $subresultMenu1 = mysqli_query($conn, $subselect_menu1);

                      while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                        echo "<b>" . $row_subdata1['ShiftEN'] . '/' . "</b>";
                      }
                    }
                    if (isset($DegreeID)) {
                      $subselect_menu1 = "SELECT * FROM tbldegree WHERE DegreeID = $DegreeID";
                      $subresultMenu1 = mysqli_query($conn, $subselect_menu1);

                      while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                        echo "<b>" . $row_subdata1['DegreeNameEN'] . '/' . "</b>";
                      }
                    }
                    if (isset($AcademicYearID)) {
                      $subselect_menu1 = "SELECT * FROM tblacademicyear WHERE AcademicYearID = $AcademicYearID";
                      $subresultMenu1 = mysqli_query($conn, $subselect_menu1);

                      while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                        echo "<b>" . $row_subdata1['AcademicYear'] . '/' . "</b>";
                      }
                    }
                    if (isset($MajorID)) {
                      $subselect_menu1 = "SELECT * FROM tblmajor WHERE MajorID = $MajorID";
                      $subresultMenu1 = mysqli_query($conn, $subselect_menu1);

                      while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                        echo "<b>" . $row_subdata1['MajorEN'] . '/' . "</b>";
                      }
                    }
                    if (isset($BatchID)) {
                      $subselect_menu1 = "SELECT * FROM tblbatch WHERE BatchID = $BatchID";
                      $subresultMenu1 = mysqli_query($conn, $subselect_menu1);

                      while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                        echo "<b>" . $row_subdata1['BatchEN'] . '/' . "</b>";
                      }
                    }
                    if (isset($SemesterID)) {
                      $subselect_menu1 = "SELECT * FROM tblcampus WHERE CampusID = $CampusID";
                      $subresultMenu1 = mysqli_query($conn, $subselect_menu1);

                      while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                        echo "<b>" . $row_subdata1['CampusEN'] . '.' . "</b>";
                      }
                    }

                    ?>

                  <?php } ?>
                  
                <?php } ?>
                    

                <hr>
                <div class="row ">
                  <div class="col-md-4">
                    <div class="form-group row">
                      <input type="hidden" name="StudentID"
                        value="<?php echo isset($row['StudentID']) ? $row['StudentID'] : '' ?>">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Father Name: </label>
                        <b><?php echo isset($row['FatherName']) ? $row['FatherName'] : ''; ?> </b>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Father Age: </label>
                        <b><?php echo isset($row['FatherAge']) ? $row['FatherAge'] : ''; ?></b>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Father Nationality: </label>
                        <?php
                        if (isset($FatherNationalityID)) {
                          $select = "SELECT * FROM tblnationality WHERE NationalityID = $FatherNationalityID";
                          $resultMenu = mysqli_query($conn, $select);

                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            echo "<b>" . $row_data['NationalityEN'] . "</b>";
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Father Country: </label>
                        <?php
                        if (isset($FatherCountryID)) {
                          $select = "SELECT * FROM tblcountry WHERE CountryID = $FatherCountryID";
                          $resultMenu = mysqli_query($conn, $select);

                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            echo "<b>" . $row_data['CountryEN'] . "</b>";
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Father Occupation: </label>
                        <?php
                        if (isset($FatherOccupationID)) {
                          $select = "SELECT * FROM tbloccupation WHERE OccupationID = $FatherOccupationID";
                          $resultMenu = mysqli_query($conn, $select);

                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            echo "<b>" . $row_data['OccupationEN'] . "</b>";
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Mother Name: </label>
                        <b><?php echo isset($row['MotherName']) ? $row['MotherName'] : ''; ?></b>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Mother Age: </label>
                        <b><?php echo isset($row['MotherAge']) ? $row['MotherAge'] : ''; ?></b>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Mother Nationality:</label>
                        <?php
                        if (isset($MotherNationalityID)) {
                          $select = "SELECT * FROM tblnationality WHERE NationalityID = $MotherNationalityID";
                          $resultMenu = mysqli_query($conn, $select);

                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            echo "<b>" . $row_data['NationalityEN'] . "</b>";
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Mother Country:</label>
                        <?php
                        if (isset($MotherCountryID)) {
                          $select = "SELECT * FROM tblcountry WHERE CountryID = $MotherCountryID";
                          $resultMenu = mysqli_query($conn, $select);

                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            echo "<b>" . $row_data['CountryEN'] . "</b>";
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Mother Occupation:</label>
                        <?php
                        if (isset($MotherOccupationID)) {
                          $select = "SELECT * FROM tbloccupation WHERE OccupationID = $MotherOccupationID";
                          $resultMenu = mysqli_query($conn, $select);

                          while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                            echo "<b>" . $row_data['OccupationEN'] . "</b>";
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Family Address: </label>
                        <b><?php echo isset($row['FamilyCurrentAddress']) ? $row['FamilyCurrentAddress'] : ''; ?></b>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Spouse Name: </label>
                        <b><?php echo isset($row['SpouseName']) ? $row['SpouseName'] : ''; ?></b>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Spouse Age:</label>
                        <b><?php echo isset($row['SpouseAge']) ? $row['SpouseAge'] : ''; ?></b>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="exampleInputUsername1">Guardian PhoneNumber:</label>
                        <b><?php echo isset($row['GuardianPhoneNumber']) ? $row['GuardianPhoneNumber'] : ''; ?></b>
                      </div>
                    </div>
                  </div>
                </div>







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