<?php
  require_once('../conn.php');
?>

<!-- add modal for student -->
<div class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
      <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Student</h4>
      </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post">
              <div class="form-group">
                    <input type="number" class="form-control" name="lrn" placeholder="LRN" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="uname" placeholder="Username" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pass" placeholder="Password" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lname" placeholder="Lastname" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="fname" placeholder="Firstname" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="middle" placeholder="Middle initial" style='text-align: center;' />
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_student" class="btn-round btn-primary btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- restore modal for student -->
<div class="modal fade" id="restorestudmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <h4>Restore School Year</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
            <input type="hidden" name="res_stud_id" class="res_stud_id">
            <p>Are you sure you to Restore this Data?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="restore_student" class="btn-round btn-primary btn-sm">Restore</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- add modal for teacher -->
<div class="modal fade" id="addteacher" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
      <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Teacher</h4>
      </div>
        <div class="modal-body">

            <form action="../admin/add_function.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="uname" placeholder="Username" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pass" placeholder="Password" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lname" placeholder="Lastname" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="fname" placeholder="Firstname" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="middle" placeholder="Middle initial" style='text-align: center;'/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_teacher" class="btn-round btn-primary btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- restore modal for teacher -->
<div class="modal fade" id="restoreteachmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <h4>Restore School Year</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
            <input type="hidden" name="res_teach_id" class="res_teach_id">
            <p>Are you sure you to Restore this Data?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="restore_teacher" class="btn-round btn-primary btn-sm">Restore</button>
            </form>
        </div>
    </div>
  </div>
</div>


<!-- add modal for section -->
<div class="modal fade" id="addsection" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-header">
        <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Section</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
                          <div class="form-group">
                                  <input type="hidden" class="form-control" name="sy" value="<?php echo $sy_id?>"  required style='text-align: center;'/>
                              </div>
                                <div class="form-group">
                                    <label>Year Level</label>
                                    <select name="year_level" id="ddl_yrlvl" data-style="btn-primary" class="form-control input-sm" style='text-align: center;'>
                                        <option value="Grade 7">Grade 7</option>
                                        <option value="Grade 8">Grade 8</option>
                                        <option value="Grade 9">Grade 9</option>
                                        <option value="Grade 10">Grade 10</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Section</label>
                                    <input required name="section" id="txt_sect" class="form-control input-sm" type="text" placeholder="Section" style='text-align: center;' />
                                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_section" class="btn-round btn-primary btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- restore section for teacher -->
<div class="modal fade" id="restoresecmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <h4>Restore School Year</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
            <input type="hidden" name="res_sec_id" class="res_sec_id">
            <p>Are you sure you to Restore this Data?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="restore_section" class="btn-round btn-primary btn-sm">Restore</button>
            </form>
        </div>
    </div>
  </div>
</div>


<!-- add modal for sy -->
<div class="modal fade" id="addschoolyear" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add School Year</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
                <div class="form-group">
                    <input type="text" class="form-control" name="sy" placeholder="eg. 2022-2023" required style='text-align: center;'/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_sy" class="btn-round btn-primary btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- restore modal for sy -->
<div class="modal fade" id="restoreyearmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <h4>Restore School Year</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
            <input type="hidden" name="res_year_id" class="res_year_id">
            <p>Are you sure you to Restore this Data?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="restore_sy" class="btn-round btn-primary btn-sm">Restore</button>
            </form>
        </div>
    </div>
  </div>
</div>


<!-- add modal for subject -->
<div class="modal fade" id="addsubject" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">   
        <div class="modal-header">
        <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Subject</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Subject Name" style='text-align: center;' required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="desc" placeholder="Description" style='text-align: center;' required/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_subject" class="btn-round btn-primary btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- restore modal for teacher -->
<div class="modal fade" id="restoresubmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <h4>Restore School Year</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
            <input type="hidden" name="res_sub_id" class="res_sub_id">
            <p>Are you sure you to Restore this Data?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="restore_subject" class="btn-round btn-primary btn-sm">Restore</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- assign student -->
<div class="modal fade" id="assign_student" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
    <div class="modal-header">
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assign Student</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
            <div class="form-group">
                    <input type="hidden" class="form-control" name="sy" value="<?php echo $sy?>" required/>
                </div>
            <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id?>" required/>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="lrn" placeholder="Enter LRN" required style='text-align: center;'/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="assign_student" class="btn-round btn-primary btn-sm">Assign</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- assign subject -->
<div class="modal fade" id="assign_subject" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
    <div class="modal-header">
    <?php $id = $_GET['view'];?>
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assign Subject</h4>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
            <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id?>" required/>
                </div>
                <div class="form-group">
                    <select name="subject" id="subject" data-style="btn-primary" class="form-control input-sm" style='text-align: center;'>
                      <option value="">-- Select Subject --</option>
                      <?php
                        $query = mysqli_query($con,"SELECT DISTINCT subject_name,description FROM tbl_subjects ORDER BY subject_name");
                        while($row = mysqli_fetch_array($query)){
                          echo '<option value="'.$row['subject_name'].'">'.$row['subject_name'].', '.$row['description'].'</option>';
                      }
                      ?>
                    </select>
                </div>

                <div class="form-group">
                    <select name="teacher" id="teacher" data-style="btn-primary" class="form-control input-sm" style='text-align: center;'>
                      <option value="">-- Select Teacher --</option>
                      <?php
                        $query = mysqli_query($con,"SELECT DISTINCT lastname,firstname,middle_initial FROM tbl_teachers ORDER BY lastname");
                        while($row = mysqli_fetch_array($query)){
                          echo '<option value="'.$row['lastname'].'">'.$row['lastname'].', '.$row['firstname'].' '.$row['middle_initial'].'.</option>';
                      }
                      ?>
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="assign_subject" class="btn-round btn-primary btn-sm">Assign</button>
            </form>
        </div>        
    </div>
  </div>
</div>



