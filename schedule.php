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
            
              

                $sql = " SELECT * FROM tblschedule ";
                $result = mysqli_query($conn, $sql);
                $i = 1;

            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Student Schedule List</h4>
                                <div class="pt-3 pb-3">
                                    <a href="c_schedule.php">
                                        <button type="button" class="btn btn-primary w-15 float-right">Add New Schedule</button>
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
                                                    Subject
                                                </th>
                                                <th>
                                                    Lecturer
                                                </th>
                                                <th>
                                                    DayWeek
                                                </th>
                                                <th>
                                                    Time
                                                </th>
                                                <th>
                                                    Room
                                                </th>
                                                <th>
                                                    Program
                                                </th>
                                                <th>
                                                    Date:Start-End
                                                </th>
                                                <th>
                                                    Schedule Date
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $SubjectID = $row['SubjectID'];
                                                $LecturerID = $row['LecturerID'];
                                                $DayWeekID = $row['DayWeekID'];
                                                $TimeID = $row['TimeID'];
                                                $RoomID = $row['RoomID'];
                                                $ProgramID = $row['ProgramID'];
                                               
                                                ?>
                                                <tr>
                                                    <td class="py-1">
                                                        <?= $i++ ?>.
                                                        
                                                    </td>
                                                   
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu = "SELECT * FROM tblsubject WHERE SubjectID = $SubjectID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data['SubjectEN'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                        
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu = "SELECT * FROM tbllecturer WHERE LecturerID = $LecturerID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data['LecturerName'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu = "SELECT * FROM tbldayweek WHERE DayWeekID = $DayWeekID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data['DayWeekName'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu = "SELECT * FROM tbltime WHERE TimeID = $TimeID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                            $ShiftID = $row_data['$ShiftID'];
                                                    ?> 
                                                        
                                                            <?php 
                                                            //include "../connection/conn.php";
                                                            $select_menu1 = "SELECT * FROM tblshift WHERE ShiftID = $ShiftID";
                                                            $resultMenu1=mysqli_query($conn,$select_menu1);
                                                            while( $row_data1=mysqli_fetch_assoc($resultMenu1)){
                                                            ?>
                                                            <td class="text-center ">
                                                             <b><?php echo $row_data1['ShiftEN'].' - '. $row_data1['TimeName'] ?></b>
                                                             </td>
                                                            <?php }?>
                                                        
                                                    <?php } ?>
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu = "SELECT * FROM tblroom WHERE RoomID = $RoomID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                            $CampusID = $row_data['CampusID'];
                                                    ?> 
                                                        
                                                        <?php 
                                                            //include "../connection/conn.php";
                                                            $select_menu1 = "SELECT * FROM tblcampus WHERE CampusID = $CampusID";
                                                            $resultMenu1=mysqli_query($conn,$select_menu1);
                                                            while( $row_data1=mysqli_fetch_assoc($resultMenu1)){
                                                            ?>
                                                            <td class="text-center ">
                                                             <b><?php echo $row_data1['CampusEN'].' - '. $row_data1['RoomName'] ?></b>
                                                             </td>
                                                            <?php }?>
                                                       
                                                    <?php } ?>



                                                    <?php 
                                                      
                                                        $select_menu = "SELECT * FROM tblprogram WHERE ProgramID = $ProgramID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                            $YearID = $row_data['YearID'];
                                                            $SemesterID = $row_data['SemesterID'];
                                                            $ShiftID = $row_data['ShiftID'];
                                                            $MajorID = $row_data['MajorID'];
                                                            $BatchID = $row_data['BatchID'];
                                                            $CampusID = $row_data['CampusID'];
                                                    ?> 
                                                        <td class="text-center ">
                                                            <?php 
                                                            
                                                                $select_menu1 = "SELECT * FROM tblyear WHERE YearID = $YearID";
                                                                $resultMenu1=mysqli_query($conn,$select_menu1);
                                                                while( $row_data1=mysqli_fetch_assoc($resultMenu1)){
                                                                ?> 
                                                                    
                                                                <b>
                                                                    <?php echo $row_data1['YearEN']. ' ' ?>
                                                                </b>
                                                                
                                                            <?php } ?>
                                                            <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu2 = "SELECT * FROM tblsemester WHERE SemesterID = $SemesterID";
                                                        $resultMenu2=mysqli_query($conn,$select_menu2);
                                                        while( $row_data2=mysqli_fetch_assoc($resultMenu2)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data2['SemesterEN'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu3 = "SELECT * FROM tblshift WHERE ShiftID = $ShiftID";
                                                        $resultMenu3=mysqli_query($conn,$select_menu3);
                                                        while( $row_data3=mysqli_fetch_assoc($resultMenu3)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data3['ShiftEN'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu4 = "SELECT * FROM tblmajor WHERE MajorID = $MajorID";
                                                        $resultMenu4=mysqli_query($conn,$select_menu4);
                                                        while( $row_data4=mysqli_fetch_assoc($resultMenu4)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data4['MajorEN'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu5 = "SELECT * FROM tblbatch WHERE BatchID = $BatchID";
                                                        $resultMenu5=mysqli_query($conn,$select_menu5);
                                                        while( $row_data5=mysqli_fetch_assoc($resultMenu5)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data5['BatchEN'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu6 = "SELECT * FROM tblcampus WHERE CampusID = $CampusID";
                                                        $resultMenu6=mysqli_query($conn,$select_menu6);
                                                        while( $row_data6=mysqli_fetch_assoc($resultMenu6)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data6['CampusEN'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                                        </td>
                                                    <?php } ?>

                                                    <td>
                                                        <a href="c_schedule.php?edit_schedule=<?php echo $row['ScheduleID'] ?> ">
                                                            <button class="btn btn-outline-primary btn-sm edit_borrower"
                                                                type="button"><i class="fa fa-edit">
                                                                </i></button>
                                                        </a>
                                                        <a href="action.php?d_schedule=<?php echo $row['ScheduleID'] ?>" >
                                                            <button class="btn btn-outline-danger btn-sm delete_borrower"
                                                                type="button"><i class="fa fa-trash"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>

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