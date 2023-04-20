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
                    <h1 class="h5 mb-0 text-gray-800">ACADEMIC RECORD</h1>
                    </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                    <div class="card shadow mb-4" style="width: 95%;">
                        <div class="card-header py-3" style="background-color: #0C2764">
                        <nav aria-label="breadcrumb" role="navigation" style="height: 45px; width: 215px">
                         <ol class="breadcrumb" style="padding-top: 6px; padding-bottom: 5px">
                                <?php
                                    $sy = $_GET['view'];

                                    $sql = "SELECT * FROM tbL_schoolyear WHERE sy_id='$sy'";
                                    $result = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                ?>  
                                    <li class="breadcrumb-item"><a href="sy.php"><i class="fas fa-backward"></i> Back</a></li>
                                    <li class="breadcrumb-item"><?php echo 'S.Y.  ' .$row['schoolyear']; ?></li>
                                        </ol>     
                                    </nav>
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered-striped table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                    <thead style="text-align: center" class="table table-primary">
                                        <tr>
                                            <th scope="col">LRN</th>
                                            <th scope="col">Student Name</th>
                                            <th scope="col" style="width: 100px !important;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $limit = 10;
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $start = ($page -1) * $limit;
                                        $sql2 = "SELECT DISTINCT tbl_students.student_id,tbl_students.lrn,tbl_students.lastname,tbl_students.firstname,tbl_students.middle_initial,tbl_class.sy_id 
                                        FROM tbl_students JOIN tbl_section ON tbl_students.student_id = tbl_section.student_id JOIN tbl_class ON tbl_class.class_id = tbl_section.class_id WHERE tbl_class.sy_id='$sy' LIMIT $start, $limit";
                                        $result = $con-> query($sql2);

                                        $query1 = $con->query("SELECT count(tbl_students.student_id) AS id 
                                        FROM tbl_students JOIN tbl_section ON tbl_students.student_id = tbl_section.student_id JOIN tbl_class ON tbl_class.class_id = tbl_section.class_id WHERE tbl_class.sy_id='$sy'");
                                        $count = $query1-> fetch_all(MYSQLI_ASSOC);
                                        $total = $count[0]['id'];
                                        $pages = ceil($total / $limit);

                                        $previous = $page - 1;
                                        $next = $page + 1; 

                                        if ($result-> num_rows > 0)
                                            {
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $lrn = $row["lrn"];         
                                                $lname = $row["lastname"];     
                                                $fname = $row["firstname"];         
                                                $middle = $row["middle_initial"];                    
                                        ?>         
                                            <tr style="text-align: center">
                                                <td><?php echo $lrn ?></td>
                                                <td><?php echo $lname. ', ' .$fname. ' ' .$middle.'.'?></td>
                                                <td>
                                                <a href="academic.php?student=<?php echo $row['student_id']?>&sy=<?php echo $sy?>" class="btn btn-primary btn-sm" style="font-size:12px"><i class="fas fa-eye"></i>&nbsp;&nbsp;View&nbsp;</a>
                                                </td>
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
                            <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                    <li class="page-item <?php echo $page == 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="records.php?page=<?= $previous; ?>&view=<?php echo $sy?>">Previous</a>
                                        </li>
                                        <?php for($i = 1; $i <= $pages; $i++) : ?>
                                        <li class="page-item"><a class="page-link" href="records.php?page=<?= $i; ?>&view=<?php echo $sy?>"><?= $i; ?></a></li>
                                        <?php endfor; ?>
                                        <li class="page-item <?php echo $page == $pages ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="records.php?page=<?= $next; ?>&view=<?php echo $sy?>">Next</a>
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
