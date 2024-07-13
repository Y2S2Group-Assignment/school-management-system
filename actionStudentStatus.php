<?php
include './connection/conn.php';

// Insert Operation
if (isset($_POST['btnInsert'])) {
    $ProgramID = $_POST['ProgramID'];
    $Assigned = $_POST['Assigned']; // Array of assigned values with StudentID as key
    $AssignDate = $_POST['AssignDate'];
    $Note = mysqli_real_escape_string($conn, $_POST['Note']);

    foreach ($Assigned as $StudentID => $isAssigned) {
        if ($isAssigned == '1') { // Only process students that are checked (Assigned)
            $sql = "INSERT INTO tblstudentstatus (StudentID, ProgramID, Assigned, AssignDate, Note) 
                    VALUES ('$StudentID', '$ProgramID', '$isAssigned', '$AssignDate', '$Note')
                    ON DUPLICATE KEY UPDATE Assigned='$isAssigned', AssignDate='$AssignDate', Note='$Note'";
            if (!mysqli_query($conn, $sql)) {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
        }
    }
    mysqli_close($conn);
    header('location: ./c_newstatus.php');
}

// Insert Operation

// if (isset($_POST['btnsubjectfail'])) {
  

//     $StudentStatusID = $_POST['StudentStatusID'];
//     $Assigned = $_POST['Assigned']; // Array of assigned values with keys in the format StudentID_ScheduleID
//     $DateSubjectFall = $_POST['DateSubjectFall'];

//     foreach ($Assigned as $key => $isAssigned) {
//         if ($isAssigned == '1') { // Only process schedules that are checked (Assigned)
//             list($StudentID, $ScheduleID) = explode('_', $key);
//             $StudentStatusID = mysqli_real_escape_string($conn, $StudentStatusID);
//             $StudentID = mysqli_real_escape_string($conn, $StudentID);
//             $ScheduleID = mysqli_real_escape_string($conn, $ScheduleID);
//             $DateSubjectFall = mysqli_real_escape_string($conn, $DateSubjectFall);

//             $sql = "INSERT INTO tblsubjectfall (StudentStatusID, StudentID, ScheduleID, Assigned, DateSubjectFall) 
//                     VALUES ('$StudentStatusID', '$StudentID', '$ScheduleID', '$isAssigned', '$DateSubjectFall')
//                     ON DUPLICATE KEY UPDATE Assigned='$isAssigned', DateSubjectFall='$DateSubjectFall'";
//             if (!mysqli_query($conn, $sql)) {
//                 echo "Error: " . mysqli_error($conn);
//             }
//         }
//     }
//     mysqli_close($conn);
//     header('location: ./c_subfail.php');
// }



// if (isset($_POST['btnsubjectfail'])) {
//     $StudentStatusID = $_POST['StudentStatusID'];
//     $Assigned = $_POST['Assigned']; // Array of assigned values with ScheduleID as key
//     $DateSubjectFall = $_POST['DateSubjectFall'];

//     foreach ($Assigned as $ScheduleID => $isAssigned) {
//         if ($isAssigned == '1') { // Only process schedules that are checked (Assigned)
//             $StudentStatusID = mysqli_real_escape_string($conn, $StudentStatusID);
//             $ScheduleID = mysqli_real_escape_string($conn, $ScheduleID);
//             $DateSubjectFall = mysqli_real_escape_string($conn, $DateSubjectFall);

//             $sql = "INSERT INTO tblsubjectfall (StudentStatusID, ScheduleID, Assigned, DateSubjectFall) 
//                     VALUES ('$StudentStatusID', '$ScheduleID', '$isAssigned', '$DateSubjectFall')
//                     ON DUPLICATE KEY UPDATE Assigned='$isAssigned', DateSubjectFall='$DateSubjectFall'";
//             if (!mysqli_query($conn, $sql)) {
//                 echo "Error: " . mysqli_error($conn);
//             }
//         }
//     }
//     mysqli_close($conn);
//     header('location: ./c_subfail.php');
// }





if (isset($_POST['btnsubjectfail'])) {
    $Assigned = $_POST['Assigned']; // Array of assigned values with keys in the format ScheduleID
    $StudentStatusCheckbox = $_POST['StudentStatusCheckbox']; // Array of checked student statuses
    $DateSubjectFall = $_POST['DateSubjectFall'];

    foreach ($StudentStatusCheckbox as $StudentID => $isChecked) {
        if ($isChecked == '1') {
            foreach ($Assigned as $ScheduleID => $isAssigned) {
                if ($isAssigned == '1') {
                    $StudentStatusID = mysqli_real_escape_string($conn, $_POST['StudentStatusID'][$StudentID]);
                    $ScheduleID = mysqli_real_escape_string($conn, $ScheduleID);
                    $DateSubjectFall = mysqli_real_escape_string($conn, $DateSubjectFall);

                    $sql = "INSERT INTO tblsubjectfall (StudentStatusID, ScheduleID, Assigned, DateSubjectFall) 
                            VALUES ('$StudentStatusID', '$ScheduleID', '1', '$DateSubjectFall')
                            ON DUPLICATE KEY UPDATE Assigned='1', DateSubjectFall='$DateSubjectFall'";
                    if (!mysqli_query($conn, $sql)) {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            }
        }
    }
    mysqli_close($conn);
    header('location: ./c_subfail.php');
}







// Edit Operation
else if (isset($_POST['btnEdit'])) {
    $ProgramID = $_POST['ProgramID'];
    $AssignDate = $_POST['AssignDate'];
    $Note = mysqli_real_escape_string($conn, $_POST['Note']);
    $Assigned = $_POST['Assigned']; // Array of assigned values with StudentID as key

    foreach ($Assigned as $StudentStatusID => $isAssigned) {
        if ($isAssigned == '1') { // Only process students that are checked (Assigned)
            $sql = "UPDATE tblstudentstatus SET 
                    Assigned = '$isAssigned', 
                    ProgramID = '$ProgramID',
                    AssignDate = '$AssignDate', 
                    Note = '$Note'
                    WHERE StudentStatusID = '$StudentStatusID'";
            if (!mysqli_query($conn, $sql)) {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
        } else {
            $sql = "UPDATE tblstudentstatus SET
                    Assigned = '0', 
                    ProgramID = '$ProgramID',
                    AssignDate = '$AssignDate', 
                    Note = '$Note'
                    WHERE StudentStatusID = '$StudentStatusID'";
            if (!mysqli_query($conn, $sql)) {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
        }
    }
    mysqli_close($conn);
    header('location: c_newstatus.php');
}

// Delete Operation
else if (isset($_GET['DeleteID'])) {
    $StudentStatusID = $_GET['DeleteID'];
    // Perform sanitation to prevent SQL injection
    $StudentStatusID = mysqli_real_escape_string($conn, $StudentStatusID);

    $sql = "DELETE FROM tblstudentstatus WHERE StudentStatusID='$StudentStatusID'";
    if (mysqli_query($conn, $sql)) {
        header('location: ./indexStudentStatus.php');
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
