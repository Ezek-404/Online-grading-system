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
                    <h5 class="h5 mb-0 text-gray-800">TEACHER</h5>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                <div class="card shadow mb-4" style="width: 95%;">
                        <div class="card-header" style="background-color: #0C2764">
                        <nav aria-label="breadcrumb" role="navigation" style="height: 45px; width: 150px">
                            <ol class="breadcrumb" style="padding-top: 5px; padding-bottom: 5px">
                                    <li class="breadcrumb-item">
                                    <button class="btn-round btn-primary btn-sm" data-toggle="modal" data-target="#addteacher">&nbsp;&nbsp; Add Teacher &nbsp;</button>
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
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Middle initial</th>
                                <th style="display:none">Id</th>
                                <th scope="col" style="width: 100px !important;">Option</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                        $limit = 10;
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $start = ($page -1) * $limit;
                                        $query = "SELECT * FROM tbl_teachers LIMIT $start, $limit";
                                        $result = mysqli_query($con,$query);

                                        $query1 = $con->query("SELECT count(teacher_id) AS id FROM tbl_teachers");
                                        $count = $query1-> fetch_all(MYSQLI_ASSOC);
                                        $total = $count[0]['id'];
                                        $pages = ceil($total / $limit);

                                        $previous = $page - 1;
                                        $next = $page + 1; 

                                        if ($result-> num_rows > 0)
                                            {
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $id = $row["teacher_id"];
                                                $uname = $row["username"];
                                                $pass = $row["password"];
                                                $lname = $row["lastname"];
                                                $fname = $row["firstname"];
                                                $initial = $row["middle_initial"];
                                            
                                        ?>  
                                        <tr style="text-align: center">
                                            <td><?php echo $uname ?></td>
                                            <td><?php echo $pass ?></td>
                                            <td><?php echo $lname ?></td>
                                            <td><?php echo $fname ?></td>
                                            <td><?php echo $initial ?></td>
                                            <td style="display:none"><?php echo $id?> </td>
                                            <td>
                                            <button type="button" class="btn-round btn-info btn-sm editbtn" style="font-size:10px"><i class="fas fa-info-circle"></i></button>
                                            <button type="button" value="<?php echo $row['teacher_id'];?>" class="btn-round btn-sm btn-danger deletebtn" style="font-size:10px"><i class="fas fa-trash"></i></button>
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
                                        <a class="page-link" href="teacher.php?page=<?= $previous; ?>">Previous</a>
                                        </li>
                                        <?php for($i = 1; $i <= $pages; $i++) : ?>
                                        <li class="page-item"><a class="page-link" href="teacher.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                                        <?php endfor; ?>
                                        <li class="page-item <?php echo $page == $pages ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="teacher.php?page=<?= $next; ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                        </div>
                    </div>  
            </div>
                </div>
        </div>

        <!-- edit modal for teacher -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
      <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit Teacher</h4>
      </div>
        <div class="modal-body">

            <form action="edit_function.php" method="post">
                <div class="form-group">
                    <p>Username <input type="text" class="form-control" name="uname" id="uname" placeholder="Username" style='text-align: center;' required/></p>
                </div>

                <div class="form-group">
                    <p>Password <input type="text" class="form-control" name="pass" id="pass" placeholder="Password" style='text-align: center;' required/></p>
                </div>

                <div class="form-group">
                    <p>Lastname <input type="text" class="form-control" name="lname" id="lname" placeholder="Lastname" style='text-align: center;' required/></p>            
                </div>

                <div class="form-group">
                    <p>Firstname <input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname" style='text-align: center;' required/></p>                   
                </div>

                <div class="form-group">
                    <p>Middle Initial <input type="text" class="form-control" name="middle" id="middle" placeholder="Middle initial" style='text-align: center;' required/></p>
                </div>             
                
                <div class="form-group">
                 <input type="hidden" class="form-control" name="id" id='id' placeholder="Middle initial" style='text-align: center;' />
                </div>                                    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="update_teacher" class="btn-round btn-primary btn-sm">Save Changes</button>
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
                        $('.delete_user_id').val(user_id);
                        $('#teacherdeletemodal').modal('show');
                    });
                    $('.editbtn').on('click', function(){
                        $('#editmodal').modal('show');

                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function(){
                            return $(this).text();
                        }).get();

                        console.log(data);

                        $('#uname').val(data[0]);
                        $('#pass').val(data[1]);
                        $('#lname').val(data[2]);
                        $('#fname').val(data[3]);
                        $('#middle').val(data[4]);
                        $('#id').val(data[5]);
                    });
                });

            </script>