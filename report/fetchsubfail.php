<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <title>Document</title>
</head>
<body>
<?php
include '../connection/conn.php';


if (isset($_POST['batchID']) && isset($_POST['majorID']) && isset($_POST['shiftID'])
 && isset($_POST['degreeID']) && isset($_POST['campusID']) && isset($_POST['yearID']) && isset($_POST['semesterID'])) {
    $batchID = $_POST['batchID'];
    $majorID = $_POST['majorID'];
    $shiftID = $_POST['shiftID'];
    $degreeID = $_POST['degreeID'];
    $campusID = $_POST['campusID'];
    $yearID = $_POST['yearID'];
    $semesterID = $_POST['semesterID'];
    // Add the ProgramID variable, you might need to modify this if you have a different way to get the ProgramID
    $programID = 1; // Replace this with the actual way you get ProgramID if necessary

    // Prepare the SQL query
    $query = "
        SELECT 
            tblstudentinfo.StudentID,
            tblstudentinfo.NameInLatin,  
            tblsex.SexEN,
            tbltime.TimeName,
            tbltime.ShiftID,
            tbldayweek.DayWeekID,
            tblschedule.ScheduleID,
            tblyear.YearEN,
            tblsemester.SemesterEN,
            tblmajor.MajorEN,
            tblbatch.BatchEN,
            tbldegree.DegreeNameEN,
            tblsubjectfall.DateSubjectFall,
            tblsubject.SubjectEN,
            tbllecturer.LecturerEN
        FROM tblsubjectfall
        JOIN tblstudentstatus ON tblsubjectfall.StudentStatusID = tblstudentstatus.StudentStatusID
        JOIN tblschedule ON tblsubjectfall.ScheduleID = tblschedule.ScheduleID
        JOIN tblstudentinfo ON tblstudentstatus.StudentID = tblstudentinfo.StudentID
        JOIN tblsex ON tblstudentinfo.SexID = tblsex.SexID
        JOIN tblprogram ON tblsubjectfall.ProgramID = tblprogram.ProgramID
        JOIN tblbatch ON tblprogram.BatchID = tblbatch.BatchID
        JOIN tbldegree ON tblprogram.DegreeID = tbldegree.DegreeID
        JOIN tblmajor ON tblprogram.MajorID = tblmajor.MajorID
        JOIN tblyear ON tblprogram.YearID = tblyear.YearID
        JOIN tblsemester ON tblprogram.SemesterID = tblsemester.SemesterID
        JOIN tblsubject ON tblschedule.SubjectID = tblsubject.SubjectID
        JOIN tbllecturer ON tblschedule.LecturerID = tbllecturer.LecturerID
        JOIN tbldayweek ON tblschedule.DayWeekID = tbldayweek.DayWeekID
        JOIN tbltime ON tblschedule.TimeID = tbltime.TimeID
        WHERE tblprogram.BatchID = ? AND tblprogram.MajorID = ? AND tblprogram.ShiftID = ? 
        AND tblprogram.DegreeID = ? AND tblprogram.YearID = ? AND tblprogram.SemesterID = ? 
        AND tblprogram.CampusID = ? AND tblsubjectfall.Assigned = 1 AND tblsubjectfall.Assigned = 1
    ";

    $stmt = $conn->prepare($query);

    if ($stmt) {
        // Corrected bind_param to match the number of placeholders in the query
        $stmt->bind_param('iiiiiii', $batchID, $majorID, $shiftID, $degreeID, $yearID, $semesterID, $campusID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Fetch all rows
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }

            // Calculate rowspan for YearEN, SemesterEN, and BatchEN, DegreeNameEN
            $rowspanData = [];
            foreach ($rows as $index => $row) {
                $key = $row['YearEN'] . '-' . $row['SemesterEN'] . '-' . $row['BatchEN'] . '-' . $row['DegreeNameEN'];
                if (!isset($rowspanData[$key])) {
                    $rowspanData[$key] = [
                        'count' => 0,
                        'startIndex' => $index
                    ];
                }
                $rowspanData[$key]['count']++;
            }

            // Check if the result set is empty
            if ($result->num_rows > 0) {
                // Output the table header once
                echo "
                    <div class='col-lg-12 grid-margin stretch-card'>
                        <div class='card'>
                            <div class='card-body'>
                                <form>
                                    <div id='reportContent'>
                                     <b><u><h4 class='text-center p-4'>BIU Student Subject Fail Report</h4></u></b>
                                        <table class='table table-bordered pt-5' >
                                            <thead>
                                                <tr >
                                                    <th><b>Year</b></th>
                                                    <th><b>Semester</b></th>
                                                    <th><b>Major</b></th>
                                                    <th><b>Academic Title</b></th>
                                                    <th><b>StudentID</b></th>
                                                    <th><b>Name</b></th>
                                                    <th><b>Gender</b></th>
                                                    <th><b>Date</b></th>
                                                    <th><b>Subject Fail</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>";

                // Loop through rows and output table rows with calculated rowspan
                foreach ($rows as $index => $row) {
                    $key = $row['YearEN'] . '-' . $row['SemesterEN'] . '-' . $row['BatchEN'] . '-' . $row['DegreeNameEN'];
                    $rowspan = $rowspanData[$key]['count'];
                    $startIndex = $rowspanData[$key]['startIndex'];

                    echo "<tr>";
                    if ($index == $startIndex) {
                        echo "<td rowspan='{$rowspan}'>{$row['YearEN']}</td>";
                        echo "<td rowspan='{$rowspan}'>{$row['SemesterEN']}</td>";
                        echo "<td rowspan='{$rowspan}'>{$row['MajorEN']}</td>";
                        echo "<td rowspan='{$rowspan}'>{$row['BatchEN']} <br> {$row['DegreeNameEN']}</td>";
                    }
                    echo "<td class='table-active text-center'>{$row['StudentID']}.</td>
                          <td  class='table-active'>{$row['NameInLatin']}</td>
                          <td  class='table-active'>{$row['SexEN']}</td>
                          <td  class='table-active'>{$row['DateSubjectFall']}</td>
                          <td  class='table-active'>{$row['SubjectEN']} <br/>Lecturer: {$row['LecturerEN']}</td>
                      </tr>";
                }

                echo "</tbody></table></div></form></div></div></div>";

            } else {
                echo "<div class='col-lg-12 grid-margin stretch-card'>
                        <div class='card'>
                            <div class='card-body'>
                                <p style='color: red;'>No data exists for the selected program.</p>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "<div class='col-lg-12 grid-margin stretch-card'>
                    <div class='card'>
                        <div class='card-body'>
                            <p style='color: red;'>Error executing statement: " . $stmt->error . "</p>
                        </div>
                    </div>
                </div>";
        }
        $stmt->close();
    } else {
        echo "<div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                    <div class='card-body'>
                        <p style='color: red;'>Error preparing statement: " . $conn->error . "</p>
                    </div>
                </div>
            </div>";
    }
} else {
    echo "<div class='col-lg-12 grid-margin stretch-card'>
            <div class='card'>
                <div class='card-body'>
                    <p style='color: red;'>Missing required parameters.</p>
                </div>
            </div>
        </div>";
}

$conn->close();

?>


</body>
<script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const exportButton = document.getElementById('#exportButton');
        //     if (exportButton) {
        //         exportButton.addEventListener('click', function() {
        //             console.log('Button clicked'); // Debugging line
        //             console.log('Button clicked'); // Debugging line
        //             generatePDF();
        //         });
        //     } else {
        //         console.error('Export button not found');
        //     }
        // });

        // function generatePDF() {
        //     html2canvas(document.querySelector("#reportContent"), {
        //         scale: 2, // Increase the scale to improve resolution
        //         useCORS: true // Enable cross-origin resource sharing
        //     }).then(canvas => {
        //         console.log('Canvas captured'); // Debugging line
        //         console.log(canvas); // Log canvas for inspection
        //         const imgData = canvas.toDataURL('image/png');
        //         const pdf = new jsPDF('landscape');
        //         const imgWidth = 297; // A4 paper width in mm
        //         const pageHeight = 210; // A4 paper height in mm
        //         const imgHeight = canvas.height * imgWidth / canvas.width;
        //         let heightLeft = imgHeight;
        //         let position = 0;

        //         pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
        //         heightLeft -= pageHeight;

        //         while (heightLeft >= 0) {
        //             position = heightLeft - imgHeight;
        //             pdf.addPage();
        //             pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
        //             heightLeft -= pageHeight;
        //         }

        //         console.log('PDF generated successfully'); // Debugging line
        //         pdf.save("Student_Achievement_Report.pdf");
        //     }).catch(error => {
        //         console.error('Error capturing canvas or generating PDF:', error);
        //     });
        // }

      document.addEventListener('DOMContentLoaded', function() {
  const exportButton = document.getElementById('exportButton');
  if (exportButton) {
    exportButton.addEventListener('click', function() {
      console.log('Button clicked'); // Debugging line
      generatePDF();
    });
  } else {
    console.error('Export button not found');
  }
});

function generatePDF() {
  html2canvas(document.querySelector("#reportContent"), {
    scale: 2, // Increase the scale to improve resolution
    useCORS: true // Enable cross-origin resource sharing
  }).then(canvas => {
    console.log('Canvas captured:', canvas); // Debugging line

    // Access jsPDF directly from window object, adjust as per your version or source
    const jsPDF = window.jspdf.jsPDF; // Modify this line as needed

    if (jsPDF) {
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
</html>











