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

            if (isset($_GET['edit_subjectfail'])) {
                $edit = $_GET['edit_subjectfail'];
                $query = "SELECT * FROM tblstudentstatus WHERE StudentID = $edit ";
                $result = mysqli_query($conn, $query);
                 $row = mysqli_fetch_assoc($result);
            } 

            // if (isset($_GET['edit_subjectfail'])) {
            //     $edit = $_GET['edit_subjectfail'];
                
                
            //     $select_main = "SELECT * FROM tblstudentstatus WHERE StudentID = $edit";
            //     $resultMain = mysqli_query($conn, $select_main);
            
            //     if ($resultMain) {
            //         $row = mysqli_fetch_assoc($resultMain);
            //         if ($row) {
            //             $StudentStatusID = $row['StudentStatusID'];
            //         } else {
            //             echo "No data found for the given StudentID.";
            //             exit;
            //         }
            //     } else {
            //         echo "Error executing query: " . mysqli_error($conn);
            //         exit;
            //     }
            // } else {
            //     echo "No StudentID provided.";
            //     exit;
            // }
        
            ?>
            

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Student Subject Fail Form</h4>
                                    <form class="form-sample" action="action.php" method="POST">

                                        <!-- <input type="hidden" name="SubjectFallID"
                                            value="<?php echo isset($row['SubjectFallID']) ? $row['SubjectFallID'] : '' ?>"> -->

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Student Status</label>
                                                        <select class="form-control border border-primary"
                                                            name="StudentStatusID" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected disabled value="">Please Select</option>
                                                            <?php
                                                            $select_mainmenu = "SELECT * FROM tblstudentstatus ";
                                                            $resultMain = mysqli_query($conn, $select_mainmenu);

                                                            while ($Main_row = mysqli_fetch_array($resultMain)) {
                                                                $StudentStatusID = $Main_row['StudentStatusID'];
                                                                $StudentID = $Main_row['StudentID'];
                                                                $ProgramID = $Main_row['ProgramID'];

                                                                $NameInKhmer = $NameInLatin = $YearEN = $SemesterEN = $ShiftEN = $DegreeNameEN = $AcademicYear = $MajorEN = $BatchEN = $CampusEN = '';

                                                                if (isset($StudentID)) {
                                                                    $subselect_menu11 = "SELECT * FROM tblstudentinfo WHERE StudentID = $StudentID";
                                                                    $subresultMenu11 = mysqli_query($conn, $subselect_menu11);
                                                                    if ($row_subdata11 = mysqli_fetch_assoc($subresultMenu11)) {
                                                                        $NameInKhmer = $row_subdata11['NameInKhmer'];
                                                                        $NameInLatin = $row_subdata11['NameInLatin'];
                                                                    }
                                                                }

                                                                if (isset($ProgramID)) {
                                                                    $subselect_menu12 = "SELECT * FROM tblprogram WHERE ProgramID = $ProgramID";
                                                                    $subresultMenu12 = mysqli_query($conn, $subselect_menu12);
                                                                    if ($Main_row12 = mysqli_fetch_assoc($subresultMenu12)) {
                                                                        $YearID = $Main_row12['YearID'];
                                                                        $SemesterID = $Main_row12['SemesterID'];
                                                                        $ShiftID = $Main_row12['ShiftID'];
                                                                        $DegreeID = $Main_row12['DegreeID'];
                                                                        $AcademicYearID = $Main_row12['AcademicYearID'];
                                                                        $MajorID = $Main_row12['MajorID'];
                                                                        $BatchID = $Main_row12['BatchID'];
                                                                        $CampusID = $Main_row12['CampusID'];

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
                                                                    }
                                                                }

                                                                $selected = ($Main_row['StudentStatusID'] == $row['StudentStatusID']) ? 'selected' : '';

                                                                echo "<option value='" . $StudentStatusID . "' $selected>
                                                            " . $StudentStatusID . " - " . $NameInKhmer . " - " . $NameInLatin . " / Program: " . $YearEN . " - " . $SemesterEN . " - " . $DegreeNameEN . " - " . $AcademicYear . " - " . $MajorEN . " - " . $BatchEN . " - " . $CampusEN . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <?php
                                                    $select_main = " SELECT * FROM tblstudentstatus Where StudentID= $StudentID";
                                                    $resultMain = mysqli_query($conn, $select_main);

                                                    while ($row = mysqli_fetch_array($resultMain)) {
                                                        $StudentStatusID = $row['StudentStatusID'];

                                                        if (isset($StudentStatusID)) {
                                                            $subselect_menu11 = "SELECT * FROM tblsubjectfall WHERE StudentStatusID = $StudentStatusID";
                                                            $subresultMenu11 = mysqli_query($conn, $subselect_menu11);
                                                            if ($row_subdata11 = mysqli_fetch_assoc($subresultMenu11)) {
                                                                $ScheduleID = $row_subdata11['ScheduleID'];
                                                              
                                                            }
                                                        }
                                                        ?>
                                                       
                                                        <div class="col-sm-12">
                                                            <label for="exampleInputUsername1">Schedule</label>
                                                            <select class="form-control border border-primary "
                                                                name="ScheduleID" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <option selected disabled value="">Please Select</option>
                                                                <?php
                                                                $select_mainmenu = "SELECT * FROM tblschedule ";
                                                                $resultMain = mysqli_query($conn, $select_mainmenu);

                                                                while ($Main_row = mysqli_fetch_array($resultMain)) {
                                                                    $ScheduleID = $Main_row['ScheduleID'];
                                                                    $SubjectID = $Main_row['SubjectID'];
                                                                    $LecturerID = $Main_row['LecturerID'];
                                                                    $ProgramID = $Main_row['ProgramID'];

                                                                    $SubjectEN = $LecturerName = $YearEN = $SemesterEN = $ShiftEN = $DegreeNameEN = $AcademicYear = $MajorEN = $BatchEN = $CampusEN = ' ';

                                                                    if (isset($SubjectID)) {
                                                                        $subselect_menu11 = "SELECT * FROM tblsubject WHERE SubjectID = $SubjectID";
                                                                        $subresultMenu11 = mysqli_query($conn, $subselect_menu11);
                                                                        if ($row_subdata11 = mysqli_fetch_assoc($subresultMenu11)) {
                                                                            $SubjectEN = $row_subdata11['SubjectEN'];
                                                                            $MajorID = $row_subdata11['MajorID'];
                                                                            $YearID = $row_subdata11['YearID'];
                                                                            $SemesterID = $row_subdata11['SemesterID'];

                                                                            if (isset($MajorID)) {
                                                                                $subselect_menu01 = "SELECT * FROM tblmajor WHERE MajorID = $MajorID";
                                                                                $subresultMenu01 = mysqli_query($conn, $subselect_menu01);
                                                                                if ($row_subdata01 = mysqli_fetch_assoc($subresultMenu01)) {
                                                                                    $MajorEN = $row_subdata01['MajorEN'];
                                                                                }
                                                                            }

                                                                            if (isset($YearID)) {
                                                                                $subselect_menu02 = "SELECT * FROM tblyear WHERE YearID = $YearID";
                                                                                $subresultMenu02 = mysqli_query($conn, $subselect_menu02);
                                                                                if ($row_subdata02 = mysqli_fetch_assoc($subresultMenu02)) {
                                                                                    $YearEN = $row_subdata02['YearEN'];
                                                                                }
                                                                            }

                                                                            if (isset($SemesterID)) {
                                                                                $subselect_menu03 = "SELECT * FROM tblsemester WHERE SemesterID = $SemesterID";
                                                                                $subresultMenu03 = mysqli_query($conn, $subselect_menu03);
                                                                                if ($row_subdata03 = mysqli_fetch_assoc($subresultMenu03)) {
                                                                                    $SemesterEN = $row_subdata03['SemesterEN'];
                                                                                }
                                                                            }
                                                                        }
                                                                    }

                                                                    if (isset($LecturerID)) {
                                                                        $subselect_menu13 = "SELECT * FROM tbllecturer WHERE LecturerID = $LecturerID";
                                                                        $subresultMenu13 = mysqli_query($conn, $subselect_menu13);
                                                                        if ($row_subdata13 = mysqli_fetch_assoc($subresultMenu13)) {
                                                                            $LecturerName = $row_subdata13['LecturerName'];



                                                                        }
                                                                    }

                                                                    if (isset($ProgramID)) {
                                                                        $subselect_menu12 = "SELECT * FROM tblprogram WHERE ProgramID = $ProgramID";
                                                                        $subresultMenu12 = mysqli_query($conn, $subselect_menu12);
                                                                        if ($Main_row12 = mysqli_fetch_assoc($subresultMenu12)) {
                                                                            $YearID = $Main_row12['YearID'];
                                                                            $SemesterID = $Main_row12['SemesterID'];
                                                                            $ShiftID = $Main_row12['ShiftID'];
                                                                            $DegreeID = $Main_row12['DegreeID'];
                                                                            $AcademicYearID = $Main_row12['AcademicYearID'];
                                                                            $MajorID = $Main_row12['MajorID'];
                                                                            $BatchID = $Main_row12['BatchID'];
                                                                            $CampusID = $Main_row12['CampusID'];

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
                                                                        }
                                                                    }

                                                                    $selected = ($Main_row['ScheduleID'] == $row_subdata11['ScheduleID']) ? 'selected' : '';

                                                                    echo "<option value='" . $ScheduleID . "' $selected>
                                                            " . $ScheduleID . " - Subject:" . $SubjectEN . " - Lecturer:" . $LecturerName . " / Program: " . $YearEN . " - " . $SemesterEN . " - " . $DegreeNameEN . " - " . $AcademicYear . " - " . $MajorEN . " - " . $BatchEN . " - " . $CampusEN . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php } ?>



                                              


                                            </div>


                                            
                                           
                                             

                                               
                                               
                                            <div class="col-md-4">
                                                <div class="form-group row">

                                               
                                               
                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Schedule Date</label>
                                                        <input type="date" class="form-control border border-primary "
                                                            id="exampleInputUsername1" placeholder="Start Date"
                                                            name="DateSubjectFall"
                                                            value="<?php echo isset($row['DateSubjectFall']) ? $row['DateSubjectFall'] : '' ?>">

                                                    </div>
                                          
                                                </div>
                                            </div>








                                            <!-- <a href="schedule.php"><button type="button" class="btn btn-danger">
                                            Cancel
                                        </button>
                                        </a> -->

                                            <button type="submit" class="btn btn-primary" name="c_subjectfail">
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