<?php 

include './connection/conn.php';

session_start();

if (isset($_POST['btnInsert'])) {
    $NewProgramID = $_POST['ProgramID'];
    $Assigned = $_POST['Assigned']; // Array of assigned values with StudentID as key
    $AssignDate = $_POST['AssignDate'];
    $Note = mysqli_real_escape_string($conn, $_POST['Note']);

    foreach ($Assigned as $StudentID => $isAssigned) {
        if ($isAssigned == '1') {
            // Begin transaction
            mysqli_begin_transaction($conn);
            $insert_sql = "INSERT INTO tblstudentstatus (StudentID, ProgramID, Assigned, AssignDate, Note, Status) 
                           VALUES ('$StudentID', '$NewProgramID', '$isAssigned', '$AssignDate', '$Note', 1)
                           ON DUPLICATE KEY UPDATE Assigned='$isAssigned', AssignDate='$AssignDate', Note='$Note', Status=1";

            if (mysqli_query($conn, $insert_sql)) {
                $fetch_sql = "SELECT StudentStatusID FROM tblstudentstatus WHERE StudentID='$StudentID' AND ProgramID != '$NewProgramID' AND Status=1";
                $result = mysqli_query($conn, $fetch_sql);

                while ($row = mysqli_fetch_array($result)) {
                    $StudentStatusID = $row['StudentStatusID'];
                    $update_sql = "UPDATE tblstudentstatus SET Status = 0 WHERE StudentStatusID = '$StudentStatusID'";
                    if (!mysqli_query($conn, $update_sql)) {
                        echo "Error: " . $update_sql . ":-" . mysqli_error($conn);
                    }
                }
                mysqli_commit($conn);
            } else {
                mysqli_rollback($conn);
                echo "Error: " . $insert_sql . ":-" . mysqli_error($conn);
            }
        }
    }
    if (empty($errors)) {
        $_SESSION['status'] = "Processing Successfully.";
        header("Location: c_newstatus.php");
        exit();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
    mysqli_close($conn);
 
}
// else if (isset($_POST['btnEdit'])) {

//     $StudentStatusID = $_POST['StudentStatusID'];
//     $OldProgramID = $_POST['OldProgramID'];
//     $ProgramID = $_POST['ProgramID'];
//     $AssignDate = $_POST['AssignDate'];
//     $Note = mysqli_real_escape_string($conn, $_POST['Note']);
//     $Assigned = $_POST['Assigned'];// Array of assigned values with StudentID as key
//     foreach ($Assigned as $StudentID => $isAssigned) {
//         if ($isAssigned == '1') { // Only process students that are checked (Assigned)
//             $sql = "UPDATE tblstudentstatus SET 
//             Assigned = '$isAssigned', 
//             ProgramID = '$ProgramID',
//             AssignDate = '$AssignDate', 
//             Note = '$Note'
//             WHERE StudentStatusID = $StudentStatusID";
//             if (!mysqli_query($conn, $sql)) {
//                 echo "Error: " . $sql . ":-" . mysqli_error($conn);
//             }
//         } else {
//             $isAssigned = 0;
//             $sql = "UPDATE tblstudentstatus SET
//             Assigned = '$isAssigned', 
//             ProgramID = '$ProgramID',
//             AssignDate = '$AssignDate', 
//             Note = '$Note'
//             WHERE StudentStatusID = $StudentStatusID";
//             if (!mysqli_query($conn, $sql)) {
//                 echo "Error: " . $sql . ":-" . mysqli_error($conn);
//             }
//         }
//     }
//     header('location: ./indexStudentStatus.php');
//     mysqli_close($conn);
// }

if (isset($_POST['btnEdit'])) {
    $StudentStatusID = $_POST['StudentStatusID'];
    $OldProgramID = $_POST['OldProgramID'];
    $ProgramID = $_POST['ProgramID'];
    $AssignDate = $_POST['AssignDate'];
    $Note = mysqli_real_escape_string($conn, $_POST['Note']);
    $Assigned = $_POST['Assigned']; // Array of assigned values with StudentID as key

    foreach ($Assigned as $StudentID => $isAssigned) {
        $isAssigned = $isAssigned == '1' ? 1 : 0; // Convert to integer 1 or 0

        // Print debug information
        echo "Updating StudentID: $StudentID with isAssigned: $isAssigned, ProgramID: $ProgramID, AssignDate: $AssignDate, Note: $Note<br>";

        $sql = "UPDATE tblstudentstatus SET 
                Assigned = '$isAssigned', 
                ProgramID = '$ProgramID',
                AssignDate = '$AssignDate', 
                Note = '$Note'
                WHERE StudentID = $StudentID AND ProgramID = $OldProgramID";
        
        if (!mysqli_query($conn, $sql)) {
            echo "Error updating record for StudentID $StudentID: " . mysqli_error($conn) . "<br>";
            // Optionally, stop the execution here if a query fails
            // exit();
        } else {
            echo "Record for StudentID $StudentID updated successfully.<br>";
        }
    }

    // Redirect after processing all updates
    header('Location: ./indexStudentStatus.php');
    mysqli_close($conn);
}

if (isset($_GET['DeleteID'])) {
    $StudentStatusID = $_GET['DeleteID'];
    $StudentStatusID = mysqli_real_escape_string($conn, $StudentStatusID);
    $sql = "DELETE FROM tblStudentStatus WHERE StudentStatusID='$StudentStatusID'";
    if (mysqli_query($conn, $sql)) {
        header('location: ./indexStudentStatus.php');
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}


?>