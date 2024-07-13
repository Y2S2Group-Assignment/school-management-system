<nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <!-- <li class="nav-item sidebar-category">
          <p>Navigation</p>
          <span></span>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            <!-- <div class="badge badge-info badge-pill">2</div> -->
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Student Information</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-clipboard-text"></i>
            <span class="menu-title pl-3">Student Form</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="c_information.php">Information Form</a></li>
              <li class="nav-item"> <a class="nav-link" href="c_edu.php">Education Form</a></li>
              <li class="nav-item"> <a class="nav-link" href="c_family.php">Family Form</a></li>
              <li class="nav-item"> <a class="nav-link" href="informationList.php">Information List</a></li>
              <li class="nav-item"> <a class="nav-link" href="educationList.php">Education List</a></li>
              <li class="nav-item"> <a class="nav-link" href="familyList.php">Family List</a></li>
              <!-- <li class="nav-item"> <a class="nav-link" href="c_status.php">Student Status Form</a></li> -->
            </ul>
          </div>
        </li>
     
        <!-- <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#studentList" aria-expanded="false" aria-controls="studentList">
            <i class="mdi mdi-clipboard-text"></i>
            <span class="menu-title pl-3">Student Lists</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="studentList">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="informationList.php">Information List</a></li>
              <li class="nav-item"> <a class="nav-link" href="educationList.php">Education List</a></li>
              <li class="nav-item"> <a class="nav-link" href="familyList.php">Family List</a></li>
            
            </ul>
          </div>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="stuList.php">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Student List</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="statusList.php">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Student Status</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="stuproList.php">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Student Program</span>
          </a>
        </li> -->

        <li class="nav-item sidebar-category">
          <p>Student Fail Subject</p>
          <span></span>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="stuSchedule.php">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Schedule</span>
          </a>
        </li> -->
      
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#subjects" aria-expanded="false" aria-controls="subjects">
            <i class="mdi mdi-clipboard-text"></i>
            <span class="menu-title pl-3">Student Subject</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="subjects">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="stuSchedule.php">Schedule</a></li>
              <li class="nav-item"> <a class="nav-link" href="c_subfail.php">Subject Fail Form</a></li>
              
              <!-- <li class="nav-item"> <a class="nav-link" href="c_edu.php">Education Form</a></li>
              <li class="nav-item"> <a class="nav-link" href="c_family.php">Family Form</a></li> -->
              <!-- <li class="nav-item"> <a class="nav-link" href="c_status.php">Student Status Form</a></li> -->
            </ul>
          </div>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="lecturer.php">
            <i class="mdi mdi-emoticon menu-icon"></i>
            <span class="menu-title">Lecturer</span>
          </a>
        </li> -->
        <!-- <li class="nav-item sidebar-category">
          <p>Report</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="subfailreport.php">
            <i class="mdi mdi-emoticon menu-icon"></i>
            <span class="menu-title">Subject Fail Report</span>
          </a>
        </li> -->
        <li class="nav-item sidebar-category">
          <p>Student Report</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-palette menu-icon"></i>
            <span class="menu-title">BIU Report</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="report">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="subfailreport.php">Student Subject Fail</a></li>
              <li class="nav-item"> <a class="nav-link" href="programreport.php">Student Program</a></li>
              <!-- <li class="nav-item"> <a class="nav-link" href="subject.php">All Subject</a></li>
              <li class="nav-item"> <a class="nav-link" href="batch.php">All Batch</a></li> -->

              <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li> -->
            </ul>
          </div>
        </li>
        <li class="nav-item sidebar-category">
          <p>BIU Detail</p>
          <span></span>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ba" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-palette menu-icon"></i>
            <span class="menu-title">Student Batch</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ba">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="#">New Batch</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
            </ul>
          </div>
        </li> -->
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#faculty" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-palette menu-icon"></i>
            <span class="menu-title">BIU Faculty</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="faculty">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="stuproList.php">All Program</a></li>
              <li class="nav-item"> <a class="nav-link" href="faculty.php">All Faculty</a></li>
              <li class="nav-item"> <a class="nav-link" href="major.php">All Major</a></li>
              <li class="nav-item"> <a class="nav-link" href="subject.php">All Subject</a></li>
              <li class="nav-item"> <a class="nav-link" href="lecturer.php">All Lecutrer</a></li>
              <li class="nav-item"> <a class="nav-link" href="batch.php">All Batch</a></li>

              <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li> -->
            </ul>
          </div>
        </li>
       
        <li class="nav-item sidebar-category">
          <p>Pages</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user.php">
          <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">User Page</span>
          </a>
        </li>

        
        <!-- <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
            </ul>
          </div>
        </li> -->
        <!-- <li class="nav-item sidebar-category">
          <p>Apps</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="docs/documentation.html">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Documentation</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="http://www.bootstrapdash.com/demo/spica/template/">
            <button class="btn bg-danger btn-sm menu-title">Upgrade to pro</button>
          </a>
        </li> -->
      </ul>
    </nav>