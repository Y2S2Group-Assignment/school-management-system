





<?php
// Include your database connection
include './connection/conn.php';

// Check if ProgramID is set
if (isset($_POST['id'])) {
    $programID = $_POST['id'];
   
    $query = "
         SELECT 
            tblstudentinfo.StudentID, 
          
            tblstudentinfo.NameInKhmer, 
            tblstudentinfo.NameInLatin 
        FROM tblstudentinfo
        JOIN tblstudentstatus 
            ON tblstudentinfo.StudentID = tblstudentstatus.StudentID
        WHERE tblstudentstatus.ProgramID = ? AND tblstudentstatus.Status = 1

       
    ";
   
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param('i', $programID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Generate HTML for each row
            while ($row = $result->fetch_assoc()) {
                // Check if the student is assigned
                // $isChecked = ($row['Assigned'] == 1) ? 'checked' : '';
                echo "
                
                <tr>
                        <td>
                            <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
                            <input type='checkbox' name='Assigned[{$row['StudentID']}]' value='1' checked>
                        </td>
                        <td>{$row['StudentID']}</td>
                          <td>{$row['NameInKhmer']}</td>
                        <td>{$row['NameInLatin']}</td>
                      
                        <td>Agree</td>
                    </tr>";
            }

        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "No Program ID provided.";
}

$conn->close();


// if (isset($_POST['id'])) {
//     $programID = $_POST['id'];
  

//     // Output the table header
//     echo "<table>
//            ";

//     // Check in tblstudentinfo
//     $query1 = "SELECT * FROM tblstudentinfo WHERE ProgramID = ?";
//     $stmt1 = $conn->prepare($query1);

//     $query2 = "SELECT * FROM tblstudentstatus WHERE ProgramID = ?";
//     $stmt2 = $conn->prepare($query2);

//     if ($stmt1) {
//         $stmt1->bind_param('i', $programID);
//         if ($stmt1->execute()) {
//             $result1 = $stmt1->get_result();
//             // echo "Number of rows in tblstudentinfo: " . $result1->num_rows . "<br>";  
//             if ($result1->num_rows > 0) {
//                 while ($row = $result1->fetch_assoc()) {
//                     echo "<tr>
//                             <td>
//                                 <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
//                                 <input type='checkbox' name='Assigned[{$row['StudentID']}]' value='1' checked>
//                             </td>
//                             <td>{$row['StudentID']}</td>
//                             <td>{$row['NameInLatin']}</td>
//                             <td>{$row['NameInKhmer']}</td>
//                             <td>Pass</td>
//                         </tr>";
//                 }
//             } else {
//                 // echo "<tr><td colspan='5'>No records found in tblstudentinfo for ProgramID: $programID</td></tr>";
//             }
//             $stmt1->close();
//         } else {
//             // echo "Error executing statement for tblstudentinfo: " . $stmt1->error;
//         }
//     } 
  
//         // echo "Error preparing statement for tblstudentinfo: " . $conn->error;
//             // Check in tblstudentstatus
    
//     else if ($stmt2) {
//         $stmt2->bind_param('i', $programID);
//         if ($stmt2->execute()) {
//             $result2 = $stmt2->get_result();
//             // echo "Number of rows in tblstudentstatus: " . $result2->num_rows . "<br>";  
//             if ($result2->num_rows > 0) {
//                 while ($row = $result2->fetch_assoc()) {
//                     echo "<tr>
//                             <td>
//                                 <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
//                                 <input type='checkbox' name='Assigned[{$row['StudentID']}]' value='1' checked>
//                             </td>
//                             <td>{$row['StudentID']}</td>
//                             <td>N/A</td>
//                             <td>N/A</td>
//                             <td>{$row['Status']}</td>
//                         </tr>";
//                 }
//             } else {
//                 // echo "<tr><td colspan='5'>No records found in tblstudentstatus for ProgramID: $programID</td></tr>";
//             }
//             $stmt2->close();
//         } else {
//             // echo "Error executing statement for tblstudentstatus: " . $stmt2->error;
//         }
//     } 
//     else {
//         echo "No Data Added.";
//         // echo "Error preparing statement for tblstudentstatus: " . $conn->error;
//     }
   



    // Your original query to fetch data from both tables
    // $query = "
    //     SELECT 
    //         tblstudentinfo.StudentID, 
    //         tblstudentinfo.NameInKhmer, 
    //         tblstudentinfo.NameInLatin 
    //     FROM tblstudentinfo
    //     JOIN tblstudentstatus 
    //         ON tblstudentinfo.StudentID = tblstudentstatus.StudentID
    //     WHERE tblstudentstatus.ProgramID = ? AND tblstudentinfo.ProgramID = ?
    // ";

    // $stmt = $conn->prepare($query);

    // if ($stmt) {
    //     $stmt->bind_param('ii', $programID, $programID);

    //     if ($stmt->execute()) {
    //         $result = $stmt->get_result();

    //         // echo "Number of rows found: " . $result->num_rows . "<br>";  

    //         if ($result->num_rows > 0) {
    //             // Generate HTML for each row
    //             while ($row = $result->fetch_assoc()) {
    //                 echo "<tr>
    //                         <td>
    //                             <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
    //                             <input type='checkbox' name='Assigned[{$row['StudentID']}]' value='1' checked>
    //                         </td>
    //                         <td>{$row['StudentID']}</td>
    //                         <td>{$row['NameInLatin']}</td>
    //                         <td>{$row['NameInKhmer']}</td>
    //                         <td>Pass</td>
    //                     </tr>";
    //             }
    //         } else {
    //             echo "<tr><td colspan='5'>No records found for the given Program ID.</td></tr>";
    //         }
    //     } else {
    //         echo "Error executing statement: " . $stmt->error;
    //     }
    //     $stmt->close();
    // } else {
    //     echo "Error preparing statement: " . $conn->error;
    // }

    // Close the table after output
//     echo "</table>";
// } else {
//     echo "No Program ID provided.";
// }

// $conn->close();





?>

