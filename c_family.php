<!DOCTYPE html>
<html lang="en">

<?php
  require('function.php'); 
  include('./include/header.php');
?>
<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <?php 
      include('./include/sidebar.php');
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <?php 
        include('./include/nav.php');
      ?>

      
      <?php
        include_once ("./connection/conn.php");

        if (isset($_GET['edit_family'])) {
          $edit = $_GET['edit_family'];
          $query = "SELECT * FROM tblfamilybackground WHERE StudentID = $edit ";
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
                  <h4 class="card-title">Student Family Form</h4>
                  <form class="form-sample" action="action.php" method="POST">
                    <p class="card-description">
                      Father Information
                    </p>

                    <input type="hidden" name="FamilyBackgroundID"
                            value="<?php echo isset($row['FamilyBackgroundID']) ? $row['FamilyBackgroundID'] : '' ?>">

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                          <label for="exampleInputUsername1">Father Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1" name="FatherName"
                            placeholder="Father Name"  value="<?php echo isset($row['FatherName']) ? $row['FatherName'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                          <label for="exampleInputUsername1">Father Age</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1" name="FatherAge" 
                            placeholder="Father Age" value="<?php echo isset($row['FatherAge']) ? $row['FatherAge'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Father Nationality</label>
                            <select class="form-control border border-primary " name="FatherNationalityID" id="floatingSelect"
                                  aria-label="Floating label select example">
                                  <option selected disabled value="">Please Select</option>
                                  <?php

                                    $select_mainmenu = "SELECT * FROM tblnationality";
                                    $resultMain = mysqli_query($conn, $select_mainmenu);

                                    while ($Main_row = mysqli_fetch_array($resultMain)) {
                                        $selected = ($Main_row['NationalityID'] == $row['FatherNationalityID']) ?
                                            'selected' : '';
                                        echo "<option value='" . $Main_row['NationalityID'] . " ' $selected>" .
                                            $Main_row['NationalityEN'] . "</option>";
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
                          <label for="exampleInputUsername1">Father Country</label>
                          <select class="form-control border border-primary " name="FatherCountryID" id="floatingSelect"
                                  aria-label="Floating label select example">
                                  <option selected disabled value="">Please Select</option>
                                  <?php

                                    $select_mainmenu = "SELECT * FROM tblcountry";
                                    $resultMain = mysqli_query($conn, $select_mainmenu);

                                    while ($Main_row = mysqli_fetch_array($resultMain)) {
                                        $selected = ($Main_row['CountryID'] == $row['FatherCountryID']) ?
                                            'selected' : '';
                                        echo "<option value='" . $Main_row['CountryID'] . " ' $selected>" .
                                            $Main_row['CountryEN'] . "</option>";
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
                          <label for="exampleInputUsername1">Father Occupation</label>
                          <select class="form-control border border-primary " name="FatherOccupationID" id="floatingSelect"
                                  aria-label="Floating label select example">
                                  <option selected disabled value="">Please Select</option>
                                  <?php

                                    $select_mainmenu = "SELECT * FROM tbloccupation";
                                    $resultMain = mysqli_query($conn, $select_mainmenu);

                                    while ($Main_row = mysqli_fetch_array($resultMain)) {
                                        $selected = ($Main_row['OccupationID'] == $row['FatherOccupationID']) ?
                                            'selected' : '';
                                        echo "<option value='" . $Main_row['OccupationID'] . " ' $selected>" .
                                            $Main_row['OccupationEN'] . "</option>";
                                    }
                                    ;
                                  ?>
                          </select>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                          <label for="exampleInputUsername1">Mother Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1" placeholder="Username">
                          </div>
                        </div>
                      </div> -->
                     
                    </div>
                    <p class="card-description">
                      Mother Information
                    </p>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                          <label for="exampleInputUsername1">Mother Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1" name="MotherName"
                            placeholder="Mother Name"  value="<?php echo isset($row['MotherName']) ? $row['MotherName'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                          <label for="exampleInputUsername1">Mother Age</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1" name="MotherAge"
                            placeholder="Mother Age"  value="<?php echo isset($row['MotherAge']) ? $row['MotherAge'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Mother Nationality</label>
                            <select class="form-control border border-primary " name="MotherNationalityID" id="floatingSelect"
                                  aria-label="Floating label select example">
                                  <option selected disabled value="">Please Select</option>
                                  <?php

                                    $select_mainmenu = "SELECT * FROM tblnationality";
                                    $resultMain = mysqli_query($conn, $select_mainmenu);

                                    while ($Main_row = mysqli_fetch_array($resultMain)) {
                                        $selected = ($Main_row['NationalityID'] == $row['MotherNationalityID']) ?
                                            'selected' : '';
                                        echo "<option value='" . $Main_row['NationalityID'] . " ' $selected>" .
                                            $Main_row['NationalityEN'] . "</option>";
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
                            <label for="exampleInputUsername1">Mother Country</label>
                            <select class="form-control border border-primary " name="MotherCountryID" id="floatingSelect"
                                  aria-label="Floating label select example">
                                  <option selected disabled value="">Please Select</option>
                                  <?php

                                    $select_mainmenu = "SELECT * FROM tblcountry";
                                    $resultMain = mysqli_query($conn, $select_mainmenu);

                                    while ($Main_row = mysqli_fetch_array($resultMain)) {
                                        $selected = ($Main_row['CountryID'] == $row['MotherCountryID']) ?
                                            'selected' : '';
                                        echo "<option value='" . $Main_row['CountryID'] . " ' $selected>" .
                                            $Main_row['CountryEN'] . "</option>";
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
                            <label for="exampleInputUsername1">Mother Occupation</label>
                            <select class="form-control border border-primary " name="MotherOccupationID" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled value="">Please Select</option>
                                    <?php

                                      $select_mainmenu = "SELECT * FROM tbloccupation";
                                      $resultMain = mysqli_query($conn, $select_mainmenu);

                                      while ($Main_row = mysqli_fetch_array($resultMain)) {
                                          $selected = ($Main_row['OccupationID'] == $row['MotherOccupationID']) ?
                                              'selected' : '';
                                          echo "<option value='" . $Main_row['OccupationID'] . " ' $selected>" .
                                              $Main_row['OccupationEN'] . "</option>";
                                      }
                                      ;
                                    ?>
                            </select>
                          </div>
                        </div>
                      </div>
                  
                     
                    </div>
                    <p class="card-description">
                      More
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                          <label for="exampleInputUsername1">Spouse Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1" name="SpouseName"
                            placeholder="Spouse Name"   value="<?php echo isset($row['SpouseName']) ? $row['SpouseName'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                          <label for="exampleInputUsername1">Spouse Age</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1" name="SpouseAge"
                            placeholder="Spouse Age"  value="<?php echo isset($row['SpouseAge']) ? $row['SpouseAge'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                          <label for="exampleInputUsername1">Guardian Contact</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1" name="GuardianPhoneNumber"
                            placeholder="Guardian Contact"  value="<?php echo isset($row['GuardianPhoneNumber']) ? $row['GuardianPhoneNumber'] : '' ?>">
                          </div>
                        </div>
                      </div>
                     
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                        <input type="hidden" name="EducationalBackgroundID"
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
                     
                    </div>
             
                  
                    <a href="stuList.php"><button type="button" class="btn btn-danger">
                        Cancel
                      </button>
                    </a>
                    <button type="submit" class="btn btn-primary" name="c_family">Submit</button>
       
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
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
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