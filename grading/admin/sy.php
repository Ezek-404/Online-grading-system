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
                    <h5 class="h5 mb-0 text-gray-800">SCHOOL YEAR</h5>
                    </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                    <div class="card shadow mb-4" style="width: 95%;">
                        <div class="card-header" style="background-color: #0C2764">
                        <nav aria-label="breadcrumb" role="navigation" style="height: 45px; width: 180px">
                            <ol class="breadcrumb" style="padding-top: 5px; padding-bottom: 5px">
                                    <li class="breadcrumb-item">
                                    <button class="btn-round btn-primary btn-sm" data-toggle="modal" data-target="#addschoolyear">&nbsp;&nbsp; Add School Year &nbsp;</button>
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
                                            <th scope="col">School Year</th>
                                            <th style="display:none">Id</th>
                                            <th scope="col" style="width: 150px !important;">Section</th>
                                            <th scope="col" style="width: 150px !important;">View Records</th>
                                            <th scope="col" style="width: 100px !important;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $limit = 10;
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $start = ($page -1) * $limit;
                                        $query = "SELECT * FROM tbl_schoolyear LIMIT $start, $limit";
                                        $result = mysqli_query($con,$query);

                                        $query1 = $con->query("SELECT count(sy_id) AS id FROM tbl_schoolyear");
                                        $count = $query1-> fetch_all(MYSQLI_ASSOC);
                                        $total = $count[0]['id'];
                                        $pages = ceil($total / $limit);

                                        $previous = $page - 1;
                                        $next = $page + 1; 

                                        if ($result-> num_rows > 0)
                                            {
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $sy = $row["schoolyear"];    
                                                $id = $row["sy_id"];                      
                                        ?>         
                                            <tr style="text-align: center">
                                                <td><?php echo $sy ?></td>
                                                <td style="display:none"><?php echo $id?> </td>
                                                <td>
                                                    <a href="section.php?sy=<?php echo $row['sy_id'];?>" class="btn btn-primary btn-sm" style="font-size:12px"><i class="fas fa-eye"></i>&nbsp;&nbsp;View&nbsp;</a>
                                                </td>
                                                <td>
                                                    <a href="records.php?view=<?php echo $row['sy_id'];?>" class="btn btn-primary btn-sm" style="font-size:12px"><i class="fas fa-eye"></i>&nbsp;&nbsp;View&nbsp;</a>
                                                </td>
                                                <td>
                                                <button type="button" class="btn-round btn-info btn-sm editbtn" style="font-size:10px"><i class="fas fa-info-circle"></i></button>
                                                <button type="button" value="<?php echo $row['sy_id'];?>" class="btn-round btn-danger btn-sm deletebtn" style="font-size:10px"><i class="fas fa-trash"></i></button>
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
                                        <a class="page-link" href="sy.php?page=<?= $previous; ?>">Previous</a>
                                        </li>
                                        <?php for($i = 1; $i <= $pages; $i++) : ?>
                                        <li class="page-item"><a class="page-link" href="sy.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                                        <?php endfor; ?>
                                        <li class="page-item <?php echo $page == $pages ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="sy.php?page=<?= $next; ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                        </div>
                    </div>
                    </div>
             </div>
        </div>
<!-- edit modal for sy -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <h4><i class="far fa-edit"></i>&nbsp;&nbsp; Edit School Year</h4>
        </div>
        <div class="modal-body">
            <form action="edit_function.php" method="post"> 
                <div class="form-group">
                    <input type="text" class="form-control" name="sy" id="sy" placeholder="eg. 2022-2023" required style='text-align: center;'/>
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" id="id" placeholder="eg. 2022-2023" required style='text-align: center;'/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="update_sy" class="btn-round btn-primary btn-sm">Save Changes</button>
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
                        $('.delete_sy_id').val(user_id);
                        $('#sydeletemodal').modal('show');
                    });
                    $('.editbtn').on('click', function(){
                        $('#editmodal').modal('show');

                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function(){
                            return $(this).text();
                        }).get();

                        console.log(data);

                        $('#sy').val(data[0]);
                        $('#id').val(data[1]);
                    });
                });

            </script>
