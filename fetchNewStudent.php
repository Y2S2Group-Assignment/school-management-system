<?php
// Include your database connection
include './connection/conn.php';

// Check if ProgramID is set
// if (isset($_POST['id'])) { // Change 'programID' to 'id'
//     $programID = $_POST['id'];
   

//     // Prepare the SQL query to select students who do not have a status assigned yet
//     // $query = "
//     //     SELECT 
//     //         tblstudentinfo.StudentID, 
//     //         tblstudentinfo.NameInKhmer, 
//     //         tblstudentinfo.NameInLatin 
//     //     FROM tblstudentinfo
//     //     LEFT JOIN tblstudentstatus ON tblstudentinfo.StudentID = tblstudentstatus.StudentID AND tblstudentstatus.ProgramID = ?
//     //     WHERE tblstudentstatus.StudentID IS NULL
//     // ";
//     $query = "
//     SELECT 
//        tblstudentinfo.StudentID, 
       
//        tblstudentinfo.NameInKhmer, 
//        tblstudentinfo.NameInLatin 
//    FROM tblstudentinfo
//    JOIN tblstudentstatus 
//        ON tblstudentinfo.StudentID = tblstudentstatus.StudentID
  

  
// ";
//     $stmt = $conn->prepare($query);
    
//     if ($stmt) {
//         $stmt->bind_param('i', $programID);
//         if ($stmt->execute()) {
//             $result = $stmt->get_result();
          
//             // Generate HTML for each row
//             while ($row = $result->fetch_assoc()) {
//                 // $isChecked = ($row['Assigned'] == 1) ? 'checked' : '';
//                 echo "<tr>
//                 <td>
//                     <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
//                     <input type='checkbox' name='Assigned[{$row['StudentID']}]' value='1' >
//                 </td>
//                 <td>{$row['StudentID']}</td>
//                 <td>{$row['NameInLatin']}</td>
//                 <td>{$row['NameInKhmer']}</td>
//                 <td>N/A</td>
//             </tr>";
//             }

//         } else {
//             echo "Error executing statement: " . $stmt->error;
//         }
//         $stmt->close();
//     } else {
//         echo "Error preparing statement: " . $conn->error;
//     }
// } else {
//     echo "No Program ID provided.";
// }

// $conn->close();
// SELECT 
// tblstudentinfo.StudentID, 
// tblstudentinfo.NameInKhmer, 
// tblstudentinfo.NameInLatin

// FROM tblstudentinfo
// LEFT JOIN tblstudentstatus ON tblstudentinfo.StudentID = tblstudentstatus.StudentID 
// AND tblstudentstatus.ProgramID = ?
// WHERE tblstudentstatus.ProgramID = ? 


if (isset($_POST['id'])) { // Change 'programID' to 'id'
    $programID = $_POST['id'];
    // echo "Received ProgramID: $programID<br>"; 

    // Prepare the SQL query to select students who do not have a status assigned yet
    $query = "
    SELECT 
        tblstudentinfo.StudentID, 
        tblstudentinfo.NameInKhmer, 
        tblstudentinfo.NameInLatin
    FROM tblstudentinfo
    LEFT JOIN tblstudentstatus ON tblstudentinfo.StudentID = tblstudentstatus.StudentID 
    LEFT JOIN tblprogram ON tblprogram.ProgramID = tblstudentstatus.ProgramID 
    WHERE tblstudentstatus.ProgramID = ?   AND tblstudentstatus.Status = 1
";
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param('i', $programID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
          
            // Generate HTML for each row
            while ($row = $result->fetch_assoc()) {
                echo "
                
                
                <tr>
                <td>
                    <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
                    <input type='checkbox' name='Assigned[{$row['StudentID']}]' checked>
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

?>
