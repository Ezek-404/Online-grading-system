<?php
    include('../conn.php');
?>
<?php
    if(isset($_POST['delete_student'])){
        $stud_id = $_POST['delete_id'];

        $sql2 = "SELECT * FROM tbl_students WHERE student_id='$stud_id'";
        $result2 = $con-> query($sql2);
        
        if($result2-> num_rows > 0){
            while ($row = $result2-> fetch_assoc())
                    {
                        $lrn = $row["lrn"];
                        $lname = $row["lastname"];
                        $fname = $row["firstname"];
                        $middle = $row["middle_initial"];
                        $uname = $row["username"];
                        $pass = $row["password"];
                    }
        }
        $query2 = "INSERT INTO student_bin(student_id,lrn,username,password,lastname,firstname,middle_initial)
                    VALUES ('$stud_id','$lrn','$uname','$pass','$lname','$fname','$middle')";

        $run2 = mysqli_query($con,$query2) or die(mysqli_error());

        $query = "DELETE FROM tbl_students WHERE student_id='$stud_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            header ("Location: student.php");
        }
        else{
            echo 'ERROR';
        }
    }
    elseif(isset($_POST['delete_pstudent'])){
        $id = $_POST['delete_student_id'];
        
        $query = "DELETE FROM student_bin WHERE student_id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            Print '<script>alert("Deleted Successfully");</script>';
            Print '<script>window.location.assign("bin.php");</script>';   
        }
        else{
            echo 'ERROR';
        }
    }
?>

<?php
    if(isset($_POST['delete_teacher'])){
        $teacher_id = $_POST['delete_id'];

        $sql3 = "SELECT * FROM tbl_teachers WHERE teacher_id='$teacher_id'";
        $result3 = $con-> query($sql3);
        
        if($result3-> num_rows > 0){
            while ($row3 = $result3-> fetch_assoc())
                    {
                        $uname = $row3["username"];
                        $pass = $row3["password"];
                        $lname = $row3["lastname"];
                        $fname = $row3["firstname"];
                        $middle = $row3["middle_initial"];
                    }
        }
        $query3 = "INSERT INTO teacher_bin(teacher_id,username,password,lastname,firstname,middle_initial)
                    VALUES ('$teacher_id','$uname','$pass','$lname','$fname','$middle')";

        $run3 = mysqli_query($con,$query3) or die(mysqli_error());

        $query = "DELETE FROM tbl_teachers WHERE teacher_id='$teacher_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            header ("Location: teacher.php");
        }
        else{
            echo 'ERROR';
        }
    }
    elseif(isset($_POST['delete_pteacher'])){
        $id = $_POST['delete_teacher_id'];

        $query = "DELETE FROM teacher_bin WHERE teacher_id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            Print '<script>alert("Deleted Successfully");</script>';
            Print '<script>window.location.assign("bin.php");</script>';   
        }
        else{
            echo 'ERROR';
        }

    }
?>

<?php
    if(isset($_POST['delete_subject'])){
        $sub_id = $_POST['delete_id'];

        $sql2 = "SELECT * FROM tbl_subjects WHERE subject_id='$sub_id'";
        $result2 = $con-> query($sql2);
        
        if($result2-> num_rows > 0){
            while ($row = $result2-> fetch_assoc())
                    {
                        $sub = $row["subject_name"];
                        $desc = $row["description"];
                    }
        }
        $query2 = "INSERT INTO subject_bin(subject_id,subject_name,description)
                    VALUES ('$sub_id','$sub','$desc')";

        $run2 = mysqli_query($con,$query2) or die(mysqli_error());

        $query = "DELETE FROM tbl_subjects WHERE subject_id='$sub_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            header ("Location: subject.php");
        }
        else{
            echo 'ERROR';
        }
    }
    elseif(isset($_POST['delete_psubject'])){
        $id = $_POST['delete_subject_id'];

        $query = "DELETE FROM subject_bin WHERE subject_id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            Print '<script>alert("Deleted Successfully");</script>';
            Print '<script>window.location.assign("bin.php");</script>';   
        }
        else{
            echo 'ERROR';
        }

    }
?>

<?php
    if(isset($_POST['delete_assigned_student'])){

        $id = $_POST['view'];
        $sy = $_POST['sy'];
        $stud_id = $_POST['delete_id'];

        $query = "DELETE FROM tbl_section WHERE student_id='$stud_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            header ("Location: student_class.php?view=$id&sy=$sy");
        }
        else{
            echo 'ERROR';
        }
    }
?>

<?php
    if(isset($_POST['delete_assigned_subject'])){

        $id = $_POST['sub'];
        $del = $_POST['delete_id'];

        $query = "DELETE FROM tbl_section_sub WHERE section_sub_id='$del'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            header ("Location: student_subject.php?view=$id");
        }
        else{
            echo 'ERROR';
        }
    }
?>

<?php
    if(isset($_POST['delete_sy'])){

        $del = $_POST['delete_id'];

        $sql2 = "SELECT * FROM tbl_schoolyear WHERE sy_id='$del'";
        $result2 = $con-> query($sql2);
        
        if($result2-> num_rows > 0){
            while ($row = $result2-> fetch_assoc())
                    {
                        $sy_id = $row["sy_id"];
                        $sy = $row["schoolyear"];
                    }
        }
        $query2 = "INSERT INTO sy_bin(sy_id,schoolyear)
                    VALUES ('$sy_id','$sy')";

        $run2 = mysqli_query($con,$query2) or die(mysqli_error());

        $query = "DELETE FROM tbl_schoolyear WHERE sy_id='$del'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            header ("Location: sy.php");
        }
        else{
            echo 'ERROR';
        }
    }elseif(isset($_POST['delete_year'])){
        $id = $_POST['delete_year_id'];
        
        $query = "DELETE FROM sy_bin WHERE sy_id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            Print '<script>alert("Deleted Successfully");</script>';
            Print '<script>window.location.assign("bin.php");</script>';   
        }
        else{
            echo 'ERROR';
        }
    }
?>

<?php
     if(isset($_POST['delete_section'])){
        $section_id = $_POST['delete_class'];

        $sql2 = "SELECT * FROM tbl_class WHERE class_id='$section_id'";
        $result2 = $con-> query($sql2);
        
        if($result2-> num_rows > 0){
            while ($row = $result2-> fetch_assoc())
                    {
                        $sy_id = $row["sy_id"];
                        $level = $row["grade_level"];
                        $sec = $row["section"];
                    }
        }
        $query2 = "INSERT INTO section_bin(class_id,sy_id,grade_level,section)
                    VALUES ('$section_id','$sy_id','$level','$sec')";

        $run2 = mysqli_query($con,$query2) or die(mysqli_error());

        $query = "DELETE FROM tbl_class WHERE class_id='$section_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            header ("Location: section.php");
        }
        else{
            echo 'ERROR';
        }
    }
    elseif(isset($_POST['delete_psection'])){
        $id = $_POST['delete_section_id'];

        $query = "DELETE FROM section_bin WHERE class_id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            Print '<script>alert("Deleted Successfully");</script>';
            Print '<script>window.location.assign("bin.php");</script>';   
        }
        else{
            echo 'ERROR';
        }

    }
?>