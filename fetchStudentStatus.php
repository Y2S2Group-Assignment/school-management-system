


<?php
include './connection/conn.php';




// if (isset($_POST['ProgramID']) && isset($_POST['ScheduleID'])) {
//     $programID = $_POST['ProgramID'];
//     $scheduleID = $_POST['ScheduleID'];

//     // Prepare the SQL query
//     $query = "
//         SELECT 
//             tblstudentinfo.StudentID,
//             tblstudentstatus.StudentStatusID,
//             tblstudentinfo.NameInKhmer, 
//             tblstudentinfo.NameInLatin 
//         FROM tblstudentinfo
//         JOIN tblstudentstatus 
//             ON tblstudentinfo.StudentID = tblstudentstatus.StudentID
//         JOIN tblschedule
//             ON tblschedule.ProgramID = tblstudentstatus.ProgramID
//         WHERE tblstudentstatus.ProgramID = ? AND tblschedule.ScheduleID = ? AND tblstudentstatus.status = 1
//     ";

//     // Prepare the statement
//     $stmt = $conn->prepare($query);

//     if ($stmt) {
//         // Bind parameters
//         $stmt->bind_param('ii', $programID, $scheduleID);

//         // Execute the statement
//         if ($stmt->execute()) {
//             // Get the result
//             $result = $stmt->get_result();
//             $i = 1;

//             // Loop through results and output table rows
//             while ($row = $result->fetch_assoc()) {
//                 // Check if StudentStatusID exists in tblsubjectfall with the given ScheduleID
//                 $checkQuery = "
//                     SELECT 1
//                     FROM tblsubjectfall
//                     WHERE StudentStatusID = ? AND ScheduleID = ?
//                     LIMIT 1
//                 ";
//                 $checkStmt = $conn->prepare($checkQuery);
//                 $checkStmt->bind_param('ii', $row['StudentStatusID'], $scheduleID);
//                 $checkStmt->execute();
//                 $checkResult = $checkStmt->get_result();
//                 $isChecked = $checkResult->num_rows > 0 ? 'checked' : '';

//                 echo "<div class='col-lg-12 grid-margin stretch-card'>
//             <div class='card'>
//                 <div class='card-body'>
//                     <h4 class='card-title'>Student Status</h4>

//                     <div class='table-responsive'>
//                         <table class='table table-hover'>
//                             <thead>
//                                 <tr>
//                                     <th>Check</th>
//                                     <th>N0.</th>
//                                     <th>Name In Khmer</th>
//                                     <th>Name In Latin</th>
//                                     <th>Status</th>
//                                 </tr>
//                             </thead>
//                              <tbody>
//                 <tr>
//                         <td>
//                             <input type='hidden' name='StudentStatusID[{$row['StudentID']}]' value='{$row['StudentStatusID']}'>
//                             <input type='checkbox' name='StudentStatusCheckbox[{$row['StudentID']}]' value='1' $isChecked>
//                         </td>
//                         <td>{$i}</td>
//                         <td>{$row['NameInKhmer']}</td>
//                         <td>{$row['NameInLatin']}</td>
//                         <td>Agree</td>
//                     </tr>
                    
//                             </tbody>
//                         </table>
//                     </div>
//                 </div>
//             </div>
//         </div>";
//                 $i++;
//                 $checkStmt->close();
//             }
         
//         } else {
//             // Error executing statement
//             echo "<tr><td colspan='5'>Error executing statement: " . $stmt->error . "</td></tr>";
//         }

//         // Close the statement
//         $stmt->close();
//     } else {
//         // Error preparing statement
//         echo "<tr><td colspan='5'>Error preparing statement: " . $conn->error . "</td></tr>";
//     }
// } else {
//     // No Program ID or Schedule ID provided
//     echo "<tr><td colspan='5'>No Program ID or Schedule ID provided.</td></tr>";
// }

// // Close the database connection
// $conn->close();



if (isset($_POST['ProgramID']) && isset($_POST['ScheduleID'])) {
    $programID = $_POST['ProgramID'];
    $scheduleID = $_POST['ScheduleID'];

    // Prepare the SQL query
    $query = "
        SELECT 
            tblstudentinfo.StudentID,
            tblstudentstatus.StudentStatusID,
            tblstudentinfo.NameInKhmer, 
            tblstudentinfo.NameInLatin 
        FROM tblstudentinfo
        JOIN tblstudentstatus 
            ON tblstudentinfo.StudentID = tblstudentstatus.StudentID
        JOIN tblschedule
            ON tblschedule.ProgramID = tblstudentstatus.ProgramID
        WHERE tblstudentstatus.ProgramID = ? AND tblschedule.ScheduleID = ? AND tblstudentstatus.Assigned = 1
        AND tblstudentstatus.Status = 1
    ";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param('ii', $programID, $scheduleID);

        // Execute the statement
        if ($stmt->execute()) {
            // Get the result
            $result = $stmt->get_result();
            $i = 1;

            if ($result->num_rows > 0) {
            // Output the table header once
            echo "<div class='col-lg-12 grid-margin stretch-card'>
                    <div class='card'>
                        <div class='card-body'>
                            <h4 class='card-title'>Student Status</h4>
                            <div class='table-responsive'>
                                <table class='table table-hover'>
                                    <thead>
                                        <tr>
                                            <th>Check</th>
                                            <th>No.</th>
                                            <th>Name In Khmer</th>
                                            <th>Name In Latin</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

            // Loop through results and output table rows
            while ($row = $result->fetch_assoc()) {
              // Check if StudentStatusID exists in tblsubjectfall with the given ScheduleID
              $checkQuery = "
                  SELECT 1
                  FROM tblsubjectfall
                  WHERE StudentStatusID = ? AND ScheduleID = ? AND Assigned = 1
                  LIMIT 1
              ";
              $checkStmt = $conn->prepare($checkQuery);
              $checkStmt->bind_param('ii', $row['StudentStatusID'], $scheduleID);
              $checkStmt->execute();
              $checkResult = $checkStmt->get_result();
              $isChecked = $checkResult->num_rows > 0 ? 'checked' : '';
              $checkStmt->close();
          
              echo "<tr>
                      <td>
                          <input type='hidden' name='StudentStatusID[{$row['StudentID']}]' value='{$row['StudentStatusID']}'>
                          <input type='checkbox' name='StudentStatusCheckbox[{$row['StudentID']}]' value='1' $isChecked>
                      </td>
                      <td>{$i}</td>
                      <td>{$row['NameInKhmer']}</td>
                      <td>{$row['NameInLatin']}</td>
                      <td>Agree</td>
                  </tr>";
          
              $i++;
          }

                        echo "</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>";
        }else{
            echo "<div class='col-lg-12 grid-margin stretch-card'>
            <div class='card'>
              <div class='card-body'>
                <p  style='color: red;'>No data exists for the selected program and schedule.</p>
              </div>
            </div>
          </div>";
        }

           

        } else {
            // Error executing statement
            echo "<div class='col-lg-12 grid-margin stretch-card'>
                    <div class='card'>
                      <div class='card-body'>
                        <p>Error executing statement: " . $stmt->error . "</p>
                      </div>
                    </div>
                  </div>";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error preparing statement
        echo "<div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <p>Error preparing statement: " . $conn->error . "</p>
                  </div>
                </div>
              </div>";
    }
} else {
    // No Program ID or Schedule ID provided
    echo "<div class='col-lg-12 grid-margin stretch-card'>
            <div class='card'>
              <div class='card-body'>
                <p>No Program ID or Schedule ID provided.</p>
              </div>
            </div>
          </div>";
}

// Close the database connection
$conn->close();
?>






