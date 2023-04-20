<?php
    include('../conn.php');
?>

<?php
    if(isset($_POST['add_grade']))
    {
        $sy = $_POST['sy'];
        $class = $_POST['class']; 
        $subject = $_POST['subject'];   
        $student = $_POST['student'];
        $teacher = $_POST['teacher'];
        $quarter = $_POST['quarter'];
        $grade = $_POST['grade'];
    
        $sql1 = mysqli_query($con, "SELECT * FROM tbl_gradequarter WHERE quarter_id='$quarter'");
        while($row1 = $sql1-> fetch_assoc()){
            $quarter_id = $row1['quarter_id'];
        }
            if($quarter_id == 1){
                $query = mysqli_query($con, "UPDATE tbl_grades SET first='$grade' WHERE student_id='$student' AND class_id='$class' AND sy_id='$sy' AND subject_id='$subject' AND teacher_id='$teacher'");
                if($query)
                {
                    header("location: student_grade.php?stud=$student&class=$class&sy=$sy&subject=$subject");
                }
            }elseif($quarter_id == 2){
                $query = mysqli_query($con, "UPDATE tbl_grades SET second='$grade' WHERE student_id='$student' AND class_id='$class' AND sy_id='$sy' AND subject_id='$subject' AND teacher_id='$teacher'");
        
                if($query)
                {
                    header("location: student_grade.php?stud=$student&class=$class&sy=$sy&subject=$subject");
                }
            }elseif($quarter_id == 3){
                $query = mysqli_query($con, "UPDATE tbl_grades SET third='$grade' WHERE student_id='$student' AND class_id='$class' AND sy_id='$sy' AND subject_id='$subject' AND teacher_id='$teacher'");
        
                if($query)
                {
                    header("location: student_grade.php?stud=$student&class=$class&sy=$sy&subject=$subject");
                }
            }elseif($quarter_id == 4){
                $query = mysqli_query($con, "UPDATE tbl_grades SET fourth='$grade' WHERE student_id='$student' AND class_id='$class' AND sy_id='$sy' AND subject_id='$subject' AND teacher_id='$teacher'");
        
                if($query)
                {
                    header("location: student_grade.php?stud=$student&class=$class&sy=$sy&subject=$subject");
                }
            }
            else{
                Print '<script>alert("Grade in this Quarter already uploaded");</script>';
                Print '<script>window.location.assign("javascript:history.back()");</script>';
            }    
            
        }
    
?>
