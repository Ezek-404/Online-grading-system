<?php
    include('includes/header.php');
    include('includes/sidebar.php');
    include('../conn.php');
?>
    <div id="content-wrapper" class="d-flex flex-column" >
            <div id="content">
                    <?php include('includes/navbar.php');?>
                <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h5 class="h5 mb-0 text-gray-800">DELETED DATA</h5>
                </div>

<div class="row">

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border shadow h-100 py-2">
            <div class="card-header">
                <h6>School Year</h6>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="table-responsive">
                                <table class="table table-bordered-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                    <thead style="text-align: center" class="table table-primary">
                                        <tr>
                                            <th scope="col">School Year</th>
                                            <th style="display:none">Id</th>
                                            <th scope="col" style="width: 100px !important;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql2 = "SELECT * from sy_bin";
                                        $result = $con-> query($sql2);

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
                                                <button type="button" value="<?php echo $row['sy_id'];?>" class="btn btn-info btn-sm restorebtn" style="font-size:10px"><i class="fas fa-recycle"></i></button>
                                                <button type="button" value="<?php echo $row['sy_id'];?>" class="btn btn-danger btn-sm deletebtn" style="font-size:10px"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                    </tbody>
                                    <?php include('includes/add_modal.php')?>
                                    <?php include('includes/delete_modal.php')?>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "<td style='text-align: center' colspan=2><strong><i>~No Deleted Data~</i></strong></td>";
                                        }
                                        ?>   
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border shadow h-100 py-2">
        <div class="card-header">
                <h6>Student</h6>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="table-responsive">
                                <table class="table table-bordered-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                    <thead style="text-align: center" class="table table-primary">
                                        <tr>
                                        <th scope="col">LRN</th>
                                        <th scope="col" style="width: 100px !important;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql2 = "SELECT * from student_bin";
                                        $result = $con-> query($sql2);

                                        if ($result-> num_rows > 0)
                                            {
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $lrn = $row["lrn"];                                         
                                        ?> 
                                        <tr style="text-align: center">
                                            <td><?php echo $lrn ?></td>
                                            <td>
                                            <button type="button" value="<?php echo $row['student_id'];?>" class="btn btn-info btn-sm restorestud" style="font-size:10px"><i class="fas fa-recycle"></i></button>
                                            <button type="button" value="<?php echo $row['student_id'];?>" class="btn btn-danger btn-sm deletebtnstud" style="font-size:10px"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php include('includes/add_modal.php')?>
                                    <?php include('includes/delete_modal.php')?>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "<td style='text-align: center' colspan=2><strong><i>~No Deleted Data~</i></strong></td>";
                                        }
                                        ?>   
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border shadow h-100 py-2">
        <div class="card-header">
                <h6>Teacher</h6>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="table-responsive">
                                <table class="table table-bordered-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                <thead style="text-align: center" class="table table-primary"> 
                                <tr>
                                <th scope="col">Username</th>
                                <th style="display:none">Id</th>
                                <th scope="col" style="width: 100px !important;">Option</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                        $sql2 = "SELECT * from teacher_bin";
                                        $result = $con-> query($sql2);

                                        if ($result-> num_rows > 0)
                                            {
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $id = $row["teacher_id"];
                                                $uname = $row["username"];
                                            
                                        ?>  
                                        <tr style="text-align: center">
                                            <td><?php echo $uname ?></td>
                                            <td style="display:none"><?php echo $id?> </td>
                                            <td>
                                            <button type="button" value="<?php echo $row['teacher_id'];?>" class="btn btn-info btn-sm restoreteach" style="font-size:10px"><i class="fas fa-recycle"></i></button>
                                            <button type="button" value="<?php echo $row['teacher_id'];?>" class="btn btn-sm btn-danger deletebtnteach" style="font-size:10px"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php include('includes/add_modal.php')?>
                                    <?php include('includes/delete_modal.php')?>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "<td style='text-align: center' colspan=2><strong><i>~No Deleted Data~</i></strong></td>";
                                        }
                                        ?>   
                                </table>
                            </div>
                </div>
            </div>
        </div>
</div>

</div>
<div class="col-xl-12 col-md-6 mb-4">
        <div class="card border shadow h-100 py-2">
        <div class="card-header">
                <h6>Subject</h6>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="table-responsive">
                                <table class="table table-bordered-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                    <thead style="text-align: center" class="table table-primary">
                                        <tr>
                                        <th scope="col">Subject name</th>
                                        <th style="display:none">Id</th>
                                        <th scope="col" style="width:  100px !important;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query = "SELECT * FROM subject_bin";
                                        $result = mysqli_query($con,$query);

                                        if(mysqli_num_rows($result) > 0){
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $id = $row['subject_id'];
                                                $name = $row["subject_name"];

                                        ?>            
                                        <tr style="text-align: center">
                                        <td><?php echo $name ?></td>
                                        <td style="display:none"><?php echo $id?> </td>
                                        <td>
                                        <button type="button" value="<?php echo $row['subject_id'];?>" class="btn btn-info btn-sm restoresub" style="font-size:10px"><i class="fas fa-recycle"></i></button>
                                        <button type="button" value="<?php echo $row['subject_id'];?>" class="btn btn-danger btn-sm deletebtnsub" style="font-size:10px"><i class="fas fa-trash"></i></button>
                                        </td>
                                        </tr>
                                    </tbody>
                                    <?php include('includes/add_modal.php')?>
                                    <?php include('includes/delete_modal.php')?>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "<td style='text-align: center' colspan=2><strong><i>~No Deleted Data~</i></strong></td>";
                                        }
                                        ?>   
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>    
            </div>
            <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border shadow h-100 py-2">
        <div class="card-header">
                <h6>Section</h6>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="table-responsive">
                                <table class="table table-bordered-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                                    <thead style="text-align: center" class="table table-primary">
                                        <tr>
                                        <th scope="col">Grade Level</th>
                                        <th scope="col">Section</th>
                                        <th style="display:none">Id</th>
                                        <th scope="col" style="width: 100px !important;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql2 = "SELECT * from section_bin";
                                        $result = $con-> query($sql2);

                                        if ($result-> num_rows > 0)
                                            {
                                            while ($row = $result-> fetch_assoc())
                                            {
                                                $yrlevel = $row["grade_level"];
                                                $section = $row["section"];     
                                                $id = $row["class_id"];                      
                                        ?> 
                                        <tr style="text-align: center">
                                            <td><?php echo $yrlevel ?></td>
                                            <td><?php echo $section ?></td>
                                            <td>
                                            <button type="button" value="<?php echo $id;?>" class="btn btn-info btn-sm restoresec" style="font-size:10px"><i class="fas fa-recycle"></i></button>
                                            <button type="button" value="<?php echo $id;?>" class="btn btn-danger btn-sm deletebtnsec" style="font-size:10px"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php include('includes/add_modal.php')?>
                                    <?php include('includes/delete_modal.php')?>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "<td style='text-align: center' colspan=3><strong><i>~No Deleted Data~</i></strong></td>";
                                        }
                                        $con-> close();
                                        ?>   
                                </table>
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
                $('.delete_year_id').val(user_id);
                $('#schoolyeardeletemodal').modal('show');
                
            });
            $('.restorebtn').click(function(e){
            e.preventDefault();

            var user_id =$(this).val();
            //console.log(user_id);
            $('.res_year_id').val(user_id);
            $('#restoreyearmodal').modal('show');
        });
    });
</script>

<script>
        $(document).ready(function(){
            $('.deletebtnstud').click(function (e){
                e.preventDefault();

                var user_id =$(this).val();
                //console.log(user_id);
                $('.delete_stud_id').val(user_id);
                $('#pstudentdeletemodal').modal('show');
            });
            $('.restorestud').click(function(e){
            e.preventDefault();

            var user_id =$(this).val();
            //console.log(user_id);
            $('.res_stud_id').val(user_id);
            $('#restorestudmodal').modal('show');
        });
    });
</script>

<script>
        $(document).ready(function(){
            $('.deletebtnteach').click(function (e){
                e.preventDefault();

                var user_id =$(this).val();
                //console.log(user_id);
                $('.delete_teach_id').val(user_id);
                $('#pteacherdeletemodal').modal('show');
            });
            $('.restoreteach').click(function(e){
            e.preventDefault();

            var user_id =$(this).val();
            //console.log(user_id);
            $('.res_teach_id').val(user_id);
            $('#restoreteachmodal').modal('show');
        });
    });
</script>

<script>
        $(document).ready(function(){
            $('.deletebtnsub').click(function (e){
                e.preventDefault();

                var user_id =$(this).val();
                //console.log(user_id);
                $('.delete_sub_id').val(user_id);
                $('#psubjectdeletemodal').modal('show');
            });
            $('.restoresub').click(function(e){
            e.preventDefault();

            var user_id =$(this).val();
            //console.log(user_id);
            $('.res_sub_id').val(user_id);
            $('#restoresubmodal').modal('show');
        });
    });
</script>

<script>
        $(document).ready(function(){
            $('.deletebtnsec').click(function (e){
                e.preventDefault();

                var user_id =$(this).val();
                //console.log(user_id);
                $('.delete_sec_id').val(user_id);
                $('#psectiondeletemodal').modal('show');
            });
            $('.restoresec').click(function(e){
            e.preventDefault();

            var user_id =$(this).val();
            //console.log(user_id);
            $('.res_sec_id').val(user_id);
            $('#restoresecmodal').modal('show');
        });
    });
</script>