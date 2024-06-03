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
            include './connection/conn.php';
            if (isset($_GET['stuSubject'])) {
                $stu = $_GET['stuSubject'];
                $query = "SELECT * FROM tblstudentstatus WHERE StudentID = $stu";
                $result = mysqli_query($conn, $query);

                // Check if the query returned any result
                if ($result) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row) {
                        $StudentID = $row['StudentID'];
                        $StudentStatusID = $row['StudentStatusID'];
                        //   $AcademicYearID = $row['AcademicYearID'];
                        //   $Photo = $row['Photo'];
            
                    } else {
                        echo "No student found with the provided ID.";
                    }
                } else {
                    echo "Error executing query: " . mysqli_error($conn);
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
                                                <button type="button" class="btn btn-outline-primary btn-fw">Student
                                                    Information</button>
                                            </a>
                                            <a href="stuEdu.php?stuEdu=<?php echo $row['StudentID'] ?>">
                                                <button type="button" class="btn btn-outline-secondary btn-fw">Student
                                                    Educational</button>
                                            </a>


                                            <a href="stuFamily.php?stuFamily=<?php echo $row['StudentID'] ?>">
                                                <button type="button" class="btn btn-outline-success btn-fw">Student
                                                    Family Background</button>
                                            </a>

                                            <a href="stuSubject.php?stuSubject=<?php echo $row['StudentStatusID'] ?>">
                                                <button type="button" class="btn btn-outline-secondary btn-fw">Student
                                                    Subjects</button>
                                            </a>
                                            <!-- <button type="button" class="btn btn-outline-success btn-fw">Success</button>
                        <button type="button" class="btn btn-outline-secondary btn-fw">Secondary</button>
                        <button type="button" class="btn btn-outline-success btn-fw">Success</button> -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 grid-margin">
                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Student Subject Fail</h4>

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
                                                        echo "<img src='./image/$Photo' alt='Gender Image' width='150'>";
                                                    }
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                //  include_once 'Connection.php';
                                $select_menu = "SELECT * FROM tblstudentstatus WHERE StudentID = $stu";
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
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <input type="hidden" name="StudentID"
                                                value="<?php echo isset($row['StudentID']) ? $row['StudentID'] : '' ?>">


                                            <div class="col-sm-12">
                                                <label for="exampleInputUsername1">Subject Schedule:</label><br>
                                                <?php
                                                $select_menu = "SELECT * FROM tblsubjectfall WHERE StudentStatusID = $StudentStatusID";
                                                $resultMenu = mysqli_query($conn, $select_menu);

                                                while ($row_data = mysqli_fetch_assoc($resultMenu)) {
                                                    $ScheduleID = $row_data['ScheduleID'];

                                                    $subselect_menu = "SELECT * FROM tblschedule WHERE ScheduleID = $ScheduleID";
                                                    $subresultMenu = mysqli_query($conn, $subselect_menu);
                                                    while ($subrow_data = mysqli_fetch_assoc($subresultMenu)) {
                                                        $SubjectID = $subrow_data['SubjectID'];
                                                        $LecturerID = $subrow_data['LecturerID'];
                                                        $DayWeekID = $subrow_data['DayWeekID'];
                                                        $TimeID = $subrow_data['TimeID'];
                                                        $RoomID = $subrow_data['RoomID'];
                                                        $ProgramID = $subrow_data['ProgramID'];

                                                        

                                                        if ($SubjectID) {
                                                            $subselect_menu1 = "SELECT SubjectEN FROM tblsubject WHERE SubjectID = $SubjectID";
                                                            $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                            if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                // echo "<b>" . $row_subdata1['SubjectEN'] . " / </b>";
                                                                echo "<b>" . $row_subdata1['SubjectEN'] . "</b>".'<br>';
                                                             

                                                            }
                                                        }


                                                        if ($LecturerID) {
                                                            $subselect_menu1 = "SELECT LecturerEN FROM tbllecturer WHERE LecturerID = $LecturerID";
                                                            $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                            if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                echo "<b>".'Lecturer:' .'  '. $row_subdata1['LecturerEN'] ." </b>".'<br>';
                                                            }
                                                        }

                                                        // if ($DayWeekID) {
                                                        //     $subselect_menu1 = "SELECT DayWeekName FROM tbldayweek WHERE DayWeekID = $DayWeekID";
                                                        //     $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                        //     while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                        //         $ShiftID = $row_subdata1['ShiftID'];
                                                        //         $DayWeekName = $row_subdata1['DayWeekName'];
                                                        //         if ($ShiftID) {
                                                        //             $subselect_menu2 = "SELECT ShiftEN FROM tblshift WHERE ShiftID = $ShiftID";
                                                        //             $subresultMenu2 = mysqli_query($conn, $subselect_menu2);
                                                        //             if ($row_subdata2 = mysqli_fetch_assoc($subresultMenu2)) {
                                                        //                 echo  " / Day of the Week: ". $ShiftEN . " " . $DayWeekName . "</b><br>";
                                                        //             }
                                                                   
                                                        //         }
                                                        //     }
                                                            
                                                        // }
                                                        if ($DayWeekID) {
                                                            $subselect_menu1 = "SELECT DayWeekName, ShiftID FROM tbldayweek WHERE DayWeekID = $DayWeekID";
                                                            $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                            while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                $ShiftID = $row_subdata1['ShiftID'];
                                                                $DayWeekName = $row_subdata1['DayWeekName'];
                                                                if ($ShiftID) {
                                                                    $subselect_menu2 = "SELECT ShiftEN FROM tblshift WHERE ShiftID = $ShiftID";
                                                                    $subresultMenu2 = mysqli_query($conn, $subselect_menu2);
                                                                    if ($row_subdata2 = mysqli_fetch_assoc($subresultMenu2)) {
                                                                        $ShiftEN = $row_subdata2['ShiftEN'];  // Correctly assign ShiftEN
                                                                        echo  "<b>  Day of the Week: ". $ShiftEN ." /". $DayWeekName . "</b><br>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        

                                                        if ($TimeID) {
                                                            $subselect_menu1 = "SELECT TimeName , ShiftID  FROM tbltime WHERE TimeID = $TimeID";
                                                            $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                            while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                $ShiftID = $row_subdata1['ShiftID'];
                                                                $TimeName = $row_subdata1['TimeName'];
                                                                if ($ShiftID) {
                                                                    $subselect_menu2 = "SELECT ShiftEN FROM tblshift WHERE ShiftID = $ShiftID";
                                                                    $subresultMenu2 = mysqli_query($conn, $subselect_menu2);
                                                                    if ($row_subdata2 = mysqli_fetch_assoc($subresultMenu2)) {
                                                                        $ShiftEN = $row_subdata2['ShiftEN'];  // Correctly assign ShiftEN
                                                                        echo  "<b>  Time: ". $ShiftEN ." /". $TimeName . "</b><br>";
                                                                    }
                                                                }
                                                            }
                                                        }

                                                        if ($RoomID) {
                                                            $subselect_menu1 = "SELECT RoomName,CampusID FROM tblroom WHERE RoomID = $RoomID";
                                                            $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                            while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                $CampusID = $row_subdata1['CampusID'];
                                                                $RoomName = $row_subdata1['RoomName'];
                                                                if ($CampusID) {
                                                                    $subselect_menu2 = "SELECT CampusEN FROM tblcampus WHERE CampusID = $CampusID";
                                                                    $subresultMenu2 = mysqli_query($conn, $subselect_menu2);
                                                                    if ($row_subdata2 = mysqli_fetch_assoc($subresultMenu2)) {
                                                                        $CampusEN = $row_subdata2['CampusEN'];  // Correctly assign ShiftEN
                                                                        echo  "<b>  Room: ". $CampusEN ." /". $RoomName . "</b><br>";
                                                                    }
                                                                }
                                                            }
                                                        }

                                                        if ($ProgramID) {
                                                            $subselect_menu1 = "SELECT * FROM tblprogram WHERE ProgramID = $ProgramID";
                                                            $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                            if ($subrow_program = mysqli_fetch_assoc($subresultMenu1)) {
                                                                $YearID = $subrow_program['YearID'];
                                                                $SemesterID = $subrow_program['SemesterID'];
                                                                $ShiftID = $subrow_program['ShiftID'];
                                                                $DegreeID = $subrow_program['DegreeID'];
                                                                $AcademicYearID = $subrow_program['AcademicYearID'];
                                                                $MajorID = $subrow_program['MajorID'];
                                                                $BatchID = $subrow_program['BatchID'];
                                                                $CampusID = $subrow_program['CampusID'];

                                                                if ($YearID) {
                                                                    $subselect_menu1 = "SELECT YearEN FROM tblyear WHERE YearID = $YearID";
                                                                    $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                                    if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                        echo "<b> Program: " . $row_subdata1['YearEN'] . " / </b>";
                                                                       
                                                                    }
                                                                }

                                                                if ($SemesterID) {
                                                                    $subselect_menu1 = "SELECT SemesterEN FROM tblsemester WHERE SemesterID = $SemesterID";
                                                                    $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                                    if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                        echo "<b>" . $row_subdata1['SemesterEN'] . " / </b>";
                                                                    }
                                                                }

                                                                if ($ShiftID) {
                                                                    $subselect_menu1 = "SELECT ShiftEN FROM tblshift WHERE ShiftID = $ShiftID";
                                                                    $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                                    if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                        echo "<b>" . $row_subdata1['ShiftEN'] . " / </b>";
                                                                    }
                                                                }

                                                                if ($DegreeID) {
                                                                    $subselect_menu1 = "SELECT DegreeNameEN FROM tbldegree WHERE DegreeID = $DegreeID";
                                                                    $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                                    if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                        echo "<b>" . $row_subdata1['DegreeNameEN'] . " / </b>";
                                                                    }
                                                                }

                                                                if ($AcademicYearID) {
                                                                    $subselect_menu1 = "SELECT AcademicYear FROM tblacademicyear WHERE AcademicYearID = $AcademicYearID";
                                                                    $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                                    if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                        echo "<b>" . $row_subdata1['AcademicYear'] . " / </b>";
                                                                    }
                                                                }

                                                                if ($MajorID) {
                                                                    $subselect_menu1 = "SELECT MajorEN FROM tblmajor WHERE MajorID = $MajorID";
                                                                    $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                                    if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                        echo "<b>" . $row_subdata1['MajorEN'] . " / </b>";
                                                                    }
                                                                }

                                                                if ($BatchID) {
                                                                    $subselect_menu1 = "SELECT BatchEN FROM tblbatch WHERE BatchID = $BatchID";
                                                                    $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                                    if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                        echo "<b>" . $row_subdata1['BatchEN'] . " / </b>";
                                                                    }
                                                                }

                                                                if ($CampusID) {
                                                                    $subselect_menu1 = "SELECT CampusEN FROM tblcampus WHERE CampusID = $CampusID";
                                                                    $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                                                    if ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                        echo "<b>" . $row_subdata1['CampusEN'] . ".</b>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>
                                <!-- <div class="row">

                                <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                
                                                <label for="exampleInputUsername1">Schedule Date:</label>
                                                <b><?php echo isset($row['ScheduleDate']) ? $row['ScheduleDate'] : ''; ?></b>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->


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
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                                bootstrapdash.com
                                2020</span>
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By:
                                <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                    templates</a> from
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