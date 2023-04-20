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
            
            <li class="nav-item active <?= ($activePage == 'grade' || $activePage == 'viewgrades') ? 'active_side':''; ?>">
                <a class="nav-link href" href="grade.php">
                    <i class="fas fa-table fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>GRADES</span></a>
            </li>

        </ul>