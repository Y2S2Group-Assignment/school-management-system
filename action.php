<?php

    session_start();

    include './connection/conn.php';
    

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

    if(isset($_POST['c_information']))
    {
        $id = $_POST['StudentID'];
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
        // $Photo = $_POST['Photo'];
        $RegisterDate = $_POST['RegisterDate'];

        if(move_uploaded_file($_FILES["Photo"]["tmp_name"],"./image/".$_FILES["Photo"]["name"]))
          {
             $Photo = $_FILES["Photo"]["name"];
          }


        if (!empty($id)) {
            // Update operation
            $sql = "UPDATE tblstudentinfo SET NameInKhmer ='$NameInKhmer', NameInLatin ='$NameInLatin', FamilyName ='$FamilyName', 
            GivenName ='$GivenName', SexID ='$SexID', IDPassportNo ='$IDPassportNo',
            NationalityID ='$NationalityID', CountryID ='$CountryID', DOB ='$DOB',
            POB ='$POB',PhoneNumber ='$PhoneNumber', Email='$Email',
            CurrentAddress ='$CurrentAddress', CurrentAddressPP ='$CurrentAddressPP', Photo ='$Photo',
            RegisterDate ='$RegisterDate'
            WHERE StudentID = $id ";
            
        } 
        else {
            // Insert operation
            $sql = "INSERT INTO tblstudentinfo (NameInKhmer, NameInLatin,FamilyName,GivenName,SexID,IDPassportNo,NationalityID,
            CountryID ,DOB,POB,PhoneNumber, Email,CurrentAddress,CurrentAddressPP, Photo,RegisterDate ) 
            VALUES ('$NameInKhmer', '$NameInLatin', '$FamilyName', '$GivenName', '$SexID', '$IDPassportNo',
            '$NationalityID', '$CountryID', '$DOB', '$POB', '$PhoneNumber', '$Email', '$CurrentAddress',
            '$CurrentAddressPP', '$Photo', '$RegisterDate')";
        
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
            header("Location: stuList.php");
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
            header("Location: stuList.php");
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
            header("Location: stuList.php");
            exit();
        }
        else
        {
            echo "alert('Error: ') " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }
?>

