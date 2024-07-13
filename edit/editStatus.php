<?php
// Include your database connection
include '../connection/conn.php';

// Check if ProgramID is set
if (isset($_POST['id'])) {
    $StudentStatusID = $_POST['id'];
    // echo "Received ProgramID: $programID<br>";  // Debugging output

    // Prepare the SQL query
    $query = "
         SELECT 
            tblstudentinfo.StudentID, 
            tblstudentinfo.NameInKhmer, 
            tblstudentinfo.NameInLatin 
        FROM tblstudentinfo
        JOIN tblstudentstatus 
            ON tblstudentinfo.StudentID = tblstudentstatus.StudentID
        WHERE tblstudentstatus.StudentStatusID = ?

       
    ";
   
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param('i', $StudentStatusID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Generate HTML for each row
            while ($row = $result->fetch_assoc()) {
                // Check if the student is assigned
                // $isChecked = ($row['Assigned'] == 1) ? 'checked' : '';
                echo "<tr>
                        <td>
                            <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
                            <input type='checkbox' name='Assigned[{$row['StudentID']}]' value='1' checked>
                        </td>
                        <td>{$row['StudentID']}</td>
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

