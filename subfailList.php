<!DOCTYPE html>
<html lang="en">

<?php
    require 'function.php';

    include './connection/conn.php';
    include ('./include/header.php');
?>


<body>
    <div class="container-scroller d-flex">
        <!-- partial:./partials/_sidebar.html -->
        <?php
        include ('./include/sidebar.php');
        ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <?php 
                include('./include/nav.php');
            ?>
            
            <?php
                // session_start();
                include './connection/conn.php';

                $sql = " SELECT * FROM tblsubjectfall ";
                $result = mysqli_query($conn, $sql);
                $i = 1;

            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Student Subject Fail List</h4>
                                <div class="pt-3 pb-3">
                                    <a href="c_subfail.php">
                                        <button type="button" class="btn btn-primary w-15 float-right">Add New Subject Fail</button>
                                    </a>
                                </div>

                                

                                <div class="table-responsive">
                                    <hr>
                                    <?php
                                    alertMessage();
                                ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    N0.
                                                </th>
                                                <th>
                                                    Student Name
                                                </th>
                                                <th>
                                                    Schedule
                                                </th>
                                                <th>
                                                    Lecturer
                                                </th>
                                                <th>
                                                   Program
                                                </th>
                                               
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $StudentStatusID = $row['StudentStatusID'];
                                                $ScheduleID = $row['ScheduleID'];
                                                $Assigned = $row['Assigned'];
                                                // $MajorID = $row['MajorID'];
                                                // $BatchID = $row['BatchID'];
                                                // $CampusID = $row['CampusID'];
                                                if($Assigned == 1){

                                                
                                                ?>
                                                
                                                <tr>
                                                    <td class="py-1">
                                                        <b><?= $i++ ?>.</b>
                                                        
                                                    </td>
                                                   
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu = "SELECT * FROM tblstudentstatus WHERE StudentStatusID = $StudentStatusID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                            $StudentID = $row_data['StudentID'];
                                                    ?> 
                                                        <td>
                                                            <?php 
                                                                $select_new = "SELECT * FROM tblstudentinfo WHERE StudentID = $StudentID";
                                                                $resultSubmenu=mysqli_query($conn,$select_new);
                                                                while( $row_newdata=mysqli_fetch_assoc($resultSubmenu)){
                                                            ?>
                                                            <b>
                                                                <?php echo $row_newdata['NameInLatin'] ?>
                                                            </b>
                                                            <?php } ?>
                                                        </td>
                                                    <?php } ?>
                                        
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu = "SELECT * FROM tblschedule WHERE ScheduleID = $ScheduleID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                            $SubjectID = $row_data['SubjectID'];
                                                            $LecturerID = $row_data['LecturerID'];
                                                            $ProgramID = $row_data['ProgramID'];
                                                        ?> 
                                                       
                                                        <td>
                                                            <?php 
                                                                $select_new = "SELECT * FROM tblsubject WHERE SubjectID = $SubjectID";
                                                                $resultSubmenu=mysqli_query($conn,$select_new);
                                                                while( $row_newdata=mysqli_fetch_assoc($resultSubmenu)){
                                                            ?>
                                                            <b>
                                                                <?php echo $row_newdata['SubjectEN'] ?>
                                                            </b>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                $select_new = "SELECT * FROM tbllecturer WHERE LecturerID = $LecturerID";
                                                                $resultSubmenu=mysqli_query($conn,$select_new);
                                                                while( $row_newdata=mysqli_fetch_assoc($resultSubmenu)){
                                                            ?>
                                                            <b>
                                                                <?php echo $row_newdata['LecturerEN'] ?>
                                                            </b>
                                                            <?php } ?>
                                                        </td>
                                                        <?php 
                                                       
                                                       $select_menu = "SELECT * FROM tblprogram WHERE ProgramID = $ProgramID";
                                                       $resultMenu=mysqli_query($conn,$select_menu);
                                                       while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                           $YearID = $row_data['YearID'];
                                                           $SemesterID = $row_data['SemesterID'];
                                                           $MajorID = $row_data['MajorID'];

                                                        ?> 
                                                       <td class=" ">
                                                           <b>
                                                               <?php 
                                                               
                                                               if (isset($YearID )) {
                                                                   $subselect_menu1 = "SELECT * FROM tblyear WHERE YearID = $YearID";
                                                                   $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                         
                                                                   while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                     echo "<b>" . $row_subdata1['YearEN'] .'/'. "</b>";
                                                                   }
                                                                 }
                                                                 if (isset($SemesterID )) {
                                                                   $subselect_menu1 = "SELECT * FROM tblsemester WHERE SemesterID = $SemesterID";
                                                                   $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                         
                                                                   while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                     echo "<b>" . $row_subdata1['SemesterEN'] .'/'. "</b>";
                                                                   }
                                                                 }
                                                                 if (isset($MajorID )) {
                                                                   $subselect_menu1 = "SELECT * FROM tblmajor WHERE MajorID = $MajorID";
                                                                   $subresultMenu1 = mysqli_query($conn, $subselect_menu1);
                                         
                                                                   while ($row_subdata1 = mysqli_fetch_assoc($subresultMenu1)) {
                                                                     echo "<b>" . $row_subdata1['MajorEN'] . "</b>";
                                                                   }
                                                                 }

                                                               ?>
                                                           </b>
                                                        </td>
                                                        <?php } ?>
                                                   
                                                   
                                                    <?php } ?>  
                                                    <td>
                                                        <a href="e_subfail.php?edit_subjectfail=<?php echo $row['SubjectFallID'] ?> ">
                                                            <button class="btn btn-outline-primary btn-sm edit_borrower"
                                                                type="button"><i class="fa fa-edit">
                                                                </i></button>
                                                        </a>
                                                        <a href="action.php?d_subjectfail=<?php echo $row['SubjectFallID'] ?>" >
                                                            <button class="btn btn-outline-danger btn-sm delete_borrower"
                                                                type="button"><i class="fa fa-trash"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <?php } ?>

                                            <?php } ?>
                                        
                                        </tbody>

                                    </table>


                                </div>
                            </div>
                        </div>

                    </div>



                </div>
                <!-- row end -->
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:./partials/_footer.html -->
            <footer class="footer">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                                bootstrapdash.com 2020</span>
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By:
                                <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                    templates</a> from Bootstrapdash.com</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


</body>

</html>
<script>
    $('.alert').alert();
</script>