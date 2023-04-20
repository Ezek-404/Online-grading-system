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
                <div class="card shadow mb-4" style="width: 85%;">
                        <div class="card-body">
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                            <?php
                                    $s_id = $_GET['subject'];
                                    $sy = $_GET['sy'];
                                    $sql = "SELECT * FROM tbl_subjects WHERE subject_id='$s_id'";
                                    $result = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                            <li class="breadcrumb-item"><a href="set_grade.php"><i class="fas fa-backward"></i>&nbsp;Back</a></li>
                            <li class="breadcrumb-item active"><?php echo $row['subject_name']. ' - ' .$row['description'];?></li>
                            </ol>     
                        </nav>
                            <div class="table-responsive">
                                <table class="table table-bordered-striped table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                <thead style="text-align: center" class="table table-primary">
                                <tr>
                                <th scope="col">Year Level & Section</th>
                                <th scope="col">LRN</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Firstname</th>
                                <th scope="col" style="width: 100px !important;">Grade</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                        $query = "SELECT tbl_students.student_id, tbl_students.lrn, tbl_students.firstname, tbl_students.lastname, tbl_section.class_id, tbl_section_sub.subject_id, tbl_class.grade_level, tbl_class.section, tbl_class.sy_id 
                                        FROM tbl_students JOIN tbl_section ON tbl_section.student_id = tbl_students.student_id JOIN tbl_section_sub ON tbl_section_sub.class_id = tbl_section.class_id 
                                        JOIN tbl_class ON tbl_section_sub.class_id = tbl_class.class_id WHERE tbl_class.sy_id='$sy' AND tbl_section_sub.subject_id='$s_id' AND teacher_id='".$_SESSION['teacher_id']."' ORDER BY grade_level,section,lastname";
                                        $result = mysqli_query($con,$query);

                                        if(mysqli_num_rows($result) > 0){
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $lrn = $row['lrn'];
                                                $fname = $row['firstname'];
                                                $lname = $row['lastname'];
                                                $yr = $row['grade_level'];
                                                $sec = $row['section'];

                                        ?>           
                                        <tr style="text-align: center">
                                                <td><?php echo $yr. ' - Section ' .$sec ?></td>
                                                <td><?php echo $lrn?></td>
                                                <td><?php echo $lname ?></td>
                                                <td><?php echo $fname ?></td>
                                                <td><a href="student_grade.php?stud=<?php echo $row['student_id']; ?>&class=<?php echo $row['class_id'] ?>&sy=<?php echo $sy?>&subject=<?php echo $row['subject_id'];?>&teacher=<?php echo $_SESSION['teacher_id']?>" class="btn btn-primary btn-sm" style="font-size:10px"><i class="fas fa-eye"></i>&nbsp;&nbsp;View&nbsp;</a></td>
                                         </tr>
                                    </tbody>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "<tr>";
                                            echo "<td style='text-align: center' colspan=4><strong><i>~No Existing Record~</i></strong></td>"; 
                                            echo "</tr>";
                                        }
                                        $con-> close();
                                        ?>   
                                </table>
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