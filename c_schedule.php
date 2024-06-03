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

            if (isset($_GET['edit_schedule'])) {
                $edit = $_GET['edit_schedule'];
                $query = "SELECT * FROM tblschedule WHERE ScheduleID = $edit ";
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
                                    <h4 class="card-title">Student Schedule Form</h4>
                                    <form class="form-sample" action="action.php" method="POST">

                                        <input type="hidden" name="ScheduleID"
                                            value="<?php echo isset($row['ScheduleID']) ? $row['ScheduleID'] : '' ?>">

                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Subject</label>
                                                        <select class="form-control border border-primary "
                                                            name="SubjectID" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected disabled value="">Please Select</option>
                                                            <?php

                                                            $select_mainmenu = "SELECT * FROM tblsubject";
                                                            $resultMain = mysqli_query($conn, $select_mainmenu);

                                                            while ($Main_row = mysqli_fetch_array($resultMain)) {
                                                                $selected = ($Main_row['SubjectID'] == $row['SubjectID']) ?
                                                                    'selected' : '';
                                                                echo "<option value='" . $Main_row['SubjectID'] . " ' $selected>" .
                                                                    $Main_row['SubjectID'] .'.'.$Main_row['SubjectEN']. "</option>";
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
                                                        <label for="exampleInputUsername1">Lecturer</label>
                                                        <select class="form-control border border-primary "
                                                            name="LecturerID" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected disabled value="">Please Select</option>
                                                            <?php

                                                            $select_mainmenu = "SELECT * FROM tbllecturer";
                                                            $resultMain = mysqli_query($conn, $select_mainmenu);

                                                            while ($Main_row = mysqli_fetch_array($resultMain)) {
                                                                $selected = ($Main_row['LecturerID'] == $row['LecturerID']) ?
                                                                    'selected' : '';
                                                                echo "<option value='" . $Main_row['LecturerID'] . " ' $selected>" .
                                                                $Main_row['LecturerID'] .'.'.$Main_row['LecturerEN'] . "</option>";
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
                                                        <label for="exampleInputUsername1">Day Week</label>
                                                        <select class="form-control border border-primary "
                                                            name="DayWeekID" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected disabled value="">Please Select</option>
                                                            <?php
                                                      
                                                        $select_mainmenu = "SELECT * FROM tbldayweek";
                                                        $resultMain = mysqli_query($conn, $select_mainmenu);

                                                        while ($Main_row = mysqli_fetch_array($resultMain)) {

                                                            $DayWeekID = $Main_row['DayWeekID'];   
                                                            $DayWeekName = $Main_row['DayWeekName']; 
                                                            $ShiftID = $Main_row['ShiftID'];

                                                            
                                                            
                                                            if (isset($ShiftID)) {
                                                            $subselect_menu1 = "SELECT * FROM tblshift WHERE ShiftID = $ShiftID";
                                                            $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                            if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                $ShiftEN = $row_subdata1['ShiftEN'];
                                                            }
                                                            }

                                                           
                                                            $selected = ($Main_row['DayWeekID'] == $row['DayWeekID']) ? 'selected' : '';

                                                            
                                                            echo "<option value='" . $DayWeekID . "' $selected>
                                                            " . $DayWeekID . " - ". $ShiftEN . " - ". $DayWeekName ."</option>";
                                                        }
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
                                                        <label for="exampleInputUsername1">Time</label>
                                                        <select class="form-control border border-primary "
                                                            name="TimeID" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected disabled value="">Please Select</option>
                                                            <?php
                                                        
                                                        $select_mainmenu = "SELECT * FROM tbltime";
                                                        $resultMain = mysqli_query($conn, $select_mainmenu);

                                                        while ($Main_row = mysqli_fetch_array($resultMain)) {

                                                            $TimeID = $Main_row['TimeID'];   
                                                            $TimeName = $Main_row['TimeName']; 
                                                            $ShiftID = $Main_row['ShiftID'];

                                                            
                                                            
                                                            if (isset($ShiftID)) {
                                                            $subselect_menu1 = "SELECT * FROM tblshift WHERE ShiftID = $ShiftID";
                                                            $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                            if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                $ShiftEN = $row_subdata1['ShiftEN'];
                                                            }
                                                            }

                                                            
                                                            $selected = ($Main_row['TimeID'] == $row['TimeID']) ? 'selected' : '';

                                                            
                                                            echo "<option value='" . $TimeID . "' $selected>
                                                            " . $TimeID . " - ". $ShiftEN . " - ". $TimeName ."</option>";
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Room</label>
                                                        <select class="form-control border border-primary "
                                                            name="RoomID" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected disabled value="">Please Select</option>
                                                            <?php
                                                        
                                                        $select_mainmenu = "SELECT * FROM tblroom ";
                                                        $resultMain = mysqli_query($conn, $select_mainmenu);

                                                        while ($Main_row = mysqli_fetch_array($resultMain)) {

                                                            $RoomID = $Main_row['RoomID'];   
                                                            $RoomName = $Main_row['RoomName']; 
                                                            $CampusID = $Main_row['CampusID'];

                                                            
                                                            
                                                            if (isset($CampusID)) {
                                                            $subselect_menu1 = "SELECT * FROM tblcampus WHERE CampusID = $CampusID";
                                                            $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                            if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                $CampusEN = $row_subdata1['CampusEN'];
                                                            }
                                                            }

                                                            
                                                            $selected = ($Main_row['CampusID'] == $row['CampusID']) ? 'selected' : '';

                                                            
                                                            echo "<option value='" . $RoomID . "' $selected>
                                                            " . $RoomID . " - ". $CampusEN . " - ". $RoomName ."</option>";
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Program</label>
                                                        <select class="form-control border border-primary "
                                                            name="ProgramID" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected disabled value="">Please Select</option>
                                                            <?php
                                                    
                                                        $select_mainmenu = "SELECT * FROM tblprogram ";
                                                        $resultMain = mysqli_query($conn, $select_mainmenu);

                                                        while ($Main_row = mysqli_fetch_array($resultMain)) {
                                                            $ProgramID = $Main_row['ProgramID'];

                                                       
                                                            $YearID = $Main_row['YearID'];
                                                     
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

                                                       
                                                            $selected = ($Main_row['ProgramID'] == $row['ProgramID']) ? 'selected' : '';

                                                            echo "<option value='" . $ProgramID . "' $selected>
                                                            " . $ProgramID . " - ". $YearEN ." - " . $SemesterEN ." - " . $ShiftEN ." - " . $DegreeNameEN ." - " . $AcademicYear ." - " . $MajorEN .
                                                            " - " . $BatchEN ." - " . $CampusEN . "</option>";
                                                        }
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
                                                        <label for="exampleInputUsername1">Date Start</label>
                                                        <input type="date" class="form-control border border-primary "
                                                            id="exampleInputUsername1" placeholder="Start Date"name="DateStart"
                                                            value="<?php echo isset($row['DateStart']) ? $row['DateStart'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Date End</label>
                                                        <input type="date" class="form-control border border-primary "
                                                            id="exampleInputUsername1" placeholder="Start Date"name="DateEnd"
                                                            value="<?php echo isset($row['DateEnd']) ? $row['DateEnd'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Schedule Date</label>
                                                        <input type="date" class="form-control border border-primary "
                                                            id="exampleInputUsername1" placeholder="Start Date"name="ScheduleDate"
                                                            value="<?php echo isset($row['ScheduleDate']) ? $row['ScheduleDate'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            

                                        </div>
                           


                                        <a href="schedule.php"><button type="button" class="btn btn-danger">
                                            Cancel
                                        </button>
                                        </a>

                                        <button type="submit" class="btn btn-primary"  name="c_schedule">
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