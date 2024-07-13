<!DOCTYPE html>
<html lang="en">

<head>
<?php 
include './include/header.php';
?>
</head>

<body>
<?php
        include_once ("./connection/conn.php");

        if (isset($_GET['edit_user'])) {
          $edit = $_GET['edit_user'];
          $query = "SELECT * FROM tbl_user WHERE id = $edit ";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
        }
      ?>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex" >
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background: rgba(34,62,156,255)">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <!-- <img src="../../images/logo.svg" alt="logo"> -->
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="action.php" method="POST">
              <input type="hidden" name="id"
              value="<?php echo isset($row['id']) ? $row['id'] : '' ?>">
              <div class="form-group">
                  <input type="text" name="fullname" class="form-control form-control-lg" id="exampleInputEmail1" 
                  placeholder="FullName" value="<?php echo isset($row['fullname']) ? $row['fullname'] : '' ?>">
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputUsername1" 
                  placeholder="Username" value="<?php echo isset($row['username']) ? $row['username'] : '' ?>">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" 
                  placeholder="Email" value="<?php echo isset($row['email']) ? $row['email'] : '' ?>">
                </div>
               
                <!-- <div class="form-group">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option>Country</option>
                    <option>United States of America</option>
                    <option>United Kingdom</option>
                    <option>India</option>
                    <option>Germany</option>
                    <option>Argentina</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" 
                  placeholder="Password" value="<?php echo isset($row['password']) ? $row['password'] : '' ?>">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                <button  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="register">
                 SIGN UP
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="./user.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
