<?php
    include('includes/header.php');
    include('includes/sidebar.php');
    include('../conn.php');
?>
    <div id="content-wrapper" class="d-flex flex-column page">
            <div id="content">
                    <?php include('includes/navbar.php');?>
                    <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Set Grade</h1>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                <div class="card shadow mb-6" style="width: 85%;">
                <div class="card-header py-3">
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                            <?php
                                   $c_id = $_GET['class'];
                                   $s_id = $_GET['subject'];
                                   $stud = $_GET['stud'];
                                   $sy = $_GET['sy'];

                                    $sql = "SELECT * FROM tbl_subjects WHERE subject_id='$s_id'";
                                    $result = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_assoc($result);

                                    $sql1 = "SELECT * FROM tbl_class WHERE class_id='$c_id'";
                                    $result1 = mysqli_query($con, $sql1);
                                    $row1 = mysqli_fetch_assoc($result1);

                                    $sql2 = "SELECT * FROM tbl_students WHERE student_id='$stud'";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                   

                                ?>
                            <li class="breadcrumb-item"><a href="student_list.php?subject=<?php echo $s_id?>&teacher=<?php echo $_SESSION['teacher_id']?>&sy=<?php echo $sy?>"><i class="fas fa-fast-backward"></i>&nbsp;Back</a></li>
                            <li class="breadcrumb-item"><?php echo $row1['grade_level']. ' - Section ' .$row1['section']. ' - '  .$row['subject_name']. ' ' .$row['description'];?></li>
                            </ol>     
                        </nav>
                    <div class="row">
                    <div class="card-header py-1">Name: &nbsp;
                        <strong><?php echo $row2['lastname'].', '.$row2['firstname'].' '.$row2['middle_initial']; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;
                      </div>
                        <div class="col-md-6 mb-4 py-1">
                        <button class="btn-round btn-primary btn-sm" data-toggle="modal" data-target="#addgrade">&nbsp;&nbsp; Add Grade &nbsp;</button>
                        <?php include('includes/add_modal.php'); ?>
                        </div>
                    </div>
                        <div class="row d-flex justify-content-center table-responsive">
                        <table class="table table-bordered table-sm col-md-9" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                <thead style="text-align: center" class="table table-primary">
                                <tr>
                                <th scope="col">1st Grading</th>
                                <th scope="col">2nd Grading</th>
                                <th scope="col">3rd Grading</th>
                                <th scope="col">4th Grading</th>
                                <th scope="col">Average
                                </thead>
                                    <tbody>
                                    <?php
                                    $sql2 = "SELECT tbl_grades.first,tbl_grades.second,tbl_grades.third,tbl_grades.fourth,tbl_grades.student_id,tbl_section_sub.teacher_id,tbl_grades.subject_id FROM tbl_grades  
                                    JOIN tbl_section_sub ON tbl_grades.subject_id = tbl_section_sub.subject_id WHERE tbl_grades.student_id='$stud' AND tbl_grades.subject_id='$s_id' 
                                    AND tbl_grades.teacher_id='".$_SESSION['teacher_id']."' AND tbl_section_sub.class_id = '$c_id' AND tbl_grades.sy_id='$sy'";
                                        $result2 = mysqli_query($con,$sql2);

                                        if (mysqli_num_rows($result2) > 0)
                                            {
                                            while ($row2 = $result2-> fetch_assoc())
                                            {
                                                $first = $row2['first'];
                                                $second = $row2['second'];
                                                $third = $row2['third'];
                                                $fourth = $row2['fourth'];
                                                                         
                                        ?> 
                                        <tr style="text-align: center">
                                            <td><?php echo $first ?></td>
                                            <td><?php echo $second ?></td>
                                            <td><?php echo $third ?></td>
                                            <td><?php echo $fourth ?></td>
                                            <?php
                                                if($first > 0 && $second > 0 && $third > 0 && $fourth > 0){
                                                    $avg = ($first+$second+$third+$fourth)/4;
                                                    echo "<td>".$avg."</td>";
                                                }else{
                                                    echo "<td></td>";
                                                }
                                            ?>
                                        </tr>
                                    </tbody>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "";
                                        }
                                        ?>        
                                </table>
                        </div>
                </div>
                </div>
            </div>
        </div>
     </div>
<?php
    include('includes/scripts.php');
?>
