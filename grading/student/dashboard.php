<?php
    include('includes/header.php');
    include('includes/sidebar.php');

?>
    <div id="content-wrapper" class="d-flex flex-column page">
            <div id="content">
                    <?php include('includes/navbar.php');?>
                <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <div class="row">

<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">
                        Grades</div>
                    <div class="col">
                        <a href="grade.php" class="h6 mb-0 text-gray-700">View Details</a>    
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-table fa-4x text-warning "></i>
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