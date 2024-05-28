<form action="actionMajor.php" method="POST" enctype="multipart/form-data">
                            <form action="actionMajor.php?id=<?php echo $MajorID; ?>" method="POST">
                                <div
                                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h3 mb-2 text-gray-800">Edit Major</h1>
                                    <div class="btn-toolbar mb-2 mb-md-0">
                                        <div class="btn-group me-2">
                                        <button type="submit" name="btnEdit" class="btn btn-outline-primary btn-sm">
                                                Save
                                            </button>
                                            &nbsp;&nbsp;&nbsp;
                                            <button type="submit" name="btnCancel" class="btn btn-outline-danger btn-sm">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3 mt-4">
                                </div>
                                <?php

                            $MajorID = $_GET['EditID'];
                            $FacultyID = $_GET['FacultyID'];
                            $select_content = "SELECT * FROM tblmajor WHERE MajorID = $MajorID";
                            $resultSub = mysqli_query($conn, $select_content);
                            while ($ConRow = mysqli_fetch_array($resultSub)) {
                                $MajorID = $ConRow['MajorID'];
                                $MajorNameEN = $ConRow['MajorNameEN'];
                                $MajorNameKH = $ConRow['MajorNameKH'];
                                ?>
                                <!-- <input type="hidden" name="id" value="<?= $ConRow['MajorID'] ?? '' ?>"> -->
                                <div class="form-floating mt-3 mb-3">
                                    <select class="form-select" name="FacultyID" id="floatingSelect"
                                        aria-label="Floating label select example">

                                        <?php

                                        $select_mainmenu = "SELECT * FROM tblfaculty";
                                        $resultMain = mysqli_query($conn, $select_mainmenu);

                                        while ($Main_row = mysqli_fetch_array($resultMain)) {
                                            $selected = ($Main_row['FacultyID'] == $ConRow['FacultyID']) ?
                                                'selected' : '';
                                            echo "<option value='" . $Main_row['FacultyID'] . "' $selected>" .
                                                $Main_row['FacultyNameEN'] . "</option>";
                                        }
                                        ;
                                        ?>
                                    </select>
                                    <label> Faculty NameEN</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="hidden" value="<?php echo $MajorID ?>" name="MajorID" class="form-control" id="email"
                                        placeholder="Enter email">
                                    <label for="email">ID</label>
                                </div>
                                <div class="form-floating mb3 mt-3">
                                    <input type="text" value="<?php echo $MajorNameEN ?>" name="MajorNameEN" class="form-control"
                                        id="email" placeholder="Enter email">
                                    <label for="email">FacultyNameEN</label>
                                </div>
                                <div class="form-floating mb3 mt-3">
                                    <input type="text" value="<?php echo $MajorNameKH ?>" name="MajorNameKH" class="form-control"
                                        id="email" placeholder="Enter email">
                                    <label for="email">FacultyNameKH</label>
                                </div>
                                
                    <?php
                    }
                    ;
                    ?>
                            <!-- <button type="submit" name="btnInsert" class="btn btn-primary">Insert</button> -->
                        </form>