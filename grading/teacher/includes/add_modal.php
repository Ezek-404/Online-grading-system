<?php
  require_once('../conn.php');
?>
<!-- input grade -->
<div class="modal fade" id="addgrade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">   
        <div class="modal-header">
        <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Grade</h4>
        </div>
        <div class="modal-body">
            <form action="../teacher/add_function.php" method="post">

            <?php $sy = $_GET['sy'];?>
            <div class="form-group">
                    <input type="hidden" class="form-control" name="sy" value="<?php echo $sy ?>">
             </div>

            <?php $class = $_GET['class'];?>
            <div class="form-group">
                    <input type="hidden" class="form-control" name="class" value="<?php echo $class ?>">
             </div>
             
             <?php $subject = $_GET['subject'];?>            
                <div class="form-group">

                    <input type="hidden" class="form-control" name="subject" value="<?php echo $subject?>" required/>
                </div>

                <?php $student = $_GET['stud'];?>          
                <div class="form-group">

                    <input type="hidden" class="form-control" name="student" value="<?php echo $student?>" required/>
                </div> 

                <div class="form-group">
                    <input type="hidden" class="form-control" name="teacher" value="<?php echo $_SESSION['teacher_id'];?>" required/>
                </div>

              <label>Grade Quarter</label>
                <div class="form-group">
                    <select name="quarter" id="quarter" data-style="btn-primary" class="form-control input-sm">
                      <?php
                        $query = mysqli_query($con,"SELECT DISTINCT gradequarter FROM tbl_gradequarter ORDER BY gradequarter");
                        while($row = mysqli_fetch_array($query)){
                          echo '<option value="'.$row['gradequarter'].'">'.$row['gradequarter'].'</option>';
                      }
                      ?>
                    </select>
                </div> 

                <label>Grade</label>
                <div class="form-group">
                    <input type="number" class="form-control" name="grade" placeholder="Grade" required/>
                </div>
        </div>
        <div class="modal-footer">
          <?php
                $chkentry = mysqli_query($con,"SELECT grade_id FROM tbl_grades WHERE student_id='$student' AND class_id='$class' AND sy_id='$sy' AND subject_id='$subject' AND teacher_id='".$_SESSION['teacher_id']."'");
                $num_rows1 = mysqli_num_rows($chkentry);

                if($num_rows1 == 0){
                    $query = mysqli_query($con, "INSERT INTO `tbl_grades`(`subject_id`, `student_id`, `teacher_id`, `first`, `second`, `third`, `fourth`, `class_id`, `sy_id`)
                    VALUES ('$subject','$student','".$_SESSION['teacher_id']."','','','','','$class','$sy')");
                }
            ?>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_grade" class="btn-round btn-primary btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>


