<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
 

    session_start();

include "./connection/conn.php";

if (isset($_SESSION['user_id']) != "") {
  header("Location: ./index.php");
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '" . $username . "' and password = '" . $password . "'");
  if (!empty($result)) {
    if ($row = mysqli_fetch_array($result)) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_fullname'] = $row['fullname'];
      $_SESSION['user_username'] = $row['username'];
      $_SESSION['user_password'] = $row['password'];
      $_SESSION['user_phone'] = $row['phone'];
      header("Location: ./index.php");
    }
  } else {
    $error_message = "Incorrect Email or Password!!!";
  }

}

include './include/header.php';

  ?>
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background: rgba(34,62,156,255)">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="pb-3">
                <img src="./style/images/biu.png" width="100rem" >
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                  <input type="tesx" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="Password" name= "password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="login">
                 SIGN IN
                  </button>
                  
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
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
