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
            
              

                $sql = " SELECT * FROM tblstudentstatus ";
                $result = mysqli_query($conn, $sql);
                $i = 1;

            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Student Program List</h4>
                                <div class="pt-3 pb-3">
                                    <a href="c_status.php">
                                        <button type="button" class="btn btn-primary w-15 float-right">Add New Program</button>
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
                                                    Student
                                                </th>
                                                <th>
                                                    Program
                                                </th>
                                                <th>
                                                    Assigned
                                                </th>
                                                <th>
                                                    Note
                                                </th>
                                                <th>
                                                    Assign Date
                                                </th>
                                                
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $StudentID = $row['StudentID'];
                                                $ProgramID = $row['ProgramID'];
                                              
                                                ?>
                                                <tr>
                                                    <td class="py-1">
                                                        <?= $i++ ?>.
                                                        
                                                    </td>
                                                   
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu = "SELECT * FROM tblstudentinfo WHERE StudentID = $StudentID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data['NameInLatin'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                        
                                                    <?php 
                                                        //include "../connection/conn.php";
                                                        $select_menu = "SELECT * FROM tblprogram WHERE ProgramID = $ProgramID";
                                                        $resultMenu=mysqli_query($conn,$select_menu);
                                                        while( $row_data=mysqli_fetch_assoc($resultMenu)){
                                                    ?> 
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row_data['ProgramID'] ?>
                                                            </b>
                                                        </td>
                                                    <?php } ?>
                                                   
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row['Assigned'] ?>
                                                            </b>
                                                        </td>
                                                    
                                                   
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row['Note'] ?>
                                                            </b>
                                                        </td>
                                                   
                                                        <td class="text-center ">
                                                            <b>
                                                                <?php echo $row['AssignDate'] ?>
                                                            </b>
                                                        </td>
                                                    
                                                   
                                                    <td>
                                                        <a href="c_status.php?edit_status=<?php echo $row['StudentStatusID'] ?> ">
                                                            <button class="btn btn-outline-primary btn-sm edit_borrower"
                                                                type="button"><i class="fa fa-edit">
                                                                </i></button>
                                                        </a>
                                                        <a href="action.php?d_status=<?php echo $row['StudentStatusID'] ?>" >
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