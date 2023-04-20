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
                    <h1 class="h5 mb-0 text-gray-800">SECTION'S SUBJECT LIST</h1>
                    </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                    <div class="card shadow mb-4" style="width: 95%;">
                        <div class="card-header"  style="background-color: #0C2764">
                        <nav aria-label="breadcrumb" role="navigation" style="height: 45px; width: 425px">
                         <ol class="breadcrumb" style="padding-top: 6px; padding-bottom: 5px">
                    <?php
                        $sy = $_GET['sy'];
                        $id = $_GET['view'];
                        $sql = "SELECT * FROM tbl_class WHERE class_id='$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                                    <li class="breadcrumb-item">
                                        <a href="section.php?sy=<?php echo $sy?>"><i class="fas fa-backward"></i> Back</a>&nbsp;&nbsp;
                                        <button type="button" class="btn-round btn-primary btn-sm" data-toggle="modal" data-target="#assign_subject">Assign Subject</button>&nbsp;&nbsp;
                                         <?php echo $row['grade_level']. ' - Section ' .$row['section']?>
                                        <?php include('includes/add_modal.php')?>
                                    </li>
                            </ol>     
                        </nav>
                    <div>
                    </div>
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered-striped table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                    <thead style="text-align: center" class="table table-primary">
                                    <tr>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col" style="width: 50px !important;" >Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $limit = 10;
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $start = ($page -1) * $limit;
                                        $sql2 = "SELECT tbl_section_sub.section_sub_id,tbl_subjects.subject_name,tbl_subjects.description,tbl_teachers.firstname,tbl_teachers.lastname 
                                        FROM tbl_subjects JOIN tbl_section_sub ON tbl_subjects.subject_id = tbl_section_sub.subject_id 
                                        JOIN tbl_teachers ON tbl_section_sub.teacher_id = tbl_teachers.teacher_id WHERE class_id='$id' LIMIT $start, $limit";
                                        $result = $con-> query($sql2);

                                        $query1 = $con->query("SELECT count(section_sub_id) AS id FROM tbl_subjects JOIN tbl_section_sub ON tbl_subjects.subject_id = tbl_section_sub.subject_id 
                                        JOIN tbl_teachers ON tbl_section_sub.teacher_id = tbl_teachers.teacher_id WHERE class_id='$id'");
                                        $count = $query1-> fetch_all(MYSQLI_ASSOC);
                                        $total = $count[0]['id'];
                                        $pages = ceil($total / $limit);

                                        $previous = $page - 1;
                                        $next = $page + 1; 

                                        if ($result-> num_rows > 0)
                                            {
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $subject = $row["subject_name"];
                                                $desc = $row["description"];
                                                $fname = $row["firstname"];
                                                $lname = $row["lastname"];                           
                                        ?>         
                                        <tr style="text-align: center">
                                                <td><?php echo $subject ?></td>
                                                <td><?php echo $desc ?></td>
                                                <td><?php echo $fname. ' '  .$lname?></td>
                                                <td><button type="button" value="<?php echo $row['section_sub_id'];?>" class="btn-round btn-danger btn-sm deletebtn" style="font-size:10px"><i class="fas fa-trash"></i></button></td>
                                            </tr>
                                    </tbody>
                                    <?php include('includes/delete_modal.php')?>
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
                            <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                    <li class="page-item <?php echo $page == 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="student_subject.php?page=<?= $previous; ?>&view=<?php echo $id?>&sy=<?php echo $sy?>">Previous</a>
                                        </li>
                                        <?php for($i = 1; $i <= $pages; $i++) : ?>
                                        <li class="page-item"><a class="page-link" href="student_subject.php?page=<?= $i; ?>&view=<?php echo $id?>&sy=<?php echo $sy?>"><?= $i; ?></a></li>
                                        <?php endfor; ?>
                                        <li class="page-item <?php echo $page == $pages  ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="student_subject.php?page=<?= $next; ?>&view=<?php echo $id?>&sy=<?php echo $sy?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                        </div>
                    </div>
                    </div>
                    </div>                    
                </div>
<?php
    include('includes/scripts.php');
?>

<script>
                $(document).ready(function(){
                    $('.deletebtn').click(function (e){
                        e.preventDefault();

                        var user_id =$(this).val();
                        //console.log(user_id);
                        $('.delete_assign_id').val(user_id);
                        $('#assignedsubdeletemodal').modal('show');
                    });
                });

            </script>