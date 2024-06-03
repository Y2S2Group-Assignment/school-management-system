<!DOCTYPE html>
<html lang="en">

<?php
require("function.php");
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
      <!-- partial -->

      <?php
      include_once ("./connection/conn.php");

      if (isset($_GET['edit_student'])) {
        $edit = $_GET['edit_student'];
        $query = "SELECT * FROM tblstudentinfo WHERE StudentID = $edit ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
      }
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Student Information Form</h4>
                 
                  <form class="form-sample" action="action.php" method="POST" enctype="multipart/form-data">
                    <p class="card-description">
                      Information
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">

                          <input type="hidden" name="StudentID"
                            value="<?php echo isset($row['StudentID']) ? $row['StudentID'] : '' ?>">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Khmer Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Khmer Name"   name="NameInKhmer"
                              value="<?php echo isset($row['NameInKhmer']) ? $row['NameInKhmer'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Latin Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Latin Name" name="NameInLatin"
                              value="<?php echo isset($row['NameInLatin']) ? $row['NameInLatin'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Family Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Family Name"  name="FamilyName"
                              value="<?php echo isset($row['FamilyName']) ? $row['FamilyName'] : '' ?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Given Name</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Given Name" name="GivenName"
                              value="<?php echo isset($row['GivenName']) ? $row['GivenName'] : '' ?>">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Gender</label>
                              <select class="form-control border border-primary " name="SexID" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled value="">Please Select</option>
                                    <?php

                                      $select_mainmenu = "SELECT * FROM tblsex";
                                      $resultMain = mysqli_query($conn, $select_mainmenu);

                                      while ($Main_row = mysqli_fetch_array($resultMain)) {
                                          $selected = ($Main_row['SexID'] == $row['SexID']) ?
                                              'selected' : '';
                                          echo "<option value='" . $Main_row['SexID'] . " ' $selected>" .
                                              $Main_row['SexEN'] . "</option>";
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
                            <label for="exampleInputUsername1">Passport ID</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Passport ID" name="IDPassportNo"
                              value="<?php echo isset($row['IDPassportNo']) ? $row['IDPassportNo'] : '' ?>">
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Nationality</label>
                              <select class="form-control border border-primary " name="NationalityID" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled value="">Please Select</option>
                                    <?php

                                      $select_mainmenu = "SELECT * FROM tblnationality";
                                      $resultMain = mysqli_query($conn, $select_mainmenu);

                                      while ($Main_row = mysqli_fetch_array($resultMain)) {
                                          $selected = ($Main_row['NationalityID'] == $row['NationalityID']) ?
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
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Country</label>
                              <select class="form-control border border-primary " name="CountryID" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected disabled value="">Please Select</option>

                                    <?php

                                      $select_mainmenu = "SELECT * FROM tblcountry";
                                      $resultMain = mysqli_query($conn, $select_mainmenu);

                                      while ($Main_row = mysqli_fetch_array($resultMain)) {
                                        
                                          $selected = ($Main_row['CountryID'] == $row['CountryID']) ?
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
                            <label for="exampleInputUsername1">Date of Birth</label>
                            <input type="date" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Date of Birth" name="DOB"
                              value="<?php echo isset($row['DOB']) ? $row['DOB'] : '' ?>">
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Place of Birth</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Place of Birth" name="POB"
                              value="<?php echo isset($row['POB']) ? $row['POB'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Contact</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Contact" name="PhoneNumber"
                              value="<?php echo isset($row['PhoneNumber']) ? $row['PhoneNumber'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Email</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Email"name="Email"
                              value="<?php echo isset($row['Email']) ? $row['Email'] : '' ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Photo</label><br>
                            <img src="./image/<?php echo isset($row['Photo']) ? $row['Photo'] : '' ?>" class="pb-3" width="150px">
                            <input type="file" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Photo"name="Photo"
                              value="">
                          </div>
                        </div>
                      </div>
                    </div>

                    <p class="card-description">
                      Address
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Address</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Address"name="CurrentAddress"
                              value="<?php echo isset($row['CurrentAddress']) ? $row['CurrentAddress'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Current Address</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Current Address"name="CurrentAddressPP"
                              value="<?php echo isset($row['CurrentAddressPP']) ? $row['CurrentAddressPP'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Register Date</label>
                            <input type="date" class="form-control border border-primary " id="exampleInputUsername1"
                              placeholder="Rigister Date"name="RegisterDate"
                              value="<?php echo isset($row['RegisterDate']) ? $row['RegisterDate'] : '' ?>">
                          </div>
                        </div>
                      </div>

                    </div>



                    <a href="stuList.php"><button type="button" class="btn btn-danger">
                        Cancel
                      </button>
                    </a>

                    <button type="submit" class="btn btn-primary" name="c_information">Submit</button>
                   
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