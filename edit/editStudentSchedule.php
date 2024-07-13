<?php 
    include '../connection/conn.php';

    // if (isset($_POST['ProgramID']) && isset($_POST['ScheduleID'])) {
    //     $programID = $_POST['ProgramID'];
    //     $scheduleID = $_POST['ScheduleID'];
    //     $SubjectFallID = $_POST['SubjectFallID'];
    
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
    //         JOIN tblsubjectfall
    //             ON tblsubjectfall.ScheduleID = tblschedule.ScheduleID
           
    //          WHERE tblsubjectfall.ScheduleID = ? 
    //     ";

    //  // WHERE tblstudentstatus.ProgramID = ? AND tblschedule.ScheduleID = ?
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
    //                 echo "<tr>
    //                         <td>
    //                             <input type='hidden' name='StudentStatusID[{$row['StudentID']}]' value='{$row['StudentStatusID']}'>
    //                             <input type='checkbox' name='StudentStatusCheckbox[{$row['StudentID']}]' value='1'>
    //                         </td>
    //                         <td>{$i}</td>
    //                         <td>{$row['NameInKhmer']}</td>
    //                         <td>{$row['NameInLatin']}</td>
    //                         <td>Agree</td>
    //                     </tr>";
    //                 $i++;
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



    // if (isset($_POST['ProgramID']) && isset($_POST['ScheduleID'])) {
    //     if (isset($_POST['id'])) {
    //     // $programID = $_POST['ProgramID'];
    //     // $scheduleID = $_POST['ScheduleID'];

    //     $SubjectFallID = $_POST['id'];
    
    //     // Prepare the SQL query
    //     $query = "
    //         SELECT 
    //             SELECT 
    //         tblstudentinfo.StudentID,
    //         tblstudentstatus.StudentStatusID,
    //         tblstudentinfo.NameInKhmer, 
    //         tblstudentinfo.NameInLatin 
    //     FROM tblstudentstatus
    //     JOIN tblstudentstatus ON tblstudentinfo.StudentID = tblstudentstatus.StudentID
    //     JOIN tblschedule ON tblschedule.ProgramID = tblstudentstatus.ProgramID
    //     JOIN tblsubjectfall ON tblsubjectfall.StudentStatusID = tblstudentstatus.StudentStatusID
    //     WHERE tblsubjectfall.SubjectFallID = ? 
    //     ";
    
    //     // Prepare the statement
    //     $stmt = $conn->prepare($query);
    
    //     if ($stmt) {
    //         // Bind parameters
    //         $stmt->bind_param('i',  $SubjectFallID );
    
    //         // Execute the statement
    //         if ($stmt->execute()) {
    //             // Get the result
    //             $result = $stmt->get_result();
    //             $i = 1;
    
    //             // Check if there are rows returned
    //             if ($result->num_rows > 0) {
    //                 // Loop through results and output table rows
    //                 while ($row = $result->fetch_assoc()) {
    //                     echo "<tr>
    //                             <td>
    //                                 <input type='hidden' name='StudentStatusID[{$row['StudentID']}]' value='{$row['StudentStatusID']}'>
    //                                 <input type='checkbox' name='StudentStatusCheckbox[{$row['StudentID']}]' value='1'>
    //                             </td>
    //                             <td>{$i}</td>
    //                             <td>{$row['NameInKhmer']}</td>
    //                             <td>{$row['NameInLatin']}</td>
    //                             <td>Agree</td>
    //                         </tr>";
    //                     $i++;
    //                 }
    //             } else {
    //                 // No rows found
    //                 echo "<tr><td colspan='5'>No students found for the selected ProgramID and ScheduleID.</td></tr>";
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



   
    if (isset($_POST['id'])) {
        $SubjectFallID = $_POST['id'];
    
        // Debugging
        error_log("Received SubjectFallID: " . $SubjectFallID);
    
        // Prepare the SQL query
        $query = "
            SELECT 
                tblstudentinfo.StudentID,
                tblstudentstatus.StudentStatusID,
                tblstudentinfo.NameInKhmer, 
                tblstudentinfo.NameInLatin 
            FROM tblstudentinfo
            JOIN tblstudentstatus ON tblstudentinfo.StudentID = tblstudentstatus.StudentID
            JOIN tblsubjectfall ON tblsubjectfall.StudentStatusID = tblstudentstatus.StudentStatusID
            WHERE tblsubjectfall.SubjectFallID = ?
        ";
    
        // Prepare the statement
        if ($stmt = $conn->prepare($query)) {
            // Bind parameters
            $stmt->bind_param('i', $SubjectFallID);
    
            // Execute the statement
            if ($stmt->execute()) {
                // Get the result
                $result = $stmt->get_result();
                $i = 1;
    
                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    // Loop through results and output table rows
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>
                                    <input type='hidden' name='Assigned[{$row['StudentStatusID']}]'  value='0'>
                                    <input type='checkbox' name='Assigned[{$row['StudentStatusID']}]' value='1' checked>
                                </td>
                                <td>{$i}</td>
                                <td>{$row['NameInKhmer']}</td>
                                <td>{$row['NameInLatin']}</td>
                                <td>Agree</td>
                            </tr>";
                        $i++;
                    }
                } else {
                    // No rows found
                    echo "<tr><td colspan='5'>No students found for the selected SubjectFallID.</td></tr>";
                }
            } else {
                // Error executing statement
                echo "<tr><td colspan='5'>Error executing statement: " . $stmt->error . "</td></tr>";
            }
    
            // Close the statement
            $stmt->close();
        } else {
            // Error preparing statement
            echo "<tr><td colspan='5'>Error preparing statement: " . $conn->error . "</td></tr>";
        }
    } else {
        // No Subject Fall ID provided
        echo "<tr><td colspan='5'>No Subject Fall ID provided.</td></tr>";
    }
    
    // Close the database connection
    $conn->close();


?>