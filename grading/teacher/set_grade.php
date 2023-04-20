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
                <div class="card shadow mb-4" style="width: 95%;">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered-striped table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                <thead style="text-align: center" class="table table-primary">
                                <tr>
                                <th scope="col">School Year</th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Description</th>
                                <th scope="col" style="width: 100px !important;">Students</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                        $sql2 = "SELECT DISTINCT tbl_subjects.subject_id,tbl_subjects.subject_name,tbl_subjects.description,tbl_section_sub.teacher_id,tbl_class.sy_id,tbl_schoolyear.schoolyear 
                                        FROM tbl_subjects JOIN tbl_section_sub ON tbl_section_sub.subject_id = tbl_subjects.subject_id 
                                        JOIN tbl_class ON tbl_section_sub.class_id = tbl_class.class_id JOIN tbl_schoolyear ON tbl_class.sy_id = tbl_schoolyear.sy_id WHERE tbl_section_sub.teacher_id='".$_SESSION['teacher_id']."'";
                                        $result2 = mysqli_query($con,$sql2);

                                        if (mysqli_num_rows($result2) > 0)
                                            {
                                            while ($row2 = $result2-> fetch_assoc())
                                            {
                                                $sy = $row2['schoolyear'];
                                                $subject = $row2['subject_name'];
                                                $desc = $row2['description'];
                                                                         
                                        ?> 
                                        <tr style="text-align: center">
                                            <td><?php echo $sy ?></td>  
                                            <td><?php echo $subject ?></td>
                                            <td><?php echo $desc ?></td>
                                            <td><a href="student_list.php?subject=<?php echo $row2['subject_id']; ?>&teacher=<?php echo $_SESSION['teacher_id']?>&sy=<?php echo $row2['sy_id']?>"class="btn btn-primary btn-sm" style="font-size:10px"><i class="fas fa-eye"></i>&nbsp;&nbsp;View&nbsp;</a></td>
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