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
                        <h1 class="h3 mb-0 text-gray-800">Grades</h1>
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
                                <th scope="col">Grade & Section</th>
                                <th scope="col" style="width: 100px !important;">Grade</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                        $sql2 = "SELECT tbl_class.grade_level,tbl_class.section,tbl_section.class_id,tbl_schoolyear.schoolyear,tbl_schoolyear.sy_id,tbl_section.student_id FROM tbl_class
                                        JOIN tbl_schoolyear ON tbl_class.sy_id = tbl_schoolyear.sy_id JOIN tbl_section ON tbl_class.class_id = tbl_section.class_id WHERE tbl_section.student_id='".$_SESSION['student_id']."' ORDER BY schoolyear";
                                        $result2 = mysqli_query($con,$sql2);

                                        if (mysqli_num_rows($result2) > 0)
                                            {
                                            while ($row2 = $result2-> fetch_assoc())
                                            {
                                                $level = $row2['grade_level'];
                                                $sec = $row2['section'];
                                                $sy = $row2['schoolyear'];                                                 
                                        ?> 
                                        <tr style="text-align: center">
                                        <td><?php echo $sy ?></td>
                                            <td><?php echo $level. ' - Section ' .$sec ?></td>
                                            <td><a href="viewgrades.php?view=<?php echo $row2['class_id']; ?>&sy=<?php echo $row2['sy_id'];?>" class="btn btn-primary btn-sm" style="font-size:12px"><i class="fas fa-eye"></i>&nbsp;&nbsp;View&nbsp;</a></td>
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