<?php
// Include your database connection
include './connection/conn.php';

// Check if ProgramID is set
if (isset($_POST['id'])) {
    $programID = $_POST['id'];
    // echo "Received ProgramID: $programID<br>";  Debugging output

    // Prepare the SQL query
    $query = "
        SELECT 
            tblstudentstatus.StudentStatusID, 
       
            tblstudentinfo.NameInKhmer, 
            tblstudentinfo.NameInLatin 
        FROM tblstudentstatus
        JOIN tblstudentinfo ON tblstudentstatus.StudentID = tblstudentinfo.StudentID
        WHERE tblstudentstatus.ProgramID = ?
    ";
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param('i', $programID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Generate HTML for each row
            while ($row = $result->fetch_assoc()) {
                // $isAssigned = !empty($row['StudentStatusID']); 
                // $isAssigned = 1;
                // echo '<tr>';
                // echo '<td><input type="checkbox" name="assign[]" value="' . $row['StudentStatusID'] . '"' . ($isAssigned ? ' checked' : '') . '></td>';
                // echo '<td>' . $row['StudentStatusID'] . '</td>';
                // echo '<td>' . $row['NameInKhmer'] . '</td>';
                // echo '<td>' . $row['NameInLatin'] . '</td>';
            
                // echo '</tr>';
                echo "<tr>
                <td>
                    <input type='hidden' name='Assigned[{$row['StudentStatusID']}]' value='0'>
                    <input type='checkbox' name='Assigned[{$row['StudentStatusID']}]' value='1' checked>
                </td>
                <td>{$row['StudentStatusID']}</td>
                <td>{$row['NameInLatin']}</td>
                <td>{$row['NameInKhmer']}</td>
               
                <td>Pass</td>
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



<?php
include_once 'Connection/conn.php';

if (isset($_POST['id'])) {
    $ProgramID = $_POST['id'];
    $query = "
        SELECT si.StudentID, si.NameInLatin, si.NameInKhmer, sx.SexNameKH
        FROM tblstudentinfo si 
        JOIN tblstudentstatus ss ON si.StudentID = ss.StudentID 
        JOIN tblsex sx ON si.SexID = sx.SexID
        WHERE ss.ProgramID = '$ProgramID'";
    
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
                <td>
                    <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
                    <input type='checkbox' name='Assigned[{$row['StudentID']}]' value='1' checked>
                </td>
                <td>{$row['StudentID']}</td>
                <td>{$row['NameInLatin']}</td>
                <td>{$row['NameInKhmer']}</td>
                <td>{$row['SexNameKH']}</td>
                <td>Pass</td>
              </tr>";
    }
}
?>








<!-- <?php
// Include your database connection
include './connection/conn.php';

// Check if ProgramID is set
if (isset($_POST['id'])) {
    $programID = $_POST['id'];
    // echo "Received ProgramID: $programID<br>";  // Debugging output

    // Prepare the SQL query
    $query = "
       SELECT 
            tblschedule.ScheduleID, 
            tblschedule.SubjectID, 
            tblsubject.SubjectEN,
            tblschedule.LecturerID,
            tbllecturer.LecturerEN
        FROM tblschedule
        JOIN tblsubject ON tblschedule.SubjectID = tblsubject.SubjectID    
        JOIN tbllecturer ON tblschedule.LecturerID = tbllecturer.LecturerID
        WHERE tblschedule.ProgramID = ?

       
    ";
   
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param('i', $programID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $i = 1;
            // Generate HTML for each row
            while ($row = $result->fetch_assoc()) {
                // Check if the student is assigned
                // $isChecked = ($row['Assigned'] == 1) ? 'checked' : '';
                echo "<tr>
                        <td>
                            <input type='hidden' name='Assigned[{$row['ScheduleID']}]' value='0'>
                            <input type='checkbox' name='Assigned[{$row['ScheduleID']}]' value='1'>
                        </td>
                        <td>{$i}</td>
                      
                        <td>{$row['LecturerEN']}</td>
                        <td>{$row['SubjectEN']}</td>
                    </tr>";
                    $i++ ;
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
?> -->