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

                              $select_mainmenu = "SELECT * FROM tblprogram";
                              $resultMain = mysqli_query($conn, $select_mainmenu);

                              while ($Main_row = mysqli_fetch_array($resultMain)) {
                                $selected = ($Main_row['ProgramID'] == $row['ProgramID']) ?
                                  'selected' : '';
                                echo "<option value='" . $Main_row['ProgramID'] . " ' $selected>" .
                                  $Main_row['ProgramID'] . "</option>";
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
                            <input type="text" class="form-control border border-primary " id="exampleInputUsername1"
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