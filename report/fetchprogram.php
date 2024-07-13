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

if (isset($_POST['batchID'])  && isset($_POST['majorID']) && isset($_POST['shiftID']) && isset($_POST['degreeID']) && isset($_POST['campusID']) ) {
    $batchID = $_POST['batchID'];
    $majorID = $_POST['majorID'];
    $degreeID = $_POST['degreeID'];
    $shiftID = $_POST['shiftID'];
    $campusID = $_POST['campusID'];
   

    // Prepare the SQL query
    $query = "
        SELECT 
            tblyear.YearEN,
            tblsemester.SemesterEN,  
            tblshift.ShiftEN,
          
            tbldegree.DegreeNameEN,
            tblacademicyear.AcademicYear,
            tblmajor.MajorEN,
            tblbatch.BatchEN,
            tblcampus.CampusEN,
              tblprogram.StartDate,
            tblprogram.EndDate
          
        FROM tblprogram
        JOIN tblyear ON tblprogram.YearID = tblyear.YearID
        JOIN tblsemester ON tblprogram.SemesterID = tblsemester.SemesterID
        JOIN tblshift ON tblprogram.ShiftID = tblshift.ShiftID
        JOIN tbldegree ON tblprogram.DegreeID = tbldegree.DegreeID
        JOIN tblacademicyear ON tblprogram.AcademicYearID = tblacademicyear.AcademicYearID
        JOIN tblmajor ON tblprogram.MajorID = tblmajor.MajorID
        JOIN tblbatch ON tblprogram.BatchID = tblbatch.BatchID
        JOIN tblcampus ON tblprogram.CampusID = tblcampus.CampusID
       
        WHERE tblprogram.BatchID = ? AND tblprogram.MajorID = ? AND tblprogram.ShiftID = ? AND tblprogram.DegreeID = ? AND tblprogram.CampusID = ?
    ";

    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('iiiii', $batchID, $majorID, $shiftID, $degreeID, $campusID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Fetch all rows
            // $rows = [];
            // while ($row = $result->fetch_assoc()) {
            //     $rows[] = $row;
            // }

            // Calculate rowspan for YearEN, SemesterEN, and BatchEN, DegreeNameEN
          

            // Check if the result set is empty
            if ($result->num_rows > 0) {
                // Output the table header once
                echo "
                    <div class='col-lg-12 grid-margin stretch-card'>
                        <div class='card'>
                            <div class='card-body'>
                                <form>
                                   
                                   
                                    <div id='reportContent'>
                                     <b><u><h4 class='text-center p-4'>BIU Student Program Report</h4></u></b>
                                        <table class='table table-striped pt-5' >
                                            <thead>
                                                <tr >
                                                    <th><b>Year</b></th>
                                                    <th><b>Semester</b></th>
                                                     <th><b>Shift</b></th>
                                                    <th><b>Degree</b></th>
                                                    <th><b>AcademicYear</b></th>
                                                    <th><b>Major</b></th>
                                                    <th><b>Batch</b></th>
                                                    <th><b>Campus</b></th>
                                                    <th><b>Start Date</b></th>
                                                    <th><b>End Date</b></th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>";

                // Loop through rows and output table rows with calculated rowspan
                // foreach($rows as $row){
                    while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                   
                    <td class=''>{$row['YearEN']}</td>
                          <td  class=''>{$row['SemesterEN']}</td>
                          <td  class=''>{$row['ShiftEN']}</td>
                          <td  class=''>{$row['DegreeNameEN']}</td>
                          <td  class=''>{$row['AcademicYear']} </td>
                           <td  class=''>{$row['MajorEN']} </td>
                            <td  class=''>{$row['BatchEN']} </td>
                            <td  class=''>{$row['CampusEN']} </td>
                            <td  class=''>{$row['StartDate']} </td>
                            <td  class=''>{$row['EndDate']} </td>
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
                    <p style='color: red;'>No Program ID provided.</p>
                </div>
            </div>
        </div>";
}

$conn->close();

?>


</body>
<script>
       

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











