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

        // if (isset($_GET['edit_status'])) {
        //     $edit = $_GET['edit_status'];
        //     $query = "SELECT * FROM tblstudentstatus WHERE StudentStatusID = $edit ";
        //     $result = mysqli_query($conn, $query);
        //     $row = mysqli_fetch_assoc($result);
        // }
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


                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <h4 class="card-title">Student Subject Fail</h4>
                                            <?php
                                            alertMessage();
                                            ?>
                                            <hr>

                                            <form class="forms-sample pt-4" action="statusaction.php" method="POST">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"> Select
                                                                Program</label>
                                                            <div class="col-sm-9">
                                                                <?php
                                                                // $select_content = "SELECT * FROM tblprogram ORDER BY YearID ASC";
                                                                $select_content = "SELECT * FROM tblprogram ORDER BY YearID ASC, SemesterID ASC";

                                                                $result = mysqli_query($conn, $select_content);
                                                                ?>

                                                                <select required
                                                                    class="form-control form-control-sm border-primary"
                                                                    name="ProgramID" id="selectID">
                                                                    <option selected disabled> Select Program</option>
                                                                    <?php
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        $YearID = $row['YearID'];
                                                                        $SemesterID = $row['SemesterID'];
                                                                        $ShiftID = $row['ShiftID'];
                                                                        $DegreeID = $row['DegreeID'];
                                                                        $AcademicYearID = $row['AcademicYearID'];
                                                                        $MajorID = $row['MajorID'];
                                                                        $BatchID = $row['BatchID'];
                                                                        $CampusID = $row['CampusID'];
                                                                        $StartDate = $row['StartDate'];
                                                                        $EndDate = $row['EndDate'];
                                                                        $CreatedDate = $row['CreatedDate'];

                                                                        $YearNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT YearEN FROM tblyear WHERE YearID = $YearID"))['YearEN'] ?? '';
                                                                        $SemesterNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SemesterEN FROM tblSemester WHERE SemesterID = $SemesterID"))['SemesterEN'] ?? '';
                                                                        $ShiftNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ShiftEN FROM tblShift WHERE ShiftID = $ShiftID"))['ShiftEN'] ?? '';
                                                                        $DegreeNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT DegreeNameEN FROM tblDegree WHERE DegreeID = $DegreeID"))['DegreeNameEN'] ?? '';
                                                                        $AcademicYear = mysqli_fetch_assoc(mysqli_query($conn, "SELECT AcademicYear FROM tblAcademicYear WHERE AcademicYearID = $AcademicYearID"))['AcademicYear'] ?? '';
                                                                        $MajorNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MajorEN FROM tblMajor WHERE MajorID = $MajorID"))['MajorEN'] ?? '';
                                                                        $BatchNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT BatchEN FROM tblBatch WHERE BatchID = $BatchID"))['BatchEN'] ?? '';
                                                                        $CampusNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT CampusEN FROM tblCampus WHERE CampusID = $CampusID"))['CampusEN'] ?? '';
                                                                        ?>
                                                                        <!-- <option value="<?php echo $row["ProgramID"]; ?>" <?php echo $selected; ?>> -->
                                                                        <option value="<?php echo $row["ProgramID"]; ?>">
                                                                            <?php echo $MajorNameEN
                                                                                . " [" . $DegreeNameEN . "]"
                                                                                . "-[" . $BatchNameEN . "]"
                                                                                . "-[" . $ShiftNameEN . "]"
                                                                                . "-[" . $YearNameEN . "]"
                                                                                . "-[" . $SemesterNameEN . "]"
                                                                                . "-[" . $AcademicYear . "] "
                                                                                . "  [Start: " . $StartDate . " "
                                                                                . " End: " . $EndDate . " "
                                                                                //   . " Created: " . $CreatedDate . "]"
                                                                                ?>
                                                                        </option>
                                                                        <!-- &nbsp;<br/> -->
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>


                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"> Select Schedule
                                                            </label>
                                                            <div class="col-sm-9">


                                                                <select required
                                                                    class="form-control form-control-sm selectStatus border-primary"
                                                                    name="ScheduleID" id="showSchedule">

                                                                </select>


                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Date</label>
                                                            <div class="col-sm-9">
                                                                <?php $current_date = date("Y-m-d"); ?>
                                                                <input type="date" required name="DateSubjectFall"
                                                                    value="<?php echo $current_date ?>"
                                                                    class="form-control form-control-sm border-primary" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" id="showStatus">
                                                    <!-- <div class="col-lg-12 grid-margin stretch-card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Student Status</h4>

                                                                <div class="table-responsive">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Check</th>
                                                                                <th>N0.</th>
                                                                                <th>Name In Khmer</th>
                                                                                <th>Name In Latin</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody >

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="col-lg-6 grid-margin stretch-card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Schedule</h4>

                                                                <div class="table-responsive">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Check</th>
                                                                                <th>N0.</th>
                                                                                <th>Lecturer</th>
                                                                                <th>Subject</th>
                                                                              
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="showschedule">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                </div>
                                                <br />
                                                <div>
                                                    <a href="./subfailList.php">
                                                        <button type="button" name="btnCancel"
                                                            class="btn btn-danger">Cancel</button>
                                                    </a>
                                                    <button type="submit" name="btnsubjectfail"
                                                        class="btn btn-primary">Save</button>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
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
<script>
    $(document).ready(function () {
        $('#selectID').on('change', function () { // Listen for change event on #selectID
            var ProgramID = $(this).val(); // Get the selected ProgramID
            console.log("Selected ProgramID:", ProgramID); // Debugging output
            $.ajax({
                type: 'POST',
                url: 'fetchSchedule.php',
                data: { id: ProgramID },
                success: function (data) {
                    $('#showSchedule').html(data); // Populate #showSchedule with options returned from fetchSchedule.php
                    // Attach the ProgramID to the showSchedule dropdown for later use
                    $('#showSchedule').data('program-id', ProgramID);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching schedules:', textStatus, errorThrown);
                    $('#showSchedule').html('<option selected disabled value="">Error fetching schedules</option>');
                }
            });
        });
        // $('.selectStatus').on('change', function () { // Listen for change event on #selectID
        //     var ProgramID = $(this).val(); // Get the selected ProgramID
        //     console.log("Selected ProgramID:", ProgramID); // Debugging output
        //     $.ajax({
        //         type: 'POST',
        //         url: 'fetchStudentStatus.php',
        //         data: { id: ProgramID },
        //         success: function (data) {
        //             $('#showStatus').html(data); // Populate #show with options returned from fetchStudent.php
        //         }
        //     });

        // });



        //     $('.selectStatus').on('change', function() {
        //     var programID = $(this).val();
        //     console.log("Selected ProgramID:", programID);

        //     $.ajax({
        //         type: 'POST',
        //         url: 'fetchStudentStatus.php',
        //         data: { id: programID },
        //         success: function(data) {
        //             $('#showStatus').html(data); // Populate #showStatus with the data returned
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.error('Error fetching status:', textStatus, errorThrown);
        //             $('#showStatus').html('<p>An error occurred while fetching the status. Please try again later.</p>');
        //         }
        //     });
        // });

        //Fetch student status when a schedule is selected
        $('.selectStatus').on('change', function () {
            var ScheduleID = $(this).val(); // Get selected ScheduleID
            var ProgramID = $('#selectID').val();
            console.log("Selected ScheduleID:", ScheduleID);

            // Make AJAX request to fetch student status
            $.ajax({
                type: 'POST',
                url: 'fetchStudentStatus.php',
                data: { ProgramID: ProgramID, ScheduleID: ScheduleID }, // Send ProgramID and ScheduleID
                success: function (data) {
                    $('#showStatus').html(data); // Populate tbody of #showStatus with returned data
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching status:', textStatus, errorThrown);
                    $('#showStatus').html('<tr><td colspan="5">An error occurred while fetching the status. Please try again later.</td></tr>');
                }
            });
        });

    });
</script>