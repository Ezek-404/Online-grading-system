<?php
include('../conn.php');
?>
    <!--INSERT STUDENT-->
<?php
if(isset($_POST['add_student']))
{
    $lrn = $_POST['lrn'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $middle = $_POST['middle'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $role = "student";
    
    $chklrn = mysqli_query($con,"SELECT lrn FROM tbl_students WHERE lrn='$lrn'");
    $num_rows = mysqli_num_rows($chklrn);
    
    $chkuname = mysqli_query($con,"SELECT username FROM tbl_students WHERE username='$uname'");
    $num_rows1 = mysqli_num_rows($chkuname);


    if($num_rows == 0 && $num_rows1 == 0){
        $query = "INSERT INTO tbl_students(lrn,lastname,firstname,middle_initial,username,password,role)
        VALUES ('$lrn','$lname','$fname','$middle','$uname','$pass','$role')";

        $run = mysqli_query($con,$query) or die(mysqli_error());
        if($run)
        {
            Print '<script>alert("Student Added Successfully");</script>';
            Print '<script>window.location.assign("student.php");</script>'; 
        }
        else
        {
            echo "Check your query";
        }
    }
    else{
            Print '<script>alert("Username or LRN already exists");</script>';
            Print '<script>window.location.assign("student.php");</script>';   
    }
}
elseif(isset($_POST['restore_student'])){
    $id = $_POST['res_stud_id'];

    $sql = "SELECT * FROM student_bin WHERE student_id='$id'";
    $result = $con-> query($sql);
    
    if($result-> num_rows > 0){
        while ($row = $result-> fetch_assoc())
                {
                    $stud_id = $row["student_id"];
                    $uname = $row["username"];
                    $pass = $row["password"];
                    $lname = $row["lastname"];
                    $fname = $row["firstname"];
                    $middle = $row["middle_initial"];
                    $lrn = $row["lrn"];
                }
    }
        $query2 = "DELETE FROM student_bin WHERE student_id='$id'";
        $query_run2 = mysqli_query($con,$query2);

        $query = "INSERT INTO tbl_students(student_id,lrn,username,password,lastname,firstname,middle_initial,role)
        VALUES ('$stud_id','$lrn','$uname','$pass','$lname','$fname','$middle','student')";

        $run = mysqli_query($con,$query) or die(mysqli_error());

        if($run)
        {
            Print '<script>alert("Restored Successfully");</script>';
            Print '<script>window.location.assign("bin.php");</script>';   
        }
        else
        {
            echo "Check your query";
        }
}


?>
    <!--INSERT TEACHER-->
<?php
if(isset($_POST['add_teacher']))
{
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $middle = $_POST['middle'];
    $role = "teacher";
    
    $chkuname = mysqli_query($con,"SELECT username FROM tbl_teachers WHERE username='$uname'");
    $num_rows1 = mysqli_num_rows($chkuname);
    
if($num_rows1 == 0){
    $query = "INSERT INTO tbl_teachers(username,password,lastname,firstname,middle_initial,role)
    VALUES ('$uname','$pass','$lname','$fname','$middle','$role')";

    $run = mysqli_query($con,$query) or die(mysqli_error());

    if($run)
    {
        Print '<script>alert("Teacher Added Successfully");</script>';
        Print '<script>window.location.assign("teacher.php");</script>'; 
    }
    else
    {
        echo "Check your query";
    }
    
}else{
        Print '<script>alert("Username already exists");</script>';
        Print '<script>window.location.assign("teacher.php");</script>';   
}

}
elseif(isset($_POST['restore_teacher'])){
    $id = $_POST['res_teach_id'];

    $sql = "SELECT * FROM teacher_bin WHERE teacher_id='$id'";
    $result = $con-> query($sql);
    
    if($result-> num_rows > 0){
        while ($row = $result-> fetch_assoc())
                {
                    $teach_id = $row["teacher_id"];
                    $uname = $row["username"];
                    $pass = $row["password"];
                    $lname = $row["lastname"];
                    $fname = $row["firstname"];
                    $middle = $row["middle_initial"];
                }
    }
        $query2 = "DELETE FROM teacher_bin WHERE teacher_id='$id'";
        $query_run2 = mysqli_query($con,$query2);

        $query = "INSERT INTO tbl_teachers(teacher_id,username,password,lastname,firstname,middle_initial,role)
        VALUES ('$teach_id','$uname','$pass','$lname','$fname','$middle','teacher')";

        $run = mysqli_query($con,$query) or die(mysqli_error());

        if($run)
        {
            Print '<script>alert("Restored Successfully");</script>';
            Print '<script>window.location.assign("bin.php");</script>';   
        }
        else
        {
            echo "Check your query";
        }
}

?>
    <!--INSERT SUBJECT-->
<?php
if(isset($_POST['add_subject']))
{
    $subject = $_POST['name'];
    $desc = $_POST['desc'];


    $query = "INSERT INTO tbl_subjects(subject_name,description)
    VALUES ('$subject','$desc')";

    $run = mysqli_query($con,$query) or die(mysqli_error());

    if($run)
    {
        Print '<script>alert("Subject Added Successfully");</script>';
        Print '<script>window.location.assign("subject.php");</script>'; 
    }
    else
    {
        echo "Check your query";
    }
    
    }
    elseif(isset($_POST['restore_subject'])){
        $id = $_POST['res_sub_id'];

        $sql = "SELECT * FROM subject_bin WHERE subject_id='$id'";
        $result = $con-> query($sql);
        
        if($result-> num_rows > 0){
            while ($row = $result-> fetch_assoc())
                    {
                        $sub_id = $row["subject_id"];
                        $subject = $row["subject_name"];
                        $desc = $row["description"];
                    }
        }
            $query2 = "DELETE FROM subject_bin WHERE subject_id='$id'";
            $query_run2 = mysqli_query($con,$query2);

            $query = "INSERT INTO tbl_subjects(subject_id,subject_name,description)
            VALUES ('$sub_id','$subject','$desc')";

            $run = mysqli_query($con,$query) or die(mysqli_error());
    
            if($run)
            {
                Print '<script>alert("Restored Successfully");</script>';
                Print '<script>window.location.assign("bin.php");</script>';   
            }
            else
            {
                echo "Check your query";
            }
    }

?>
    <!--INSERT SECTION-->
<?php
if(isset($_POST['add_section']))
{   
    $section = $_POST['section'];
    $yrlevel = $_POST['year_level'];
    $sy = $_POST['sy'];
    
    $chkdup = mysqli_query($con,"SELECT * from tbl_class where sy_id = '$sy' AND grade_level = '$yrlevel' and section='$section'");
    $num_rows = mysqli_num_rows($chkdup);
    
    if($num_rows == 0){
        $query = "INSERT INTO tbl_class(sy_id,grade_level,section)
        VALUES ('$sy','$yrlevel','$section')";

        $run = mysqli_query($con,$query) or die(mysqli_error());

        if($run)
        {
            Print '<script>alert("Added Successfully");</script>';
            Print '<script>window.location.assign(history.back());</script>';
        }
        else
        {
            echo "Check your query";
        }
    }
    else{
            Print '<script>alert("Section Already Added");</script>';
            Print '<script>window.location.assign(history.back());</script>';
    }
    
        
}
elseif(isset($_POST['restore_section'])){
    $id = $_POST['res_sec_id'];

    $sql = "SELECT * FROM section_bin WHERE class_id='$id'";
    $result = $con-> query($sql);
    
    if($result-> num_rows > 0){
        while ($row = $result-> fetch_assoc())
                {
                    $c_id = $row["class_id"];
                    $sy = $row["sy_id"];
                    $level = $row["grade_level"];
                    $sec = $row["section"];
                }
    }
        $query2 = "DELETE FROM section_bin WHERE class_id='$id'";
        $query_run2 = mysqli_query($con,$query2);

        $query = "INSERT INTO tbl_class(class_id,sy_id,grade_level,section)
        VALUES ('$c_id','$sy','$level','$sec')";

        $run = mysqli_query($con,$query) or die(mysqli_error());

        if($run)
        {
            Print '<script>alert("Restored Successfully");</script>';
            Print '<script>window.location.assign("bin.php");</script>';   
        }
        else
        {
            echo "Check your query";
        }
}
?>

    <!--INSERT SY-->
<?php
if(isset($_POST['add_sy']))
{   
    $sy = $_POST['sy'];
    
    $chkdup = mysqli_query($con,"SELECT * from tbl_schoolyear where schoolyear = '$sy'");
    $num_rows = mysqli_num_rows($chkdup);
    
    if($num_rows == 0){
        $query = "INSERT INTO tbl_schoolyear(schoolyear)
        VALUES ('$sy')";

        $run = mysqli_query($con,$query) or die(mysqli_error());

        if($run)
        {
            Print '<script>alert("Added Successfully");</script>';
            Print '<script>window.location.assign("sy.php");</script>'; 
        }
        else
        {
            echo "Check your query";
        }
    }
            Print '<script>alert("Schoolyear already exists");</script>';
            Print '<script>window.location.assign("bin.php");</script>';
        
}
elseif(isset($_POST['restore_sy'])){
    $id = $_POST['res_year_id'];

    $sql = "SELECT * FROM sy_bin WHERE sy_id='$id'";
    $result = $con-> query($sql);
    
    if($result-> num_rows > 0){
        while ($row = $result-> fetch_assoc())
                {
                    $sy_id = $row["sy_id"];
                    $year = $row["schoolyear"];
                }
    }
        $query2 = "DELETE FROM sy_bin WHERE sy_id='$id'";
        $query_run2 = mysqli_query($con,$query2);

        $query = "INSERT INTO tbl_schoolyear(sy_id,schoolyear)
        VALUES ('$sy_id','$year')";

        $run = mysqli_query($con,$query) or die(mysqli_error());

        if($run)
        {
            Print '<script>alert("Restored Successfully");</script>';
            Print '<script>window.location.assign("bin.php");</script>';   
        }
        else
        {
            echo "Check your query";
        }
}
?>  

    <!--ASSIGN STUDENT-->
<?php
if(isset($_POST['assign_student']))
{   
    $id = $_POST['id'];
    $lrn = $_POST['lrn'];
    $sy = $_POST['sy'];
    
    $sql = "SELECT student_id FROM tbl_students WHERE lrn='$lrn'";
    $result = $con-> query($sql);
    
    if($result-> num_rows > 0){
        while ($row = $result-> fetch_assoc())
                {
                    $student_id = $row["student_id"];
                }
    }
        $chk = mysqli_query($con,"SELECT * FROM tbl_section JOIN tbl_class ON tbl_section.class_id = tbl_class.class_id WHERE sy_id='$sy' AND student_id='$student_id'");
        $result = mysqli_num_rows($chk);

        if($result > 0){
            Print '<script>alert("Student Already Assigned");</script>';
            Print '<script>window.location.assign(history.back());</script>';   
        }
        else{
        $query = "INSERT INTO tbl_section(class_id,student_id)
        VALUES ('$id','$student_id')";

        $run = mysqli_query($con,$query) or die(mysqli_error());

        if($run)
        {
            Print '<script>alert("Assigned Successfully");</script>';
            Print '<script>window.location.assign(history.back());</script>';
        }
        else
        {
            echo "Check your query";
        }
        }
    }

?>  

    <!--ASSIGN SUBJECT-->
<?php
if(isset($_POST['assign_subject']))
{   
    $id = $_POST['id'];
    $sub = $_POST['subject'];
    $teacher = $_POST['teacher'];
    
    $sql = "SELECT subject_id FROM tbl_subjects WHERE subject_name='$sub'";
    $result = $con-> query($sql);
    
    if($result-> num_rows > 0){
        while ($row = $result-> fetch_assoc())
                {
                    $sub_id = $row["subject_id"];
                }
    }

    $sql2 = "SELECT teacher_id FROM tbl_teachers WHERE lastname='$teacher'";
    $result2 = $con-> query($sql2);
    
    if($result2-> num_rows > 0){
        while ($row = $result2-> fetch_assoc())
                {
                    $t_id = $row["teacher_id"];
                }
    }

        $chk = mysqli_query($con,"SELECT * FROM tbl_section_sub WHERE class_id = '$id' AND subject_id='$sub_id' AND teacher_id='$t_id'");
        $result = mysqli_num_rows($chk);

        if($result > 0){
            Print '<script>alert("Subject Already Assigned");</script>';
            Print '<script>window.location.assign(history.back());</script>';;   
        }
        else{
        $query = "INSERT INTO tbl_section_sub(class_id,subject_id,teacher_id)
        VALUES ('$id','$sub_id','$t_id')";

        $run = mysqli_query($con,$query) or die(mysqli_error());

        if($run)
        {
            Print '<script>alert("Added Successfully");</script>';
            Print '<script>window.location.assign(history.back());</script>';;
        }
        else
        {
            echo "Check your query";
        }
        }
    }

?>  
