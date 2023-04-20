<?php
    include('includes/header.php');
    include('includes/sidebar.php');
    include('../conn.php');
?>
<style>
    .field-icon {
  float: left;
  position: absolute;
  top: 194px;
  left: 330px;
  z-index: 2;
}

.field-icon1 {
  float: left;
  position: absolute;
  top: 271px;
  left: 330px;
  z-index: 2;
}

</style>
     <div id="content-wrapper" class="d-flex flex-column page">
            <div id="content">
                    <?php include('includes/navbar.php');?>
                    <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                <div class="card shadow mb-4" style="width: 80%;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Circle Buttons (Default) -->
                                    <?php
                                        $query = mysqli_query($con,"SELECT * FROM tbl_teachers WHERE teacher_id='".$_SESSION['teacher_id']."'");
                                        while($row = mysqli_fetch_array($query)){
                                          $uname = $row['username'];
                                          $pass = $row['password'];
                                      }
                                      ?>
                                <form action="edit_profile.php" method="POST">
                                    <div class="mb-2">
                                        <label>Username</label>
                                        <input type="text" class="form-control col-md-4" name="uname" value="<?php echo $uname?>" style="text-align: center">
                                    </div>
                                    <div class="mt-2 mb-2">
                                        <label>Password</label>
                                        <input id="password-field" type="password" class="form-control col-md-4" name="pass" value="<?php echo $pass?>" style="text-align: center">  
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>                                      
                                    </div>
                                    <div class="mt-2 mb-2">
                                        <label>Confirm Password</label>
                                        <input id="password-field1" type="password" class="form-control col-md-4" name="cpass" style="text-align: center">
                                        <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon1 toggle-password"></span>
                                    </div>
                                    <br>
                                    <a href="dashboard.php" class="btn btn-default btn-sm">Close</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" name="update_teacher" class="btn btn-primary btn-sm">Update Profile</button>
                            </div>
                </div>
            </div>
    </div>
    <?php
         if(isset($_POST['update_teacher']))
         {   
             $username = $_POST['uname'];
             $password = $_POST['pass'];
             $cpass = $_POST['cpass']; 

                if($password == $cpass){
                    $sql = "UPDATE tbl_teachers SET username='$username',password='$password' WHERE teacher_id='".$_SESSION['teacher_id']."'";
                    $result = $con-> query($sql);
                    if($result){
                        Print '<script>alert("Profile Updated Successfully");</script>';
                        Print '<script>window.location.assign("dashboard.php");</script>';
                    }
                    else
                    {
                        Print '<script>alert("Update error");</script>';
                    }
                 }else{
                    Print '<script>alert("Password does not match");</script>';
                    Print '<script>window.location.assign("edit_profile.php");</script>';
                 }
         }
    ?>
<?php
    include('includes/scripts.php');
?>
<script>
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
</script>