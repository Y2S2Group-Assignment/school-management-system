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

            // if (isset($_GET['edit_program'])) {
            //     $edit = $_GET['edit_program'];
            //     $query = "SELECT * FROM tblprogram WHERE ProgramID = $edit ";
            //     $result = mysqli_query($conn, $query);
            //     $row = mysqli_fetch_assoc($result);
            // }
            ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Student Program Report</h4>
                                    <form class="form-sample" action="action.php" method="POST">

                                        <!-- <input type="hidden" name="ProgramID"
                                            value="<?php echo isset($row['ProgramID']) ? $row['ProgramID'] : '' ?>"> -->

                                        <div class="row pt-3">

                                            <div class="col-md-2">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Batch</label>
                                                        <select class="form-control border border-primary "
                                                            id="batchSelect" name="BatchID" id="floatingSelect"
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

                                            <div class="col-md-2">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Major</label>
                                                        <select class="form-control border border-primary "
                                                            id="majorSelect" name="MajorID" id="floatingSelect"
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

                                            <div class="col-md-2">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Shift</label>
                                                        <select class="form-control border border-primary "
                                                            id="shiftSelect" name="ShiftID" id="floatingSelect"
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
                                            <div class="col-md-2">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Degree</label>
                                                        <select class="form-control border border-primary "
                                                            id="degreeSelect" name="DegreeID" id="floatingSelect"
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

                                            <div class="col-md-2">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="exampleInputUsername1">Campus</label>
                                                        <select class="form-control border border-primary "
                                                            id="campusSelect" name="CampusID" id="floatingSelect"
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
                                        </div>

                                        <div class="row">
                                           




                                        </div>




                                        <!-- <a href="stuproList.php"><button type="button" class="btn btn-danger">
                                            Cancel
                                        </button>
                                        </a>

                                        <button type="submit" class="btn btn-primary"  name="c_stuprogram">
                                            Submit
                                        </button> -->

                                    </form>
                                    <button type='button' id='exportButton'
                                        class='btn btn-primary w-15 float-right'>Save as PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="showReport" class="reportContent">

                    </div>


                    <!-- row end -->

                </div>
                <!-- row end -->
            </div>

        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script>
        $(document).ready(function () {
            function fetchPrograms() {
                var batchID = $('#batchSelect').val();
                var majorID = $('#majorSelect').val();
                var shiftID = $('#shiftSelect').val();
                var degreeID = $('#degreeSelect').val();
                var campusID = $('#campusSelect').val();


                if (batchID && majorID && shiftID && degreeID && campusID) {
                    $.ajax({
                        url: './report/fetchprogram.php',
                        type: 'POST',
                        data: { batchID: batchID, majorID: majorID, shiftID: shiftID, degreeID: degreeID, campusID: campusID },
                        success: function (response) {
                            $('#showReport').html(response);
                        }
                    });
                }
            }

            $('#batchSelect, #majorSelect , #shiftSelect, #degreeSelect,#campusSelect').change(function () {
                fetchPrograms();
            });
        });


        document.addEventListener('DOMContentLoaded', function () {
            const exportButton = document.getElementById('exportButton');
            if (exportButton) {
                exportButton.addEventListener('click', function () {
                    console.log('Button clicked'); // Debugging line
                    generatePDF();
                });
            } else {
                console.error('Export button not found');
            }
        });

        function generatePDF() {
            html2canvas(document.querySelector(".reportContent"), {
                scale: 2, // Increase the scale to improve resolution
                useCORS: true // Enable cross-origin resource sharing
            }).then(canvas => {
                console.log('Canvas captured:', canvas); // Debugging line

                // Check if jsPDF is available globally or from another source
                if (typeof jsPDF !== 'undefined') {
                    const imgData = canvas.toDataURL('image/png');
                    const pdf = new jsPDF('landscape');
                    const imgWidth = 297; // A4 paper width in mm
                    const pageHeight = 210; // A4 paper height in mm
                    const imgHeight = canvas.height * imgWidth / canvas.width;
                    let heightLeft = imgHeight;
                    let position = 0;

                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;

                    while (heightLeft >= 0) {
                        position = heightLeft - imgHeight;
                        pdf.addPage();
                        pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                        heightLeft -= pageHeight;
                    }

                    console.log('PDF generated successfully'); // Debugging line
                    pdf.save("Student_Achievement_Report.pdf");
                } else {
                    console.error('jsPDF is not defined');
                }
            }).catch(error => {
                console.error('Error capturing canvas or generating PDF:', error);
            });
        }

    </script>

</body>

</html>