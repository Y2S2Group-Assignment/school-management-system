



<?php
// Include your database connection
include './connection/conn.php';

// Check if ProgramID is set
// if (isset($_POST['id'])) {
//     $programID = $_POST['id'];
//     $timeID = 1; // Assuming you want to fetch data for TimeID = 1

//     // Prepare the SQL query
//     $query = "
//         SELECT 
//             tblsubject.SubjectEN, 
//             tbllecturer.LecturerEN,
//             tbltime.TimeName,
//             tbldayweek.DayWeekID
//         FROM tblschedule
//         JOIN tblsubject 
//             ON tblschedule.SubjectID = tblsubject.SubjectID
//         JOIN tbllecturer 
//             ON tblschedule.LecturerID = tbllecturer.LecturerID
//         JOIN tbltime 
//             ON tblschedule.TimeID = tbltime.TimeID
//         JOIN tbldayweek 
//             ON tblschedule.DayWeekID = tbldayweek.DayWeekID
//         WHERE tblschedule.ProgramID = ? AND tblschedule.TimeID = ?
//     ";

//     $stmt = $conn->prepare($query);
    
//     if ($stmt) {
//         $stmt->bind_param('ii', $programID, $timeID);
//         if ($stmt->execute()) {
//             $result = $stmt->get_result();
            
//             // Prepare a nested array to store the schedule
//             $schedule = [];
//             $timeName = '';

//             while ($row = $result->fetch_assoc()) {
//                 $schedule[$row['DayWeekID']] = [
//                     'SubjectEN' => $row['SubjectEN'],
//                     'LecturerEN' => $row['LecturerEN']
//                 ];
//                 $timeName = $row['TimeName']; // Assuming TimeName is the same for all rows
//             }

//             // Output the table header once
//             echo "<table>
//                     <thead>
//                         <tr>
//                           <th>Time</th>
//                           <th>Monday</th>
//                           <th>Tuesday</th>
//                           <th>Wednesday</th>
//                           <th>Thursday</th>
//                           <th>Friday</th>
//                         </tr>
//                     </thead>
//                     <tbody>";

//             // Output the time row (since we are only dealing with TimeID = 1)
//             echo "<tr>
//                     <td>{$timeName}</td>";

//             // Loop through days of the week and output the data
//             for ($day = 1; $day <= 5; $day++) {
//                 if (isset($schedule[$day])) {
//                     echo "<td>{$schedule[$day]['SubjectEN']}<br>{$schedule[$day]['LecturerEN']}</td>";
//                 } else {
//                     echo "<td>No class</td>";
//                 }
//             }

//             echo "</tr>";
//             echo "</tbody></table>";

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
//     $programID = $_POST['id'];

//     // Prepare the SQL query
//     $query = "
//         SELECT 
//             tblsubject.SubjectEN, 
//             tbllecturer.LecturerEN,
//             tbltime.TimeName,
//              tbltime.ShiftID,
//               tblshift.ShiftID,
//             tbldayweek.DayWeekID,
//              tblschedule.ScheduleID
//         FROM tblschedule
//         JOIN tblsubject 
//             ON tblschedule.SubjectID = tblsubject.SubjectID
//         JOIN tbllecturer 
//             ON tblschedule.LecturerID = tbllecturer.LecturerID
//         JOIN tbltime 
//             ON tblschedule.TimeID = tbltime.TimeID
//         JOIN tblshift 
//             ON tblshift.ShiftID = tbltime.ShiftID
//         JOIN tbldayweek 
//             ON tblschedule.DayWeekID = tbldayweek.DayWeekID
//         WHERE tblschedule.ProgramID = ? AND tbltime.ShiftID = ?
//     ";

//     $stmt = $conn->prepare($query);
    
//     if ($stmt) {
//         $stmt->bind_param('ii', $programID , $ShiftID);
//         if ($stmt->execute()) {
//             $result = $stmt->get_result();
            
//             // Prepare a nested array to store the schedule
//             $schedule = [];
//             $timeNames = [];

//             while ($row = $result->fetch_assoc()) {
              
//                 // $scheduleID = $row['ScheduleID'];
//                 $schedule[$row['TimeName']][$row['DayWeekID']] = [
//                     'SubjectEN' => $row['SubjectEN'],
//                     'LecturerEN' => $row['LecturerEN'],
//                     'ScheduleID' => $row['ScheduleID'] // Include ScheduleID
//                 ];
//                 $timeNames[$row['TimeName']] = $row['TimeName'];
//             }

//             // Output the table header once
//             echo "<table class='table table-bordered' style='color: black'>
//                     <thead >
//                         <tr>
//                           <th>Time</th>
//                           <th>Monday</th>
//                           <th>Tuesday</th>
//                           <th>Wednesday</th>
//                           <th>Thursday</th>
//                           <th>Friday</th>
//                         </tr>
//                     </thead>
//                     <tbody >";


//             foreach ($timeNames as $timeName) {
//                 echo "<tr>
//                         <td>{$timeName}</td>";
            
//                 for ($day = 1; $day <= 5; $day++) {
//                     if (isset($schedule[$timeName][$day])) {
//                         $scheduleID = $schedule[$timeName][$day]['ScheduleID']; // Fetch ScheduleID
                        
//                         echo "
//                         <td>
//                             {$schedule[$timeName][$day]['SubjectEN']}<br>
//                             Lecturer: {$schedule[$timeName][$day]['LecturerEN']}<br>
//                             <div class='pt-2'>
//                                 <a href='c_schedule.php?edit_schedule={$scheduleID}'>Edit</a>
//                                 <a href='action.php?d_schedule={$scheduleID}' class='float-right'>Delete</a>
                                
//                             </div>
//                         </td>";
//                     } else {
//                         echo "<td>No class</td>";
//                     }
//                 }
            
//                 echo "</tr>";
//             }
            
            

//             echo "</tbody></table>";

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



if (isset($_POST['id']) && isset($_POST['shiftId'])) {
    $programID = $_POST['id'];
    $ShiftID = $_POST['shiftId'];

    // Prepare the SQL query
    $query = "
        SELECT 
            tblsubject.SubjectEN, 
            tbllecturer.LecturerEN,
            tbltime.TimeName,
            tbltime.ShiftID,
            tbldayweek.DayWeekID,
            tblschedule.ScheduleID
        FROM tblschedule
        JOIN tblsubject 
            ON tblschedule.SubjectID = tblsubject.SubjectID
        JOIN tbllecturer 
            ON tblschedule.LecturerID = tbllecturer.LecturerID
        JOIN tbltime 
            ON tblschedule.TimeID = tbltime.TimeID
        JOIN tbldayweek 
            ON tblschedule.DayWeekID = tbldayweek.DayWeekID
        WHERE tblschedule.ProgramID = ? AND tbltime.ShiftID = ?
    ";

    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('ii', $programID, $ShiftID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            
            // Prepare a nested array to store the schedule
            $schedule = [];
            $timeNames = [];

            while ($row = $result->fetch_assoc()) {
                $schedule[$row['TimeName']][$row['DayWeekID']] = [
                    'SubjectEN' => $row['SubjectEN'],
                    'LecturerEN' => $row['LecturerEN'],
                    'ScheduleID' => $row['ScheduleID'] // Include ScheduleID
                ];
                $timeNames[$row['TimeName']] = $row['TimeName'];
            }

            if ($result->num_rows > 0) {
            // Output the table header once
            echo " <div class='col-lg-12 grid-margin stretch-card'>
            <div class='card'>
              <div class='card-body'>
                <h4 class='card-title'>Student Schedule List</h4>
            <table class='table table-bordered' style='color: black'>
                    <thead>
                        <tr>
                          <th>Time</th>
                          <th>Monday</th>
                          <th>Tuesday</th>
                          <th>Wednesday</th>
                          <th>Thursday</th>
                          <th>Friday</th>
                        </tr>
                    </thead>
                    <tbody>
                    </div>
              </div>
            </div>";

            foreach ($timeNames as $timeName) {
                echo "<tr>
                        <td>{$timeName}</td>";

                for ($day = 1; $day <= 5; $day++) {
                    if (isset($schedule[$timeName][$day])) {
                        $scheduleID = $schedule[$timeName][$day]['ScheduleID']; // Fetch ScheduleID
                        
                        echo "
                        <td>
                            {$schedule[$timeName][$day]['SubjectEN']}<br>
                            Lecturer: {$schedule[$timeName][$day]['LecturerEN']}<br>
                            <div class='pt-2'>
                                <a href='c_schedule.php?edit_schedule={$scheduleID}'>Edit</a>
                                <a href='action.php?d_schedule={$scheduleID}' class='float-right'>Delete</a>
                            </div>
                        </td>";
                    } else {
                        echo "<td>No class</td>";
                    }
                }

                echo "</tr>";
            }

            echo "</tbody></table>";
            }else{
                echo "<div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body '>
                    <p  style='color: red;'>No data exists for the selected program and schedule.</p>
                  </div>
                </div>
              </div>";
            }

        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "No Program ID or Shift ID provided.";
}

$conn->close();


?>


