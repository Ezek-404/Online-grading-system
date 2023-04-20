<?php
    include('includes/header.php');
    include('includes/sidebar.php');
?>
    <div id="content-wrapper" class="d-flex flex-column page" >
            <div id="content">
                    <?php include('includes/navbar.php');?>
                <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h5 class="h5 mb-0 text-gray-800">DASHBOARD</h5>
                </div>

<div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                            Students</div>
                        <div class="col">
                            <a href="student.php" class="h6 mb-0 text-gray-700">View Details</a>    
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-4x text-primary "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                            Subjects</div>
                            <div class="col">
                                <a href="subject.php" class="h6 mb-0 text-gray-700">View Details</a></div>
                            </div>
                    <div class="col-auto">
                        <i class="fas fa-th-list fa-4x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">
                            Teachers</div>
                            <div class="col">
                                <a href="teacher.php" class="h6 mb-0 text-gray-700">View Details</a>
                            </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-4x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">
                            Section</div>
                        <div class="col">
                            <a href="section.php" class="h6 mb-0 text-gray-800">View Details</a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-university fa-4x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
            </div>
        </div>
<?php
    include('includes/scripts.php');
?>