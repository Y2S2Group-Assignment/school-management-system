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

      if (isset($_GET['edit_subject'])) {
        $edit = $_GET['edit_subject'];
        $query = "SELECT * FROM tblsubject WHERE SubjectID = $edit ";
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
                  <h4 class="card-title">Subject Form</h4>
                  <form class="form-sample pt-3" method="POST" action="action.php" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <input type="hidden" name="SubjectID"
                            value="<?php echo isset($row['SubjectID']) ? $row['SubjectID'] : '' ?>">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Subject Name KH</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              name="SubjectKH" placeholder="Subject KH"
                              value="<?php echo isset($row['SubjectKH']) ? $row['SubjectKH'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Subject Name EN</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              name="SubjectEN" placeholder="Subject EN"
                              value="<?php echo isset($row['SubjectEN']) ? $row['SubjectEN'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Credit Number</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              name="CreditNumber" placeholder="Credit Number"
                              value="<?php echo isset($row['CreditNumber']) ? $row['CreditNumber'] : '' ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">

                          <div class="col-sm-12">
                            <label for="exampleInputUsername1">Hour</label>
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
                              name="Hours" placeholder="Hours"
                              value="<?php echo isset($row['Hours']) ? $row['Hours'] : '' ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                       

                        <div class="col-sm-12">
                            <label for="exampleInputUsername1">Major</label>
                              <select class="form-control border border-primary " name="MajorID" id="floatingSelect"
                                    aria-label="Floating label select example">
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

                      <div class="col-md-4">
                        <div class="form-group row">
                       

                        <div class="col-sm-12">
                            <label for="exampleInputUsername1">Year</label>
                              <select class="form-control border border-primary " name="YearID" id="floatingSelect"
                                    aria-label="Floating label select example">
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
                      </div>
                      <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">

                       

                        <div class="col-sm-12">
                            <label for="exampleInputUsername1">Semester</label>
                              <select class="form-control border border-primary " name="SemesterID" id="floatingSelect"
                                    aria-label="Floating label select example">
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
                      </div>


                    <a href="subject.php">
                      <button type="button" class="btn btn-danger">Cancel</button>
                    </a>

                    <button type="submit" class="btn btn-primary" name="c_subject">Submit</button>



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