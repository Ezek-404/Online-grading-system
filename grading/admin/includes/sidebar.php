<?php
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<ul class="nav navbar-nav sidebar sidebar-dark accordion" style="background-color: #0C2764;" id="accordionSidebar">
    <br><br><br>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                <img src="../picture/logo.png" alt="logo" width="170" height="170">
                </div>
            </a>
            <br><br><br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active <?= ($activePage == 'dashboard') ? 'active_side':''; ?>">
                <a class="nav-link href" href="dashboard.php">
                    <i class="fab fa-dashcube fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>DASHBOARD</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active <?= ($activePage == 'subject') ? 'active_side':''; ?>">
                <a class="nav-link href" href="subject.php">
                    <i class="fas fa-file-medical-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>SUBJECTS</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active <?= ($activePage == 'student') ? 'active_side':''; ?>">
                <a class="nav-link href" href="student.php">
                    <i class="fas fa-user-graduate"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>STUDENTS</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active <?= ($activePage == 'teacher') ? 'active_side':''; ?>">
                <a class="nav-link href" href="teacher.php">
                    <i class="fas fa-user-tie"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>TEACHERS</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active <?= ($activePage == 'sy' || $activePage == 'records' || $activePage == 'academic' || 
            $activePage == 'section' || $activePage == 'student_subject' || $activePage == 'student_class')? 'active_side':''; ?>">
                <a class="nav-link href" href="sy.php">
                    <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>SCHOOL YEAR</span></a>
            </li>
            <li class="nav-item active <?= ($activePage == 'bin')? 'active_side':''; ?>">
                <a class="nav-link href" href="bin.php">
                    <i class="fas fa-recycle"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>DATA RECOVERY</span></a>
            </li>
            
        </ul>
