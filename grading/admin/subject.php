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
                    <h5 class="h5 mb-0 text-gray-800">SUBJECT</h5>
                    </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                    <div class="card shadow mb-4" style="width: 95%;">
                        <div class="card-header" style="background-color: #0C2764">
                        <nav aria-label="breadcrumb" role="navigation" style="height: 45px; width: 149px">
                            <ol class="breadcrumb" style="padding-top: 5px; padding-bottom: 5px">
                                    <li class="breadcrumb-item">
                                    <button class="btn-round btn-primary btn-sm" data-toggle="modal" data-target="#addsubject">&nbsp;&nbsp; Add Subject &nbsp;</button>
                                    <?php include('includes/add_modal.php')?>
                                    </li>
                            </ol>     
                        </nav>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered-striped table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                    <thead style="text-align: center" class="table table-primary">
                                        <tr>
                                        <th scope="col">Subject name</th>
                                        <th scope="col">Description</th>
                                        <th style="display:none">Id</th>
                                        <th scope="col" style="width:  100px !important;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $limit = 10;
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $start = ($page -1) * $limit;
                                        $query = "SELECT * FROM tbl_subjects LIMIT $start, $limit";
                                        $result = mysqli_query($con,$query);

                                        $query1 = $con->query("SELECT count(subject_id) AS id FROM tbl_subjects");
                                        $count = $query1-> fetch_all(MYSQLI_ASSOC);
                                        $total = $count[0]['id'];
                                        $pages = ceil($total / $limit);

                                        $previous = $page - 1;
                                        $next = $page + 1; 

                                        if(mysqli_num_rows($result) > 0){
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $id = $row['subject_id'];
                                                $name = $row["subject_name"];
                                                $desc = $row["description"];  
                                        ?>            
                                        <tr style="text-align: center">
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $desc ?></td>
                                        <td style="display:none"><?php echo $id?> </td>
                                        <td>
                                        <button type="button" class="btn-round btn-info btn-sm editbtn" style="font-size:10px"><i class="fas fa-info-circle"></i></button>
                                        <button type="button" value="<?php echo $row['subject_id'];?>" class="btn-round btn-danger btn-sm deletebtn" style="font-size:10px"><i class="fas fa-trash"></i></button>
                                        </td>
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
                                        <a class="page-link" href="subject.php?page=<?= $previous; ?>">Previous</a>
                                        </li>
                                        <?php for($i = 1; $i <= $pages; $i++) : ?>
                                        <li class="page-item"><a class="page-link" href="subject.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                                        <?php endfor; ?>
                                        <li class="page-item <?php echo $page == $pages ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="subject.php?page=<?= $next; ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <!-- edit modal for subject -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">   
        <div class="modal-header">
        <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit Subject</h4>
        </div>
        <div class="modal-body">
            <form action="edit_function.php" method="post"> 
                <div class="form-group">
                    <p>Subject Name <input type="text" class="form-control" name="sub" id="sub" placeholder="Subject Name" style='text-align: center;' required/></p>         
                </div>
                
                <div class="form-group">
                    <p>Description <input type="text" class="form-control" name="desc" id="desc" placeholder="Description" style='text-align: center;' required/></p>                    
                </div>

                <div class="form-group">
                <input type="hidden" class="form-control" name="id" id="id" style='text-align: center;' required/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="update_subject" class="btn-round btn-primary btn-sm">Save Changes</button>
            </form>
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
                        $('.delete_subject_id').val(user_id);
                        $('#subjectdeletemodal').modal('show');
                    });
                    $('.editbtn').on('click', function(){
                        $('#editmodal').modal('show');

                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function(){
                            return $(this).text();
                        }).get();

                        console.log(data);

                        $('#sub').val(data[0]);
                        $('#desc').val(data[1]);
                        $('#id').val(data[2]);
                    });
                });

            </script>