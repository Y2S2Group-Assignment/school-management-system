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

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <?php
            include ('./include/nav.php');
            ?>


            <?php
            include_once ("./connection/conn.php");

            if (isset($_GET['edit_program'])) {
                $edit = $_GET['edit_program'];
                $query = "SELECT * FROM tblprogram WHERE ProgramID = $edit ";
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
                                    <h4 class="card-title">Student Program Form</h4>
                                    <form class="form-sample" action="action.php" method="POST">

                                        <input type="hidden" name="ProgramID"
                                            value="<?php echo isset($row['ProgramID']) ? $row['ProgramID'] : '' ?>">

                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Year</label>
                                                        <select class="form-control border border-primary "
                                                            name="YearID" id="floatingSelect"
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
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Semester</label>
                                                        <select class="form-control border border-primary "
                                                            name="SemesterID" id="floatingSelect"
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
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Shift</label>
                                                        <select class="form-control border border-primary "
                                                            name="ShiftID" id="floatingSelect"
                                                            aria-label="Floating label select example">
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
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Degree</label>
                                                        <select class="form-control border border-primary "
                                                            name="DegreeID" id="floatingSelect"
                                                            aria-label="Floating label select example">
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
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Academic Year</label>
                                                        <select class="form-control border border-primary "
                                                            name="AcademicYearID" id="floatingSelect"
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
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Major</label>
                                                        <select class="form-control border border-primary "
                                                            name="MajorID" id="floatingSelect"
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
                                         

                                        </div>


                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Batch</label>
                                                        <select class="form-control border border-primary "
                                                            name="BatchID" id="floatingSelect"
                                                            aria-label="Floating label select example">
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
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Campus</label>
                                                        <select class="form-control border border-primary "
                                                            name="CampusID" id="floatingSelect"
                                                            aria-label="Floating label select example">
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

                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Start Date</label>
                                                        <input type="text" class="form-control border border-primary "
                                                            id="exampleInputUsername1" placeholder="Start Date"name="StartDate"
                                                            value="<?php echo isset($row['StartDate']) ? $row['StartDate'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            

                                        </div>
                           

                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">End Date</label>
                                                        <input type="text" class="form-control border border-primary "
                                                            id="exampleInputUsername1" placeholder="End Date" name="EndDate"
                                                            value="<?php echo isset($row['EndDate']) ? $row['EndDate'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <a href="stuproList.php"><button type="button" class="btn btn-danger">
                                            Cancel
                                        </button>
                                        </a>

                                        <button type="submit" class="btn btn-primary"  name="c_stuprogram">
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