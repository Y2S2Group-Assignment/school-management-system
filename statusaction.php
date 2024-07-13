<?php
include './connection/conn.php';

session_start();

// if (isset($_POST['btnInsert'])) {
//     $ProgramID = $_POST['ProgramID'];
//     $Assigned = $_POST['Assigned']; // Array of assigned values with StudentID as key
//     $AssignDate = $_POST['AssignDate'];
//     $Note = mysqli_real_escape_string($conn, $_POST['Note']);

//     foreach ($Assigned as $StudentID => $isAssigned) {
//         if ($isAssigned == '1') { // Only process students that are checked (Assigned)
//             // Check if the student already has an assigned status for this program
//             $checkQuery = "SELECT StudentStatusID FROM tblstudentstatus WHERE StudentID = ? AND ProgramID = ?";
//             $stmtCheck = $conn->prepare($checkQuery);
//             $stmtCheck->bind_param('ii', $StudentID, $ProgramID);
//             $stmtCheck->execute();
//             $stmtCheck->store_result();

//             if ($stmtCheck->num_rows == 0) { // Only insert if no existing record found
//                 $stmtCheck->close();
//                 $sql = "INSERT INTO tblstudentstatus (StudentID, ProgramID, Assigned, AssignDate, Note) 
//                         VALUES ('$StudentID', '$ProgramID', '$isAssigned', '$AssignDate', '$Note')";
//                 // if (!mysqli_query($conn, $sql)) {
//                 //     echo "Error: " . $sql . ":-" . mysqli_error($conn);
//                 // }
//                 if (mysqli_query($conn, $sql)) {
//                     $_SESSION['status'] = "Proccessing Successfully.";
//                     header("Location: ./statusList.php");
//                     exit();
//                 } else {
//                     echo "Error: " . $sql . ":-" . mysqli_error($conn);
//                 }
//             } else {
//                 $stmtCheck->close();
//                 echo "StudentID $StudentID already has an assigned status for ProgramID $ProgramID.<br>";
//             }
//         }
//     }
//     mysqli_close($conn);
//     // header('location: ./statusList.php');
// } 

if (isset($_POST['btnInsert'])) {
    $ProgramID = $_POST['ProgramID'];
    $Assigned = $_POST['Assigned']; // Array of assigned values with StudentID as key
    $AssignDate = $_POST['AssignDate'];
    $Note = mysqli_real_escape_string($conn, $_POST['Note']);

    $errors = []; // Array to collect errors or duplicate entries

    foreach ($Assigned as $StudentID => $isAssigned) {
        if ($isAssigned == '1') { // Only process students that are checked (Assigned)
            // Check if the student already has an assigned status for this program
            $checkQuery = "SELECT StudentStatusID FROM tblstudentstatus WHERE StudentID = ? AND ProgramID = ?";
            $stmtCheck = $conn->prepare($checkQuery);
            if ($stmtCheck) {
                $stmtCheck->bind_param('ii', $StudentID, $ProgramID);
                $stmtCheck->execute();
                $stmtCheck->store_result();

                if ($stmtCheck->num_rows == 0) { // Only insert if no existing record found
                    $stmtCheck->close();

                    // Prepare the insert statement
                    $insertQuery = "INSERT INTO tblstudentstatus (StudentID, ProgramID, Assigned, AssignDate, Note) 
                                    VALUES (?, ?, ?, ?, ?)";
                    $stmtInsert = $conn->prepare($insertQuery);
                    if ($stmtInsert) {
                        $stmtInsert->bind_param('iiiss', $StudentID, $ProgramID, $isAssigned, $AssignDate, $Note);
                        if (!$stmtInsert->execute()) {
                            $errors[] = "Error inserting StudentID $StudentID: " . $stmtInsert->error;
                        }
                        $stmtInsert->close();
                    } else {
                        $errors[] = "Error preparing insert statement for StudentID $StudentID: " . $conn->error;
                    }
                } else {
                    $stmtCheck->close();
                    $errors[] = "StudentID $StudentID already has an assigned status for ProgramID $ProgramID.";
                }
            } else {
                $errors[] = "Error preparing check statement for StudentID $StudentID: " . $conn->error;
            }
        }
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect or output errors
    if (empty($errors)) {
        $_SESSION['status'] = "Processing Successfully.";
        header("Location: statusList.php");
        exit();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

// else if (isset($_POST['btnEdit'])) {
//     $StudentStatusID = $_POST['StudentStatusID'];
//     $ProgramID = $_POST['ProgramID'];
//     $AssignDate = $_POST['AssignDate'];
//      $Note = mysqli_real_escape_string($conn, $_POST['Note']);
 
//     $Assigned = $_POST['Assigned']; // Array of assigned values with StudentID as key

//     foreach ($Assigned as $StudentID => $isAssigned) {
//         $isAssigned = $isAssigned == '1' ? 1 : 0; // Convert to integer 1 or 0

//         $sql = "UPDATE tblstudentstatus SET 
//                 Assigned = '$isAssigned', 
//                 ProgramID = '$ProgramID',
//                 AssignDate = '$AssignDate', 
//                 Note = '$Note'
//                 WHERE StudentStatusID = (SELECT StudentStatusID FROM tblstudentstatus WHERE StudentID = $StudentID AND ProgramID = $ProgramID LIMIT 1)";
//     }

//      // Check if any queries failed
//      if (!mysqli_error($conn)) {
//         $_SESSION['status'] = "Processing Successfully.";
//         header("Location: ./statusList.php");
//         exit();
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }

//     // header('location: statusList.php');
//     mysqli_close($conn);
// }

else if (isset($_POST['btnEdit'])) {
    $StudentStatusID = $_POST['StudentStatusID'];
    $ProgramID = $_POST['ProgramID'];
    $AssignDate = $_POST['AssignDate'];
    $Note = mysqli_real_escape_string($conn, $_POST['Note']);
    $Assigned = $_POST['Assigned']; // Array of assigned values with StudentID as key

    foreach ($Assigned as $StudentID => $isAssigned) {
        $isAssigned = $isAssigned == '1' ? 1 : 0; // Convert to integer 1 or 0

        $sql = "UPDATE tblstudentstatus SET 
                Assigned = '$isAssigned', 
                ProgramID = '$ProgramID',
                AssignDate = '$AssignDate', 
                Note = '$Note'
                WHERE StudentStatusID = (SELECT StudentStatusID FROM tblstudentstatus WHERE StudentID = $StudentID AND ProgramID = $ProgramID LIMIT 1)";

        if (!mysqli_query($conn, $sql)) {
            // If any query fails, output the error and stop the execution
            echo "Error updating record: " . mysqli_error($conn);
            mysqli_close($conn);
            exit();
        }
    }

    // If all queries are successful
    if (empty($errors)) {
        $_SESSION['status'] = "Processing Successfully.";
        header("Location: statusList.php");
        exit();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
    exit();
    // Closing the connection after the operations
mysqli_close($conn);
}



if (isset($_GET['DeleteID'])) {
    $StudentStatusID = $_GET['DeleteID'];
    // Perform sanitation to prevent SQL injection
    $StudentStatusID = mysqli_real_escape_string($conn, $StudentStatusID);

    $sql = "DELETE FROM tblStudentStatus WHERE StudentStatusID='$StudentStatusID'";
    if (mysqli_query($conn, $sql)) {
        header('location: ./indexStudentStatus.php');
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}




// if (isset($_POST['btnsubjectfail'])) {
//     $ScheduleID = $_POST['ScheduleID'];
//     $ProgramID = $_POST['ProgramID'];
//     $StudentStatusCheckbox = $_POST['StudentStatusCheckbox']; // Array of checked student statuses
//     $DateSubjectFall = $_POST['DateSubjectFall'];

//     foreach ($StudentStatusCheckbox as $StudentID => $isChecked) {
//         $StudentStatusID = mysqli_real_escape_string($conn, $_POST['StudentStatusID'][$StudentID]);
//         if ($isChecked == '1') {
           
//             // foreach ($Assigned as $ScheduleID => $isAssigned) {
//             //     if ($isAssigned == '1') {
//             //         $ScheduleID = mysqli_real_escape_string($conn, $ScheduleID);
//             //         $DateSubjectFall = mysqli_real_escape_string($conn, $DateSubjectFall);

//                     $sql = "INSERT INTO tblsubjectfall (StudentStatusID, ScheduleID,ProgramID, Assigned, DateSubjectFall) 
//                             VALUES ('$StudentStatusID', '$ScheduleID','$ProgramID', '1', '$DateSubjectFall')
//                             ON DUPLICATE KEY UPDATE Assigned='1', DateSubjectFall='$DateSubjectFall'";
                    
//                     // Debugging output to check the query
//                     if (mysqli_query($conn, $sql)) {
//                         $_SESSION['status'] = "Proccessing Successfully.";
//                         header("Location: ./subfailList.php");
//                         exit();
//                     } else {
//                         echo "Error: " . $sql . ":-" . mysqli_error($conn);
//                     }
//                 //}
//             //}
//         }else{
//             $isAssigned = '0'; // Convert to integer 1 or 0

//             $sql = "UPDATE tblsubjectfall SET 
//                     Assigned = '$isAssigned', 
//                      ProgramID = '$ProgramID', 
//                     ScheduleID = '$ScheduleID',
                   
//                     DateSubjectFall = '$DateSubjectFall'
//                     WHERE SubjectFallID = (SELECT SubjectFallID FROM tblsubjectfall WHERE StudentStatusID = $StudentStatusID AND ProgramID = $ProgramID LIMIT 1)";
            
//             if (mysqli_query($conn, $sql)) {
//                 $_SESSION['status'] = "Proccessing Successfully.";
//                 header("Location: ./subfailList.php");
//                 exit();
//             } else {
//                 echo "Error: " . $sql . ":-" . mysqli_error($conn);
//             }
//         }
//     }
//     mysqli_close($conn);
//     // header('location: ./c_subfail.php'); // Uncomment this line after debugging
// }

if (isset($_POST['btnsubjectfail'])) {
    $ScheduleID = mysqli_real_escape_string($conn, $_POST['ScheduleID']);
    $ProgramID = mysqli_real_escape_string($conn, $_POST['ProgramID']);
    $DateSubjectFall = mysqli_real_escape_string($conn, $_POST['DateSubjectFall']);
    $StudentStatusCheckbox = isset($_POST['StudentStatusCheckbox']) ? $_POST['StudentStatusCheckbox'] : []; // Array of checked student statuses
    $StudentStatusIDs = $_POST['StudentStatusID']; // Array of all student statuses

    // Handle checked students (insert or update as assigned)
    foreach ($StudentStatusCheckbox as $StudentID => $isChecked) {
        if ($isChecked == '1') {
            $StudentStatusID = mysqli_real_escape_string($conn, $StudentStatusIDs[$StudentID]);

            $sql = "INSERT INTO tblsubjectfall (StudentStatusID, ScheduleID, ProgramID, Assigned, DateSubjectFall) 
                    VALUES ('$StudentStatusID', '$ScheduleID', '$ProgramID', '1', '$DateSubjectFall')
                    ON DUPLICATE KEY UPDATE Assigned='1', DateSubjectFall='$DateSubjectFall'";

            // Debugging output to check the query
            if (!mysqli_query($conn, $sql)) {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
        }
    }

    // Handle unchecked students (update as not assigned)
    foreach ($StudentStatusIDs as $StudentID => $StudentStatusID) {
        if (!isset($StudentStatusCheckbox[$StudentID])) {
            $StudentStatusID = mysqli_real_escape_string($conn, $StudentStatusID);

            // Check if the student already has an entry for the given ScheduleID and ProgramID
            $checkQuery = "SELECT 1 FROM tblsubjectfall WHERE StudentStatusID = '$StudentStatusID' AND ScheduleID = '$ScheduleID' AND ProgramID = '$ProgramID' LIMIT 1";
            $checkResult = mysqli_query($conn, $checkQuery);

            if (mysqli_num_rows($checkResult) > 0) {
                // Update only the specific entry for this student, schedule, and program
                $sql = "UPDATE tblsubjectfall SET 
                        Assigned = '0', 
                        DateSubjectFall = '$DateSubjectFall'
                        WHERE StudentStatusID = '$StudentStatusID' AND ScheduleID = '$ScheduleID' AND ProgramID = '$ProgramID'";

                if (!mysqli_query($conn, $sql)) {
                    echo "Error: " . $sql . ":-" . mysqli_error($conn);
                }
            }
        }
    }

    
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['status'] = "Processing Successfully.";
        header("Location: c_subfail.php");
        exit();
    } else {
        echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
    }

    exit();
}









else if (isset($_POST['editsubjectfail'])) {
    $SubjectFallID = $_POST['SubjectFallID'];
    $ProgramID = $_POST['ProgramID'];
    $ScheduleID = $_POST['ScheduleID'];
   
    $StudentStatusCheckbox = $_POST['Assigned']; // Array of checked student statuses
    $DateSubjectFall = $_POST['DateSubjectFall'];

    foreach ($StudentStatusCheckbox as $StudentStatusID => $isAssigned) {
        $isAssigned = $isAssigned == '1' ? 1 : 0; // Convert to integer 1 or 0

        $sql = "UPDATE tblsubjectfall SET 
                Assigned = '$isAssigned', 
                 ProgramID = '$ProgramID', 
                ScheduleID = '$ScheduleID',
               
                DateSubjectFall = '$DateSubjectFall'
                WHERE SubjectFallID = (SELECT SubjectFallID FROM tblsubjectfall WHERE StudentStatusID = $StudentStatusID AND ProgramID = $ProgramID LIMIT 1)";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: ./subfailList.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    }

    header('location: subfailList.php');
    mysqli_close($conn);
}


?>
