

<?php
include './connection/conn.php';

// if (isset($_POST['id'])) {
//     $programID = $_POST['id'];

//     $query = "
//         SELECT 
//             tblschedule.ScheduleID, 
//             tblschedule.SubjectID, 
//             tblsubject.SubjectEN,
//             tblschedule.LecturerID,
//             tbllecturer.LecturerEN
//         FROM tblschedule
//         JOIN tblsubject ON tblschedule.SubjectID = tblsubject.SubjectID    
//         JOIN tbllecturer ON tblschedule.LecturerID = tbllecturer.LecturerID
//         WHERE tblschedule.ProgramID = ?
//     ";

//     $stmt = $conn->prepare($query);

//     if ($stmt) {
//         $stmt->bind_param('i', $programID);
//         if ($stmt->execute()) {
//             $result = $stmt->get_result();
//             $i = 1;
//             while ($row = $result->fetch_assoc()) {
//                 echo "<tr>
//                         <td>
//                             <input type='hidden' name='Assigned[{$row['ScheduleID']}]' value='0'>
//                             <input type='checkbox' name='Assigned[{$row['ScheduleID']}]' value='1'>
//                         </td>
//                         <td>{$i}</td>
//                         <td>{$row['LecturerEN']}</td>
//                         <td>{$row['SubjectEN']}</td>
//                     </tr>";
//                     $i++;
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


// if (isset($_POST['id'])) {
//     $id = $_POST['id'];

//     $sql = "SELECT * FROM tblschedule WHERE ProgramID = $id";
//     $result = mysqli_query($conn,$sql);

//     $out = '<option selected disabled value="">Select Model</option>';
//     while($row = mysqli_fetch_assoc($result)){
//         $SubjectID = $row['SubjectID'];
//         $LecturerID = $row['LecturerID'];

//         $SubjectEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SubjectEN FROM tblsubject WHERE SubjectID = $SubjectID"))['SubjectEN'] ?? '';
//         $LcturerEN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT LcturerEN FROM tbllecturer WHERE LecturerID = $LecturerID"))['LcturerEN'] ?? '';
//         // $out .= '<option>'.$row['Model_Name'].'</option>';
//         $out .= '<option value="'.$row['ScheduleID'].'">'.$row['LecturerEN'].'['.$row['SubjectEN'].']'.'</option>';
//     }
//     echo $out;

//     if (isset($_POST['id'])) {
//         $id = $_POST['id'];
    
//         // Prepare the main query
//         $stmt = $conn->prepare("SELECT * FROM tblschedule WHERE ProgramID = ?");
//         $stmt->bind_param("i", $id);
//         $stmt->execute();
//         $result = $stmt->get_result();
    
//         $out = '<option selected disabled value="">Select Schedule</option>';
    
//         while ($row = $result->fetch_assoc()) {
//             $SubjectID = $row['SubjectID'];
//             $LecturerID = $row['LecturerID'];
    
//             // Prepare the query for SubjectEN
//             $stmtSubject = $conn->prepare("SELECT SubjectEN FROM tblsubject WHERE SubjectID = ?");
//             $stmtSubject->bind_param("i", $SubjectID);
//             $stmtSubject->execute();
//             $subjectResult = $stmtSubject->get_result();
//             $SubjectEN = $subjectResult->fetch_assoc()['SubjectEN'] ?? '';
    
//             // Prepare the query for LecturerEN
//             $stmtLecturer = $conn->prepare("SELECT LecturerEN FROM tbllecturer WHERE LecturerID = ?");
//             $stmtLecturer->bind_param("i", $LecturerID);
//             $stmtLecturer->execute();
//             $lecturerResult = $stmtLecturer->get_result();
//             $LecturerEN = $lecturerResult->fetch_assoc()['LecturerEN'] ?? '';
    
//             $out .= '<option value="'.$row['ScheduleID'].'">'.$LecturerEN.' ['.$SubjectEN.']</option>';
    
//             // Close the prepared statements
//             $stmtSubject->close();
//             $stmtLecturer->close();
//         }
        
//         // Close the main prepared statement
//         $stmt->close();
    
//         echo $out;
//     } else {
//         echo '<option selected disabled value="">Invalid Program ID</option>';
//     }
    
//     // Close the database connection
//     $conn->close();
// }


    // if (isset($_POST['id'])) {
    //     $programID = $_POST['id'];
    
    //     // Prepare the main query
    //     $stmt = $conn->prepare("SELECT * FROM tblschedule WHERE ProgramID = ?");
    //     $stmt->bind_param("i", $programID);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    
    //     $out = '<option selected disabled value="">Select Schedule</option>';
    
    //     while ($row = $result->fetch_assoc()) {
    //         $subjectID = $row['SubjectID'];
    //         $lecturerID = $row['LecturerID'];
    //         $scheduleID = $row['ScheduleID']; // Ensure ScheduleID is correctly retrieved
    
    //         // Debugging output
    //         error_log("SubjectID: $subjectID, LecturerID: $lecturerID, ScheduleID: $scheduleID");
    
            
    //         // Prepare the query for SubjectEN
    //         $stmtSubject = $conn->prepare("SELECT SubjectEN FROM tblsubject WHERE SubjectID = ?");
    //         $stmtSubject->bind_param("i", $subjectID);
    //         $stmtSubject->execute();
    //         $subjectResult = $stmtSubject->get_result();
    //         $subjectEN = $subjectResult->fetch_assoc()['SubjectEN'] ?? '';
    
    //         // Prepare the query for LecturerEN
    //         $stmtLecturer = $conn->prepare("SELECT LecturerEN FROM tbllecturer WHERE LecturerID = ?");
    //         $stmtLecturer->bind_param("i", $lecturerID);
    //         $stmtLecturer->execute();
    //         $lecturerResult = $stmtLecturer->get_result();
    //         $lecturerEN = $lecturerResult->fetch_assoc()['LecturerEN'] ?? '';
    
    //         // Debugging output
    //         error_log("SubjectEN: $subjectEN, LecturerEN: $lecturerEN");
    
    //         // Construct the option element with ScheduleID as the value
    //         $out .= '<option value="' . $scheduleID . '">' . $lecturerEN . ' [' . $subjectEN . ']</option>';
    
    //         // Close the prepared statements
    //         $stmtSubject->close();
    //         $stmtLecturer->close();
    //     }
    
    //     // Close the main prepared statement
    //     $stmt->close();
    
    //     echo $out;
    // } else {
    //     echo '<option selected disabled value="">Invalid Program ID</option>';
    // }
    
    // // Close the database connection
    // $conn->close();


    if (isset($_POST['id'])) {
        $programID = $_POST['id'];
    
        // Prepare the main query
        $stmt = $conn->prepare("SELECT * FROM tblschedule WHERE ProgramID = ?");
        if ($stmt === false) {
            error_log("Error preparing statement: " . $conn->error);
            echo '<option selected disabled value="">Database error</option>';
            exit();
        }
    
        $stmt->bind_param("i", $programID);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $out = '<option selected disabled value="">Select Schedule</option>';
    
        $displayedSubjects = []; // Array to track displayed SubjectIDs
    
        while ($row = $result->fetch_assoc()) {
            $subjectID = $row['SubjectID'];
            $lecturerID = $row['LecturerID'];
            $scheduleID = $row['ScheduleID']; // Ensure ScheduleID is correctly retrieved
    
            // Debugging output
            error_log("SubjectID: $subjectID, LecturerID: $lecturerID, ScheduleID: $scheduleID");
    
            if (!in_array($subjectID, $displayedSubjects)) {
                // Prepare the query for SubjectEN
                $stmtSubject = $conn->prepare("SELECT SubjectEN FROM tblsubject WHERE SubjectID = ?");
                if ($stmtSubject === false) {
                    error_log("Error preparing statement: " . $conn->error);
                    continue;
                }
                $stmtSubject->bind_param("i", $subjectID);
                $stmtSubject->execute();
                $subjectResult = $stmtSubject->get_result();
                $subjectEN = '';
                if ($subjectRow = $subjectResult->fetch_assoc()) {
                    $subjectEN = $subjectRow['SubjectEN'];
                }
    
                // Prepare the query for LecturerEN
                $stmtLecturer = $conn->prepare("SELECT LecturerEN FROM tbllecturer WHERE LecturerID = ?");
                if ($stmtLecturer === false) {
                    error_log("Error preparing statement: " . $conn->error);
                    continue;
                }
                $stmtLecturer->bind_param("i", $lecturerID);
                $stmtLecturer->execute();
                $lecturerResult = $stmtLecturer->get_result();
                $lecturerEN = '';
                if ($lecturerRow = $lecturerResult->fetch_assoc()) {
                    $lecturerEN = $lecturerRow['LecturerEN'];
                }
    
                // Debugging output
                error_log("SubjectEN: $subjectEN, LecturerEN: $lecturerEN");
    
                // Construct the option element with ScheduleID as the value
                if (!empty($subjectEN)) {
                    $out .= '<option value="' . $scheduleID . '">' . $lecturerEN . ' [' . $subjectEN . ']</option>';
                    $displayedSubjects[] = $subjectID; // Mark this SubjectID as displayed
                }
    
                // Close the prepared statements
                $stmtSubject->close();
                $stmtLecturer->close();
            }
        }
    
        // Close the main prepared statement
        $stmt->close();
    
        echo $out;
    } else {
        echo '<option selected disabled value="">Invalid Program ID</option>';
    }
    
    // Close the database connection
    $conn->close();
    
?>


