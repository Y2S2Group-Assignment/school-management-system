<!DOCTYPE html>
<html lang="en">

<?php
    require 'function.php';
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
                include_once ("./connection/conn.php");

                if (isset($_GET['get'])) {
                $Batch = $_GET['get'];
                $query = "SELECT * FROM tblstudentinfo WHERE BatchID = $Batch ";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                

                }
            ?>
            
            
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title pb-3">Faculty List</h4>
                                <!-- <div class="pt-3 pb-3">
                                    <a href="c_faculty.php">
                                        <button type="button" class="btn btn-primary w-15">Add New Faculty</button>
                                    </a>
                                </div> -->
                                <input type="hidden" name="BatchEN"
                                value=" <?php echo isset($row['BatchID']) ?>" >

                                <?php
                                    alertMessage();
                                ?>
                                <?php
                                    // session_start();
                                    include './connection/conn.php';
                                
                                    $sql = " SELECT * FROM tblfaculty";
                                    $result = mysqli_query($conn, $sql);
                                    $i = 1;

                                ?>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    N0.
                                                </th>
                                                <th>
                                                    Faculty Name KH
                                                </th>
                                                <th>
                                                    Faculty Name EN
                                                </th>
                                                <!-- <th>
                                                    DateTime
                                                </th> -->
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($subrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td class="py-1">
                                                        <?= $i++ ?>.
                                                    </td>
                                                    <td>
                                                        <?= $subrow['FacultyKH'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $subrow['FacultyEN'] ?>
                                                    </td>
                                                   
                                                    <?php
                                                        // session_start();
                                                        include './connection/conn.php';
                                                    
                                                        $sql = " SELECT * FROM tblmajor WHERE FacultyID ";
                                                        $result = mysqli_query($conn, $sql);
                                                        $i = 1;

                                                    ?>
                                                    <td>
                         
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">Dropdown</button>
                                                            <div class="dropdown-menu">
                                                                <?php
                                                                while ($sub1row = mysqli_fetch_assoc($result)) {
                                                                    // $row['BatchID'] = $sub1row['MajorID'];
                                                                    ?>
                                                                
                                                                    <a class="dropdown-item" href="studentInfo.php?get<?php echo $sub1row['MajorID']; ?> ">
                                                                        <?= $sub1row['MajorEN'] ?>
                                                                    </a>
                                                                    
                                                                    
                                                                <?php } ?> 
                                                            </div>                         
                                                        </div>
                                                    
                                                    
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