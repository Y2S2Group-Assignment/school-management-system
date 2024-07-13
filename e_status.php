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
            $Main_row = mysqli_fetch_assoc($result);

            $StudentStatusID = $Main_row['StudentStatusID'];
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


                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <h4 class="card-title">Students Status</h4>

                                            <form class="forms-sample pt-4" action="statusaction.php" method="POST">
                                                <input type="hidden" name="StudentStatusID">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Select
                                                                Program</label>
                                                            <div class="col-sm-9">
                                                                <!-- Program selection dropdown -->
                                                                <select required class="form-control form-control-sm border-primary"
                                                                    name="ProgramID" id="selectID">
                                                                    <option selected disabled>Select Program</option>
                                                                    <?php
                                                                    $result = mysqli_query($conn, "SELECT * FROM tblprogram ORDER BY YearID ASC, SemesterID ASC");
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
                                                                        $YearNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT YearEN FROM tblyear WHERE YearID = $YearID"))['YearEN'] ?? '';
                                                                        $SemesterNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SemesterEN FROM tblSemester WHERE SemesterID = $SemesterID"))['SemesterEN'] ?? '';
                                                                        $ShiftNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ShiftEN FROM tblShift WHERE ShiftID = $ShiftID"))['ShiftEN'] ?? '';
                                                                        $DegreeNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT DegreeNameEN FROM tblDegree WHERE DegreeID = $DegreeID"))['DegreeNameEN'] ?? '';
                                                                        $AcademicYear = mysqli_fetch_assoc(mysqli_query($conn, "SELECT AcademicYear FROM tblAcademicYear WHERE AcademicYearID = $AcademicYearID"))['AcademicYear'] ?? '';
                                                                        $MajorNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MajorEN FROM tblMajor WHERE MajorID = $MajorID"))['MajorEN'] ?? '';
                                                                        $BatchNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT BatchEN FROM tblBatch WHERE BatchID = $BatchID"))['BatchEN'] ?? '';
                                                                        $CampusNameEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT CampusEN FROM tblCampus WHERE CampusID = $CampusID"))['CampusEN'] ?? '';

                                                                        $selected = ($row['ProgramID'] == $Main_row['ProgramID']) ? 'selected' : '';
                                                                        echo "<option value='{$row["ProgramID"]}' $selected>{$MajorNameEN} [{$DegreeNameEN}] - [{$BatchNameEN}] - [{$ShiftNameEN}] - [{$YearNameEN}] - [{$SemesterNameEN}] - [{$AcademicYear}] [Start: {$StartDate} End: {$EndDate}]</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Assign Date</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" required name="AssignDate"
                                                                    value="<?php echo $Main_row['AssignDate'] ?>"
                                                                    class="form-control form-control-sm border-primary" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Note</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control form-control-sm border-primary" name="Note"
                                                                    value="<?php echo $Main_row['Note'] ?>"
                                                                    id="exampleTextarea1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function () {
                                                        var StudentStatusID = <?php echo json_encode($StudentStatusID); ?>;

                                                        // Check if StudentStatusID is defined and valid
                                                        if (StudentStatusID) {
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: './edit/editStatus.php',
                                                                data: { id: StudentStatusID },
                                                                success: function (data) {
                                                                    $('#editStudents').html(data); // Populate #editStudents with the data returned from editStatus.php
                                                                },
                                                                error: function (jqXHR, textStatus, errorThrown) {
                                                                    console.error('AJAX Error:', textStatus, errorThrown);
                                                                }
                                                            });
                                                        } else {
                                                            console.error('StudentStatusID is not defined');
                                                        }
                                                    });
                                                </script>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="table-responsive">
                                                            <label class="form-label">Select Student</label>
                                                            <div class="table-responsive">
                                                            <table
                                                                class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Assign</th>
                                                                        <th>ID</th>
                                                                        <th>Name In Khmer</th>
                                                                        <th>Name In Latin</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="editStudents">

                                                                </tbody>
                                                            </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br />
                                                <div class="pt-5">
                                                    <a href="statusList.php">
                                                        <button type="button" name="btnCancel"
                                                        class="btn btn-danger">Cancel</button>
                                                    </a>
                                                    <button type="submit" name="btnEdit" class="btn btn-primary">Save
                                                        Change</button>
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