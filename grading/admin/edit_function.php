<?php
include('../conn.php');
?>
        <!--EDIT STUDENT-->
<?php
    if(isset($_POST['update_student']))
    {
        $lrn = $_POST['lrn'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $middle = $_POST['middle'];
        $id = $_POST['id'];
        
        $sql = "UPDATE tbl_students SET lrn='$lrn',username='$uname',password='$pass',lastname='$lname',firstname='$fname',middle_initial='$middle' WHERE student_id='$id'";
        $result = $con-> query($sql);

            if($result)
            {
                Print '<script>alert("Updated Successfully");</script>';
                Print '<script>window.location.assign("student.php");</script>';
            }
    }
    

?>
        <!--EDIT TEACHER-->
<?php
    if(isset($_POST['update_teacher']))
    {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $middle = $_POST['middle'];
        $id = $_POST['id'];

        $sql1 = "UPDATE tbl_teachers SET username='$uname',password='$pass',lastname='$lname',firstname='$fname',middle_initial='$middle' 
        WHERE teacher_id='$id'";

        $result1 = $con-> query($sql1);

            if($result1)
            {
                Print '<script>alert("Updated Successfully");</script>';
                Print '<script>window.location.assign("teacher.php");</script>';
            }
    }
    

?>

        <!--EDIT SUBJECT-->
        <?php
    if(isset($_POST['update_subject']))
    {
        $sub = $_POST['sub'];
        $desc = $_POST['desc'];
        $id = $_POST['id'];

        $sql1 = "UPDATE tbl_subjects SET subject_name='$sub',description='$desc' 
        WHERE subject_id='$id'";

        $result1 = $con-> query($sql1);

            if($result1)
            {
                Print '<script>alert("Updated Successfully");</script>';
                Print '<script>window.location.assign("subject.php");</script>';
            }
    }
    

?>

        <!--EDIT SY-->
<?php
    if(isset($_POST['update_sy']))
    {
        $sy = $_POST['sy'];
        $id = $_POST['id'];

        $sql1 = "UPDATE tbl_schoolyear SET schoolyear='$sy' 
        WHERE sy_id='$id'";

        $result1 = $con-> query($sql1);

            if($result1)
            {
                Print '<script>alert("Updated Successfully");</script>';
                Print '<script>window.location.assign("sy.php");</script>';
            }
    }
    

?>

        <!--EDIT SY-->
        <?php
    if(isset($_POST['update_section']))
    {
        $lvl = $_POST['level'];
        $section = $_POST['section'];
        $id = $_POST['id'];

        $sql1 = "UPDATE tbl_class SET grade_level='$lvl', section='$section' 
        WHERE class_id='$id'";

        $result1 = $con-> query($sql1);

            if($result1)
            {
                Print '<script>alert("Updated Successfully");</script>';
                Print '<script>window.location.assign(history.back())</script>';
            }
    }
    

?>