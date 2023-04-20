<?php
    include('includes/header.php');
    include('includes/sidebar.php');
    include('../conn.php');
?>
    <div id="content-wrapper" class="d-flex flex-column page" >
            <div id="content">
                    <?php include('includes/navbar.php');?>
                <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 mb-0 text-gray-800">DASHBOARD</h1>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="card shadow mb-4" style="width: 85%;">
                        <div class="card-header py-3">
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                    <?php
                        $sy = $_GET['sy'];
                        $id = $_GET['view'];

                        $sql = "SELECT * FROM tbl_schoolyear WHERE sy_id='$sy'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                    ?>  
                        <li class="breadcrumb-item"><a href="student_class.php?view=<?php echo $id?>&sy=<?php echo $sy?>"><i class="fas fa-backward"></i> Back</a></li>
                        <li class="breadcrumb-item">Student List - S.Y. <?php echo $row['schoolyear']; ?></li>
                            </ol>     
                        </nav>
                     <div>
                        </div>
                      </div>
                        <div class="card-body">
                            <form action="add_function.php" method="POST">
                                <table class="table table-bordered-striped">
                                    <thead style="text-align: center" class="table table-primary">
                                       <th><button type="submit" name="stud_multiple_assign" class="btn btn-info btn-sm">Assign</button></th>
                                        <th>LRN</th>
                                        <th>Student Name</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = "SELECT tbl_students.student_id,tbl_students.lrn,tbl_students.lastname,tbl_students.firstname,tbl_students.middle_initial,tbl_section.class_id,tbl_class.sy_id FROM tbl_students 
                                    JOIN tbl_section ON tbl_students.student_id = tbl_section.student_id 
                                    JOIN tbl_class ON tbl_section.class_id = tbl_class.class_id";
                                    $query_run = mysqli_query($con,$query);

                                    $query1 = "SELECT * FROM tbl_class WHERE class_id='$id'";
                                    $query_run1 = mysqli_query($con,$query1);

                                    if($query_run1-> num_rows > 0){
                                        foreach($query_run1 as $class)
                                        {

                                        }
                                    }
                                    ?>
                                    <?php
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                        ?>
                                            <tr style="text-align: center">
                                                <td style="width: 10px;"><input type="checkbox" name="assign_stud[]" value="<?= $student['student_id']; ?>"></td>
                                                <td style="width: 10px; display:none;"><input type="checkbox" name="class[]" value="<?= $class['class_id'] ?>" checked></td>
                                                <td style="width: 500px;"><?= $student['lrn']?></td>
                                                <td style="width: 500px;"><?= $student['lastname']. ', ' .$student['firstname']. ' ' .$student['middle_initial'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                    else
                                    {
                                        
                                    }
                                    
                                ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
<?php
    include('includes/scripts.php');
?>