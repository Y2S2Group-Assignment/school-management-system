


<!DOCTYPE html>
<html lang="en">

<?php
    require 'function.php';
    include ('./include/header.php');
?>

<body>
<div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <?php include('./include/sidebar.php'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:./partials/_navbar.html -->
        <?php include('./include/nav.php'); ?>

        <?php
            // session_start();
            include './connection/conn.php';

            // SQL query to join tblstudentinfo with tbleducationalbackground on StudentID
            $sql = "
                SELECT 
                    tblstudentinfo.StudentID,
                    tblstudentinfo.Photo,
                    tblstudentinfo.NameInKhmer,
                    tblstudentinfo.NameInLatin,
                    tblstudentinfo.SexID,
                    tblstudentinfo.PhoneNumber,
                    tblsex.SexEN
                FROM tblstudentinfo
                INNER JOIN tblfamilybackground ON tblstudentinfo.StudentID = tblfamilybackground.StudentID
                LEFT JOIN tblsex ON tblstudentinfo.SexID = tblsex.SexID
                ORDER BY tblstudentinfo.StudentID DESC
            ";

            $result = mysqli_query($conn, $sql);
            $i = 1;
        ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Student Family Background List</h4>
                            <div class="pt-3 pb-3">
                                <a href="c_family.php">
                                <button type="button" class="btn btn-primary w-15 float-right">Add New Student Family Background</button>
                                </a>
                            </div>

                            <div class="table-responsive">
                                <hr>
                                <?php alertMessage(); ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student Photo</th>
                                            <th>Khmer Name</th>
                                            <th>Latin Name</th>
                                            <th>Gender</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (mysqli_num_rows($result) > 0): ?>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td class="py-1"><b><?= $i ?>.</b></td>
                                                    <td><img src="./image/<?= $row['Photo'] ?>"></td>
                                                    <td><b><?= $row['NameInKhmer'] ?></b></td>
                                                    <td><b><?= $row['NameInLatin'] ?></b></td>
                                                    <td class="text-center"><b><?= $row['SexEN'] ?></b></td>
                                                    <td><b><?= $row['PhoneNumber'] ?></b></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">Dropdown</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="stuEdu.php?stuEdu=<?= $row['StudentID'] ?>">1. Detail</a>
                                                                <a class="dropdown-item" href="c_edu.php?edit_edu=<?= $row['StudentID'] ?>">2. Edit</a>
                                                                <a class="dropdown-item" href="action.php?d_stuedu=<?= $row['StudentID'] ?>">3. Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php } ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center">No records found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
    </div>

    <?php
    // Close the connection
    mysqli_close($conn);
    ?>

    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
</body>
</html>
