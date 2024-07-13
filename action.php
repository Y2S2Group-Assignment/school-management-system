<?php

    session_start();

    include './connection/conn.php';
    
    if(isset($_POST['c_schedule']))
    {
        $id = $_POST['ScheduleID'];
        $SubjectID = $_POST['SubjectID'];
        $LecturerID = $_POST['LecturerID'];
        $DayWeekID = $_POST['DayWeekID'];
        $TimeID = $_POST['TimeID'];
        $RoomID = $_POST['RoomID'];
        $ProgramID = $_POST['ProgramID'];
        $DateStart = $_POST['DateStart'];
        $DateEnd = $_POST['DateEnd'];
        $ScheduleDate = $_POST['ScheduleDate'];
        

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblschedule SET SubjectID ='$SubjectID', LecturerID ='$LecturerID', DayWeekID ='$DayWeekID',
            TimeID ='$TimeID', RoomID ='$RoomID', ProgramID ='$ProgramID',
            DateStart ='$DateStart', DateEnd ='$DateEnd', ScheduleDate ='$ScheduleDate'  
            WHERE ScheduleID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblschedule (SubjectID,LecturerID,DayWeekID ,TimeID ,RoomID ,ProgramID ,DateStart ,DateEnd,ScheduleDate  ) 
            VALUES ('$SubjectID', '$LecturerID','$DayWeekID', '$TimeID','$RoomID', '$ProgramID','$DateStart', '$DateEnd','$ScheduleDate')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: stuSchedule.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }

    if(isset($_POST['c_subjectfail']))
    {
        $id = $_POST['SubjectFallID'];
        $StudentStatusID = $_POST['StudentStatusID'];
        $ScheduleID = $_POST['ScheduleID'];
        $DateSubjectFall = $_POST['DateSubjectFall'];
        

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblsubjectfall SET StudentStatusID ='$StudentStatusID', ScheduleID ='$ScheduleID'
            , DateSubjectFall ='$DateSubjectFall'
             WHERE SubjectFallID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblsubjectfall (StudentStatusID,ScheduleID, DateSubjectFall) 
            VALUES ('$StudentStatusID', '$ScheduleID' , '$DateSubjectFall')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: stuList.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }

    if(isset($_POST['c_lecturer']))
    {
        $id = $_POST['LecturerID'];
        $LecturerName = $_POST['LecturerName'];
        $LecturerEN = $_POST['LecturerEN'];
        $SexID = $_POST['SexID'];
      
        

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tbllecturer SET LecturerName ='$LecturerName', LecturerEN ='$LecturerEN',SexID='$SexID'
       
             WHERE LecturerID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tbllecturer (LecturerName,LecturerEN,SexID) 
            VALUES ('$LecturerName', '$LecturerEN' ,'$SexID')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: lecturer.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }


    if(isset($_POST['c_faculty']))
    {
        $id = $_POST['FacultyID'];
        $FacultyKH = $_POST['FacultyKH'];
        $FacultyEN = $_POST['FacultyEN'];
        

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblfaculty SET FacultyKH ='$FacultyKH', FacultyEN ='$FacultyEN' WHERE FacultyID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblfaculty (FacultyKH,FacultyEN ) 
            VALUES ('$FacultyKH', '$FacultyEN')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: faculty.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }


    if(isset($_POST['c_major']))
    {
        $id = $_POST['MajorID'];
        $MajorKH = $_POST['MajorKH'];
        $MajorEN = $_POST['MajorEN'];
        $FacultyID = $_POST['FacultyID'];
        

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblmajor SET MajorKH ='$MajorKH', MajorEN ='$MajorEN',FacultyID='$FacultyID' WHERE MajorID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblmajor (MajorKH,MajorEN,FacultyID ) 
            VALUES ('$MajorKH', '$MajorEN', '$FacultyID')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: major.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }

    if(isset($_POST['c_subject']))
    {
        $id = $_POST['SubjectID'];
        $SubjectKH = $_POST['SubjectKH'];
        $SubjectEN = $_POST['SubjectEN'];
        $CreditNumber = $_POST['CreditNumber'];
        $Hours = $_POST['Hours'];
        $MajorID = $_POST['MajorID'];
        $YearID = $_POST['YearID'];
        $SemesterID = $_POST['SemesterID'];

        

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblsubject SET SubjectKH ='$SubjectKH', SubjectEN ='$SubjectEN',CreditNumber='$CreditNumber',
             Hours='$Hours',MajorID='$MajorID',YearID='$YearID',SemesterID='$SemesterID' WHERE SubjectID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblsubject (SubjectKH,SubjectEN,CreditNumber,Hours,MajorID,YearID,SemesterID ) 
            VALUES ('$SubjectKH', '$SubjectEN', '$CreditNumber', '$Hours', '$MajorID', '$YearID', '$SemesterID')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: subject.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }

    if(isset($_POST['c_batch']))
    {
        $id = $_POST['BatchID'];
        $BatchKH = $_POST['BatchKH'];
        $BatchEN = $_POST['BatchEN'];
        

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblbatch SET BatchKH ='$BatchKH', BatchEN ='$BatchEN' WHERE BatchID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblbatch (BatchKH,BatchEN ) 
            VALUES ('$BatchKH', '$BatchEN')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: batch.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }
    
    // if(isset($_GET['d_schedule']))
    // {
    //     $delete = $_GET['d_schedule'];

    //     $sql = "DELETE FROM tblschedule WHERE ScheduleID = $delete";
        
    //     if (mysqli_query($conn, $sql)) {
    //         $_SESSION['status'] = "Proccessing Successfully.";
    //         header("Location: stuSchedule.php");
    //         exit();
    //     } else {
    //         echo "Error: " . $sql . ":-" . mysqli_error($conn);
    //     }
    //     mysqli_close($conn);
    // }

    if(isset($_GET['d_schedule'])) {
        $delete = intval($_GET['d_schedule']); // Ensure $delete is an integer to prevent SQL injection
    
        // Begin transaction
        mysqli_begin_transaction($conn);
    
        try {
            // Prepare and execute deletion of dependent rows
            $stmt1 = $conn->prepare("DELETE FROM tblsubjectfall WHERE ScheduleID = ?");
            $stmt1->bind_param("i", $delete);
            if (!$stmt1->execute()) {
                throw new Exception("Error deleting from tblsubjectfall: " . $stmt1->error);
            }
    
            // Prepare and execute deletion of the schedule row
            $stmt2 = $conn->prepare("DELETE FROM tblschedule WHERE ScheduleID = ?");
            $stmt2->bind_param("i", $delete);
            if (!$stmt2->execute()) {
                throw new Exception("Error deleting from tblschedule: " . $stmt2->error);
            }
    
            // Commit transaction
            mysqli_commit($conn);
            $_SESSION['status'] = "Processing Successfully.";
            header("Location: stuSchedule.php");
            exit();
        } catch (Exception $e) {
            // Rollback transaction on error
            mysqli_rollback($conn);
            echo "Error: " . $e->getMessage();
        }
    
        // Close the database connection
        mysqli_close($conn);
    }
    if(isset($_GET['d_subjectfail']))
    {
        $delete = $_GET['d_subjectfail'];

        $sql = "DELETE FROM tblsubjectfall WHERE SubjectFallID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: subfailList.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    
    if(isset($_GET['d_lecturer']))
    {
        $delete = $_GET['d_lecturer'];

        $sql = "DELETE FROM tbllecturer WHERE LecturerID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: lecturer.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    if(isset($_GET['d_subject']))
    {
        $delete = $_GET['d_subject'];

        $sql = "DELETE FROM tblsubject WHERE SubjectID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: subject.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    if(isset($_GET['d_major']))
    {
        $delete = $_GET['d_major'];

        $sql = "DELETE FROM tblmajor WHERE MajorID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: major.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    if(isset($_GET['d_faculty']))
    {
        $delete = $_GET['d_faculty'];

        $sql = "DELETE FROM tblfaculty WHERE FacultyID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: faculty.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    if(isset($_GET['d_stuinfo']))
    {
        $delete = $_GET['d_stuinfo'];

        $sql = "DELETE FROM tblstudentinfo WHERE StudentID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: stuList.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    if(isset($_GET['d_stuedu']))
    {
        $delete = $_GET['d_stuedu'];

        $sql = "DELETE FROM tbleducationalbackground WHERE StudentID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: educationList.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    if(isset($_GET['d_stufamily']))
    {
        $delete = $_GET['d_stufamily'];

        $sql = "DELETE FROM tblfamilybackground WHERE StudentID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: familyList.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    if(isset($_GET['d_program']))
    {
        $delete = $_GET['d_program'];

        $sql = "DELETE FROM tblprogram WHERE ProgramID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: stuproList.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    
    if(isset($_GET['d_status']))
    {
        $delete = $_GET['d_status'];

        $sql = "DELETE FROM tblstudentstatus WHERE StudentStatusID = $delete";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: statusList.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    // if(isset($_POST['c_information']))
    // {
    //     $id = $_POST['StudentID'];
    //     $ProgramID = $_POST['ProgramID'];
    //     $NameInKhmer = $_POST['NameInKhmer'];
    //     $NameInLatin = $_POST['NameInLatin'];
    //     $FamilyName = $_POST['FamilyName'];
    //     $GivenName = $_POST['GivenName'];
    //     $SexID = $_POST['SexID'];
    //     $IDPassportNo = $_POST['IDPassportNo'];
    //     $NationalityID = $_POST['NationalityID'];
    //     $CountryID = $_POST['CountryID'];
    //     $DOB = $_POST['DOB'];
    //     $POB = $_POST['POB'];
    //     $PhoneNumber = $_POST['PhoneNumber'];
    //     $Email = $_POST['Email'];
    //     $CurrentAddress = $_POST['CurrentAddress'];
    //     $CurrentAddressPP = $_POST['CurrentAddressPP'];
    //     // $Photo = $_POST['Photo'];
    //     $RegisterDate = $_POST['RegisterDate'];

    //     if(move_uploaded_file($_FILES["Photo"]["tmp_name"],"./image/".$_FILES["Photo"]["name"]))
    //       {
    //          $Photo = $_FILES["Photo"]["name"];
    //       }


    //     if (!empty($id)) {
    //         // Update operation
    //         $sql = "UPDATE tblstudentinfo SET NameInKhmer ='$NameInKhmer', NameInLatin ='$NameInLatin', FamilyName ='$FamilyName', 
    //         GivenName ='$GivenName', SexID ='$SexID', IDPassportNo ='$IDPassportNo',
    //         NationalityID ='$NationalityID', CountryID ='$CountryID', DOB ='$DOB',
    //         POB ='$POB',PhoneNumber ='$PhoneNumber', Email='$Email',
    //         CurrentAddress ='$CurrentAddress', CurrentAddressPP ='$CurrentAddressPP', Photo ='$Photo',
    //         RegisterDate ='$RegisterDate'
    //         WHERE StudentID = $id ";
            
    //     } 
    //     else {
    //         // Insert operation
    //         $sql = "INSERT INTO tblstudentinfo (ProgramID,NameInKhmer, NameInLatin,FamilyName,GivenName,SexID,IDPassportNo,NationalityID,
    //         CountryID ,DOB,POB,PhoneNumber, Email,CurrentAddress,CurrentAddressPP, Photo,RegisterDate ) 
    //         VALUES ('$ProgramID','$NameInKhmer', '$NameInLatin', '$FamilyName', '$GivenName', '$SexID', '$IDPassportNo',
    //         '$NationalityID', '$CountryID', '$DOB', '$POB', '$PhoneNumber', '$Email', '$CurrentAddress',
    //         '$CurrentAddressPP', '$Photo', '$RegisterDate')";

    //         if($sql){
    //             $sql1 = "INSERT INTO tblstudentstatus (StudentID, ProgramID)
    //             VALUES ('$StudentID' , '$ProgramID')" ;

    //             if(mysqli_query($conn, $sql1))
    //             {
    //                 $_SESSION['status'] = "Proccessing Successfully.";
    //                 header("Location: stuList.php");
    //                 exit();
    //             }
    //             else
    //             {
    //                 echo "alert('Error: ') " . $sql1 . ":-" . mysqli_error($conn);
    //             }
    //         }
        
    //     }

       
    //     mysqli_close($conn);

    // }

    // if (isset($_POST['c_information'])) {
    //     $id = $_POST['StudentID'];
    //     $ProgramID = $_POST['ProgramID'];
    //     $NameInKhmer = $_POST['NameInKhmer'];
    //     $NameInLatin = $_POST['NameInLatin'];
    //     $FamilyName = $_POST['FamilyName'];
    //     $GivenName = $_POST['GivenName'];
    //     $SexID = $_POST['SexID'];
    //     $IDPassportNo = $_POST['IDPassportNo'];
    //     $NationalityID = $_POST['NationalityID'];
    //     $CountryID = $_POST['CountryID'];
    //     $DOB = $_POST['DOB'];
    //     $POB = $_POST['POB'];
    //     $PhoneNumber = $_POST['PhoneNumber'];
    //     $Email = $_POST['Email'];
    //     $CurrentAddress = $_POST['CurrentAddress'];
    //     $CurrentAddressPP = $_POST['CurrentAddressPP'];
    //     $RegisterDate = $_POST['RegisterDate'];
    //     $Photo = null;
    
    //     // Handle file upload
    //     if (move_uploaded_file($_FILES["Photo"]["tmp_name"], "./image/" . $_FILES["Photo"]["name"])) {
    //         $Photo = $_FILES["Photo"]["name"];
    //     }
    
    //     if (!empty($id)) {
    //         // Update operation
    //         $stmt = $conn->prepare("UPDATE tblstudentinfo SET NameInKhmer = ?, NameInLatin = ?, FamilyName = ?, GivenName = ?, SexID = ?, IDPassportNo = ?, NationalityID = ?, CountryID = ?, DOB = ?, POB = ?, PhoneNumber = ?, Email = ?, CurrentAddress = ?, CurrentAddressPP = ?, Photo = ?, RegisterDate = ? WHERE StudentID = ?");
    //         $stmt->bind_param('sssssisissssssssi', $NameInKhmer, $NameInLatin, $FamilyName, $GivenName, $SexID, $IDPassportNo, $NationalityID, $CountryID, $DOB, $POB, $PhoneNumber, $Email, $CurrentAddress, $CurrentAddressPP, $Photo, $RegisterDate, $id);
    //     } else {
    //         // Insert operation for tblstudentinfo
    //         $stmt = $conn->prepare("INSERT INTO tblstudentinfo (ProgramID, NameInKhmer, NameInLatin, FamilyName, GivenName, SexID, IDPassportNo, NationalityID, CountryID, DOB, POB, PhoneNumber, Email, CurrentAddress, CurrentAddressPP, Photo, RegisterDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    //         $stmt->bind_param('isssssissssssssss', $ProgramID, $NameInKhmer, $NameInLatin, $FamilyName, $GivenName, $SexID, $IDPassportNo, $NationalityID, $CountryID, $DOB, $POB, $PhoneNumber, $Email, $CurrentAddress, $CurrentAddressPP, $Photo, $RegisterDate);
    //     }
    
    //     if ($stmt->execute()) {
    //         if (empty($id)) {
    //             // Get the last inserted StudentID
    //             $StudentID = $conn->insert_id;
    
    //             // Insert into tblstudentstatus
    //             $stmt2 = $conn->prepare("INSERT INTO tblstudentstatus (StudentID, ProgramID) VALUES (?, ?)");
    //             $stmt2->bind_param('ii', $StudentID, $ProgramID);
    
    //             if ($stmt2->execute()) {
    //                 $_SESSION['status'] = "Processing Successfully.";
    //                 header("Location: stuList.php");
    //                 exit();
    //             } else {
    //                 echo "Error inserting into tblstudentstatus: " . $stmt2->error;
    //             }
    //             $stmt2->close();
    //         } else {
    //             $_SESSION['status'] = "Processing Successfully.";
    //             header("Location: stuList.php");
    //             exit();
    //         }
    //     } else {
    //         echo "Error: " . $stmt->error;
    //     }
    //     $stmt->close();
    //     mysqli_close($conn);
    // }


    if(isset($_POST['c_information'])) {
        $id = $_POST['StudentID'];
        $ProgramID = $_POST['ProgramID'];
        $NameInKhmer = $_POST['NameInKhmer'];
        $NameInLatin = $_POST['NameInLatin'];
        $FamilyName = $_POST['FamilyName'];
        $GivenName = $_POST['GivenName'];
        $SexID = $_POST['SexID'];
        $IDPassportNo = $_POST['IDPassportNo'];
        $NationalityID = $_POST['NationalityID'];
        $CountryID = $_POST['CountryID'];
        $DOB = $_POST['DOB'];
        $POB = $_POST['POB'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['Email'];
        $CurrentAddress = $_POST['CurrentAddress'];
        $CurrentAddressPP = $_POST['CurrentAddressPP'];
        $RegisterDate = $_POST['RegisterDate'];
        $Assiged = 1;
        $Photo = $_POST['Photo'];
    
        // Handle file upload
        if(move_uploaded_file($_FILES["Photo"]["tmp_name"],"./image/".$_FILES["Photo"]["name"])) {
            $Photo = $_FILES["Photo"]["name"];
        }
    
        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblstudentinfo SET 
                        ProgramID = '$ProgramID',
                        NameInKhmer = '$NameInKhmer', 
                        NameInLatin = '$NameInLatin', 
                        FamilyName = '$FamilyName', 
                        GivenName = '$GivenName', 
                        SexID = '$SexID', 
                        IDPassportNo = '$IDPassportNo',
                        NationalityID = '$NationalityID', 
                        CountryID = '$CountryID', 
                        DOB = '$DOB',
                        POB = '$POB',
                        PhoneNumber = '$PhoneNumber', 
                        Email = '$Email',
                        CurrentAddress = '$CurrentAddress', 
                        CurrentAddressPP = '$CurrentAddressPP', 
                        Photo = '$Photo',
                        RegisterDate = '$RegisterDate'
                    WHERE StudentID = $id";
        } else {
            // Insert operation for tblstudentinfo
            $sql = "INSERT INTO tblstudentinfo (ProgramID, NameInKhmer, NameInLatin, FamilyName, GivenName, SexID, IDPassportNo, NationalityID,
                CountryID, DOB, POB, PhoneNumber, Email, CurrentAddress, CurrentAddressPP, Photo, RegisterDate) 
                VALUES ('$ProgramID', '$NameInKhmer', '$NameInLatin', '$FamilyName', '$GivenName', '$SexID', '$IDPassportNo',
                '$NationalityID', '$CountryID', '$DOB', '$POB', '$PhoneNumber', '$Email', '$CurrentAddress',
                '$CurrentAddressPP', '$Photo', '$RegisterDate')";

                if (mysqli_query($conn, $sql)) {
                    // Get the last inserted StudentID
                    $StudentID = mysqli_insert_id($conn);

                    // Insert into tblstudentstatus
                    $sql1 = "INSERT INTO tblstudentstatus (StudentID,ProgramID,Assigned,Note,AssignDate,Status)
                            VALUES ('$StudentID', '$ProgramID' , '1','Agree',NOW()  , '1')";

                
                } else {
                    echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
                }
    
        }
        
       
        if (mysqli_query($conn, $sql1)) {
            $_SESSION['status'] = "Processing Successfully.";
            header("Location: informationList.php");
            exit();
        } else {
            echo "alert('Error: ') " . $sql1 . ":-" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
    
    


    if(isset($_POST['c_edu']))
    {
        $id = $_POST['EducationalBackgroundID'];
        $SchoolTypeID= $_POST['SchoolTypeID'];
        $NameSchool= $_POST['NameSchool'];
        $AcademicYearID = $_POST['AcademicYearID'];
        $Province = $_POST['Province'];
        $StudentID = $_POST['StudentID'];
       

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tbleducationalbackground SET SchoolTypeID ='$SchoolTypeID', NameSchool ='$NameSchool', AcademicYearID ='$AcademicYearID', 
            Province ='$Province',  StudentID ='$StudentID'
            WHERE EducationalBackgroundID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tbleducationalbackground (SchoolTypeID, NameSchool,AcademicYearID,Province,StudentID ) 
            VALUES ('$SchoolTypeID', '$NameSchool', '$AcademicYearID', '$Province', '$StudentID')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: educationList.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }

    if(isset($_POST['c_family']))
    {
        $id = $_POST['FamilyBackgroundID'];
        $FatherName = $_POST['FatherName'];
        $FatherAge = $_POST['FatherAge'];
        $FatherNationalityID = $_POST['FatherNationalityID'];
        $FatherCountryID = $_POST['FatherCountryID'];
        $FatherOccupationID = $_POST['FatherOccupationID'];
        $MotherName = $_POST['MotherName'];
        $MotherAge = $_POST['MotherAge'];
        $MotherNationalityID = $_POST['MotherNationalityID'];
        $MotherCountryID = $_POST['MotherCountryID'];
        $MotherOccupationID = $_POST['MotherOccupationID'];
        $FamilyCurrentAddress = $_POST['FamilyCurrentAddress'];
        $SpouseName = $_POST['SpouseName'];
        $SpouseAge = $_POST['SpouseAge'];
        $GuardianPhoneNumber = $_POST['GuardianPhoneNumber'];
        // $Photo = $_POST['Photo'];
        $StudentID = $_POST['StudentID'];

       

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblfamilybackground SET FatherName ='$FatherName', FatherAge ='$FatherAge', FatherNationalityID ='$FatherNationalityID', 
            FatherCountryID ='$FatherCountryID', FatherOccupationID ='$FatherOccupationID', MotherName ='$MotherName',
            MotherAge ='$MotherAge', MotherNationalityID ='$MotherNationalityID',MotherCountryID ='$MotherCountryID',
            MotherOccupationID ='$MotherOccupationID',FamilyCurrentAddress ='$FamilyCurrentAddress', SpouseName='$SpouseName',
            SpouseAge ='$SpouseAge', GuardianPhoneNumber ='$GuardianPhoneNumber', StudentID ='$StudentID'
           
            WHERE FamilyBackgroundID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblfamilybackground (FatherName, FatherAge,FatherNationalityID,FatherCountryID,FatherOccupationID,MotherName,MotherAge,MotherNationalityID,
            MotherCountryID ,MotherOccupationID,FamilyCurrentAddress,SpouseName, SpouseAge,GuardianPhoneNumber,StudentID ) 
            VALUES ('$FatherName', '$FatherAge', '$FatherNationalityID','$FatherCountryID' , '$FatherOccupationID', '$MotherName', '$MotherAge',
            '$MotherNationalityID', '$MotherCountryID', '$MotherOccupationID', '$FamilyCurrentAddress', '$SpouseName', '$SpouseAge', '$GuardianPhoneNumber',
            '$StudentID')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: familyList.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }

    if(isset($_POST['c_stuprogram']))
    {
        $id = $_POST['ProgramID'];
        $YearID = $_POST['YearID'];
        $SemesterID = $_POST['SemesterID'];
        $ShiftID = $_POST['ShiftID'];
        $DegreeID = $_POST['DegreeID'];
        $AcademicYearID = $_POST['AcademicYearID'];
        $MajorID = $_POST['MajorID'];
        $BatchID = $_POST['BatchID'];
        $CampusID = $_POST['CampusID'];
        $StartDate = $_POST['StartDate'];
        $EndDate = $_POST['EndDate'];
        

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblprogram SET YearID ='$YearID', SemesterID ='$SemesterID', ShiftID ='$ShiftID', DegreeID ='$DegreeID',
            AcademicYearID ='$AcademicYearID' , MajorID ='$MajorID' , BatchID ='$BatchID' , CampusID ='$CampusID',StartDate='$StartDate',
            EndDate='$EndDate' 
            WHERE ProgramID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblprogram (YearID,SemesterID,ShiftID ,DegreeID ,AcademicYearID,MajorID,BatchID,CampusID,StartDate,EndDate) 
            VALUES ('$YearID', '$SemesterID', '$ShiftID','$DegreeID','$AcademicYearID','$MajorID','$BatchID','$CampusID','$StartDate','$EndDate')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: stuproList.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }


    if(isset($_POST['c_status']))
    {
        $id = $_POST['StudentStatusID'];
        $StudentID= $_POST['StudentID'];
        $ProgramID= $_POST['ProgramID'];
        $Assigned = $_POST['Assigned'];
        $Note = $_POST['Note'];
        $AssignDate = $_POST['AssignDate'];
       

        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblstudentstatus SET StudentID ='$StudentID', ProgramID ='$ProgramID', Assigned ='$Assigned', 
            Note ='$Note',  AssignDate ='$AssignDate'
            WHERE StudentStatusID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblstudentstatus (StudentID, ProgramID,Assigned,Note,AssignDate ) 
            VALUES ('$StudentID', '$ProgramID', '$Assigned', '$Note', '$AssignDate')";
        
        }

        if(mysqli_query($conn, $sql))
        {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: statusList.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }



    if(isset($_POST['register'])){

        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        if (!empty($id)) {
            $sql = "UPDATE `tbl_user` SET fullname = '$fullname',username = '$username',email = '$email',password = '$password', phone = '$phone'
            WHERE id = $id ";
   
        }else{
            $sql = "INSERT INTO tbl_user (fullname,username,email,password,phone) VALUES ('$fullname','$username','$email','$password','$phone')";

        }

        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Proccessing Successfully.";
            header("Location: user.php");
            exit();
        } else {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);    
    }

    

    if(isset($_GET['d_user'])){
        $delete = $_GET['d_user'];

        $sql = " DELETE FROM tbl_user WHERE id = $delete ";

        if (mysqli_query($conn, $sql)) {
        
            $_SESSION['status'] = "User has been removed successfully.";
            header("Location: user.php");
            exit();
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
        
    }
?>

