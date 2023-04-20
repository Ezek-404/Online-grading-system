<?php
    session_start();
    include('conn.php');
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=mysqli_real_escape_string($con, $_POST['uname']);
        $password=mysqli_real_escape_string($con, $_POST['password']);

            $admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");
            $numrow = mysqli_num_rows($admin);

            $student = mysqli_query($con,"SELECT * FROM tbl_students WHERE lrn='$username' AND password='$password'");
            $numrow1 = mysqli_num_rows($student);

            $teacher = mysqli_query($con,"SELECT * FROM tbl_teachers WHERE username='$username' AND password='$password'");
            $numrow2 = mysqli_num_rows($teacher);

            $table_id = "";
            $table_users = "";
            $table_password = "";

            if($numrow > 0){
                while($row = mysqli_fetch_assoc($admin)){
                    $table_id = $row['admin_id'];
                    $table_users = $row['username'];
                    $table_password = $row['password'];
                    $role = $row['role'];
                }
                    if(($username == $table_users) && ($password == $table_password))
                        {
                            $_SESSION['username'] = $username;
                            $_SESSION['admin_id'] = $table_id;
                            $_SESSION['role'] = $role;
                            Print '<script>alert("Logged in Successfully");</script>';
                            Print '<script>window.location.assign("admin/dashboard.php");</script>';  
                    }
                    else
                        {
                        Print '<script>alert("Incorrect Password!");</script>';
                        Print '<script>window.location.assign("index.php");</script>';
                    }
            }elseif($numrow1 > 0){
                while($row2 = mysqli_fetch_assoc($student)){
                    $table_id = $row2['student_id'];
                    $table_users = $row2['username'];
                    $table_password = $row2['password'];
                    $role = $row2['role'];
                }
                    if(($username == $table_users) && ($password == $table_password))
                        {
                            $_SESSION['username'] = $username;
                            $_SESSION['student_id'] = $table_id;
                            $_SESSION['role'] = $role;
                            Print '<script>alert("Logged in Successfully");</script>';
                            Print '<script>window.location.assign("student/dashboard.php");</script>';  
                    }
                    else
                        {
                        Print '<script>alert("Incorrect Password!");</script>';
                        Print '<script>window.location.assign("index.php");</script>';
                    }
            }
            elseif($numrow2 > 0){
                while($row3 = mysqli_fetch_assoc($teacher)){
                    $table_id = $row3['teacher_id'];
                    $table_users = $row3['username'];
                    $table_password = $row3['password'];
                    $role = $row3['role'];
                }
                    if(($username == $table_users) && ($password == $table_password))
                        {
                            $_SESSION['username'] = $username;
                            $_SESSION['teacher_id'] = $table_id;
                            $_SESSION['role'] = $role;
                            Print '<script>alert("Logged in Successfully");</script>';
                            Print '<script>window.location.assign("teacher/dashboard.php");</script>';
                    }
                    else
                        {
                            Print '<script>alert("Incorrect Password!");</script>';
                            Print '<script>window.location.assign("index.php");</script>';  
                    }
            }else{
                Print '<script>alert("Invalid Account");</script>';
                Print '<script>window.location.assign("index.php");</script>';
            }
    }
?>