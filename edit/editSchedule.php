<?php 


include_once("../connection/conn.php");


// if (isset($_POST['id']) && isset($_POST['SubjectFallID'])) {
//     $programID = $_POST['id'];
//     $subjectFallID = $_POST['SubjectFallID'];

//     // Retrieve the SubjectFallID details from tblsubjectfall
//     $stmtSubjectFall = $conn->prepare("SELECT * FROM tblsubjectfall WHERE SubjectFallID = ?");
//     if ($stmtSubjectFall === false) {
//         error_log("Error preparing statement for tblsubjectfall: " . $conn->error);
//         echo '<option selected disabled value="">Database error</option>';
//         exit();
//     }
    
//     $stmtSubjectFall->bind_param("i", $subjectFallID);
//     $stmtSubjectFall->execute();
//     $resultSubjectFall = $stmtSubjectFall->get_result();
//     if ($resultSubjectFall->num_rows === 0) {
//         echo '<option selected disabled value="">Subject Fall ID not found</option>';
//         exit();
//     }
//     $subjectFall = $resultSubjectFall->fetch_assoc(); // Fetch the subject fall data
//     $scheduleIDexist = $subjectFall['ScheduleID'];

//     // Prepare the main query to fetch schedules
//     $stmt = $conn->prepare("SELECT * FROM tblschedule WHERE ProgramID = $programID");
//     if ($stmt === false) {
//         error_log("Error preparing statement for tblschedule: " . $conn->error);
//         echo '<option selected disabled value="">Database error</option>';
//         exit();
//     }

//     $stmt->bind_param("i", $programID);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     $out = '<option selected disabled value="">Select Schedule</option>';

//     while ($row = $result->fetch_assoc()) {
//         $scheduleID = $row['ScheduleID']; // Fetch schedule ID from tblschedule

//         // Fetch other necessary details (e.g., SubjectID, LecturerID) for display
//         $subjectID = $row['SubjectID'];
//         $lecturerID = $row['LecturerID'];

//         // Prepare the query for SubjectEN
//         $stmtSubject = $conn->prepare("SELECT SubjectEN FROM tblsubject WHERE SubjectID = ?");
//         if ($stmtSubject === false) {
//             error_log("Error preparing statement for tblsubject: " . $conn->error);
//             continue;
//         }
//         $stmtSubject->bind_param("i", $subjectID);
//         $stmtSubject->execute();
//         $subjectResult = $stmtSubject->get_result();
//         $subjectEN = '';
//         if ($subjectRow = $subjectResult->fetch_assoc()) {
//             $subjectEN = $subjectRow['SubjectEN'];
//         }

//         // Prepare the query for LecturerEN
//         $stmtLecturer = $conn->prepare("SELECT LecturerEN FROM tbllecturer WHERE LecturerID = ?");
//         if ($stmtLecturer === false) {
//             error_log("Error preparing statement for tbllecturer: " . $conn->error);
//             continue;
//         }
//         $stmtLecturer->bind_param("i", $lecturerID);
//         $stmtLecturer->execute();
//         $lecturerResult = $stmtLecturer->get_result();
//         $lecturerEN = '';
//         if ($lecturerRow = $lecturerResult->fetch_assoc()) {
//             $lecturerEN = $lecturerRow['LecturerEN'];
//         }

//         // Debugging output
//         error_log("SubjectID: $subjectID, LecturerID: $lecturerID, ScheduleID: $scheduleID");
//         error_log("SubjectEN: $subjectEN, LecturerEN: $lecturerEN");

//         // Construct the option element with ScheduleID as the value
//         $selected = ($scheduleID == $scheduleIDexist) ? 'selected' : '';
//         if (!empty($subjectEN)) {
//             $out .= '<option value="' . $scheduleID . '" ' . $selected . '>' . $lecturerEN . ' [' . $subjectEN . ']</option>';
//             $displayedSubjects[] = $subjectID; // Mark this SubjectID as displayed
//         }

//         // Close the prepared statements
//         $stmtSubject->close();
//         $stmtLecturer->close();
//     }

//     // Close the main prepared statement
//     $stmt->close();

//     echo $out;
// } else {
//     echo '<option selected disabled value="">Invalid Program ID or Subject Fall ID</option>';
// }

// // Close the database connection
// $conn->close();


if (isset($_POST['id']) && isset($_POST['SubjectFallID'])) {
    $programID = $_POST['id'];
    $subjectFallID = $_POST['SubjectFallID'];

    // Retrieve the SubjectFallID details from tblsubjectfall
    $stmtSubjectFall = $conn->prepare("SELECT * FROM tblsubjectfall WHERE SubjectFallID = ?");
    if ($stmtSubjectFall === false) {
        error_log("Error preparing statement for tblsubjectfall: " . $conn->error);
        echo '<option selected disabled value="">Database error</option>';
        exit();
    }

    $stmtSubjectFall->bind_param("i", $subjectFallID);
    $stmtSubjectFall->execute();
    $resultSubjectFall = $stmtSubjectFall->get_result();
    if ($resultSubjectFall->num_rows === 0) {
        echo '<option selected disabled value="">Subject Fall ID not found</option>';
        exit();
    }
    $subjectFall = $resultSubjectFall->fetch_assoc(); // Fetch the subject fall data
    $scheduleIDexist = $subjectFall['ScheduleID'];

    // Prepare the main query to fetch schedules
    $stmt = $conn->prepare("SELECT * FROM tblschedule WHERE ProgramID = ?");
    if ($stmt === false) {
        error_log("Error preparing statement for tblschedule: " . $conn->error);
        echo '<option selected disabled value="">Database error</option>';
        exit();
    }

    $stmt->bind_param("i", $programID);
    $stmt->execute();
    $result = $stmt->get_result();

    $out = '<option selected disabled value="">Select Schedule</option>';
    $displayedSubjects = []; // Initialize the array to track displayed subjects

    while ($row = $result->fetch_assoc()) {
        $scheduleID = $row['ScheduleID']; // Fetch schedule ID from tblschedule

        // Fetch other necessary details (e.g., SubjectID, LecturerID) for display
        $subjectID = $row['SubjectID'];
        $lecturerID = $row['LecturerID'];

        // Prepare the query for SubjectEN
        $stmtSubject = $conn->prepare("SELECT SubjectEN FROM tblsubject WHERE SubjectID = ?");
        if ($stmtSubject === false) {
            error_log("Error preparing statement for tblsubject: " . $conn->error);
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
            error_log("Error preparing statement for tbllecturer: " . $conn->error);
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
        error_log("SubjectID: $subjectID, LecturerID: $lecturerID, ScheduleID: $scheduleID");
        error_log("SubjectEN: $subjectEN, LecturerEN: $lecturerEN");

        // Construct the option element with ScheduleID as the value
        if (!empty($subjectEN) && !in_array($subjectID, $displayedSubjects)) {
            $selected = ($scheduleID == $scheduleIDexist) ? 'selected' : '';
            $out .= '<option value="' . $scheduleID . '" ' . $selected . '>' . $lecturerEN . ' [' . $subjectEN . ']</option>';
            $displayedSubjects[] = $subjectID; // Mark this SubjectID as displayed
        }

        // Close the prepared statements
        $stmtSubject->close();
        $stmtLecturer->close();
    }

    // Close the main prepared statement
    $stmt->close();

    echo $out;
} else {
    echo '<option selected disabled value="">Invalid Program ID or Subject Fall ID</option>';
}

// Close the database connection
$conn->close();



    
?>
