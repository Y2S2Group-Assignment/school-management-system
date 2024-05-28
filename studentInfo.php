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

            
            
            
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title pb-3">Student Information</h4>
                               

                                <?php
                                    alertMessage();
                                ?>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    N0.
                                                </th>
                                                <th>
                                                    Student Photo
                                                </th>
                                                <th>
                                                    Khmer Name
                                                </th>
                                                <th>
                                                    Latin Name
                                                </th>
                                                <th>
                                                    Gender
                                                </th>
                                                <th>
                                                    Contact
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php
                include_once ("./connection/conn.php");

                if (isset($_GET['get'])) {
                    $Batch = $_GET['BatchID'];
                $Major = $_GET['get'];
                $query = "SELECT * FROM tblstudentinfo WHERE MajorID = $Major AND BatchID = $Batch";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $i = 1;
                }
            ?>
                                        <tbody>
                                        <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                            <tr>
                                                <td class="py-1">
                                                    <?= $i++ ?>.
                                                </td>
                                                <td>
                                                    <?= $row['StudentID'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['NameInKhmer'] ?>
                                                </td>
                                                
                                                
                                                <td>
                        
                                                    
                                                
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