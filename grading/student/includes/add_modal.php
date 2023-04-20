<?php
  require_once('../conn.php');
?>

<!-- add modal for student -->
<div class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
      <h5><i class="fas fa-user"></i> &nbsp;Add Student</h5>
      </div>
        <div class="modal-body">

            <form action="../admin/add_function.php" method="post">
              <div class="form-group">
                    <input type="text" class="form-control" name="lrn" placeholder="LRN"  required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="uname" placeholder="Username"  required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pass" placeholder="Password"  required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lname" placeholder="Lastname"  required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="fname" placeholder="Firstname"  required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="middle" placeholder="Middle initial" required/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_teacher" class="btn btn-info btn-sm">Add</button>
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
      <h5><i class="fas fa-user"></i> &nbsp;Add Teacher</h5>
      </div>
        <div class="modal-body">

            <form action="../admin/add_function.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="uname" placeholder="Username"  required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pass" placeholder="Password"  required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lname" placeholder="Lastname"  required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="fname" placeholder="Firstname"  required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="middle" placeholder="Middle initial" required/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_teacher" class="btn btn-info btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- add modal for section -->
<div class="modal fade" id="addsection" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-body">
        <h3><i class="now-ui-icons business_badge"></i> Add Section</h3>
            <form action="../admin/add_function.php" method="post"> 
                                <div class="form-group">
                                    <label>Year Level</label>
                                    <select name="year_level" id="ddl_yrlvl" data-style="btn-primary" class="form-control input-sm">
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Section</label>
                                    <input required name="section" id="txt_sect" class="form-control input-sm" type="text" placeholder="Section" />
                                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_section" class="btn btn-info btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- add modal for sy -->
<div class="modal fade" id="addschoolyear" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-body">
        <h3><i class="now-ui-icons design_bullet-list-67"></i> Add School Year</h3>
            <form action="../admin/add_function.php" method="post"> 
                <div class="form-group">
                    <input type="text" class="form-control" name="sy" placeholder="eg. 2022-2023" required/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_sy" class="btn btn-info btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- add modal for subject -->
<div class="modal fade" id="addsubject" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">        
        <div class="modal-body">
          <h3><i class="now-ui-icons design-2_ruler-pencil"></i> Add Subject</h3>
            <form action="../admin/add_function.php" method="post"> 
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Subject Name" required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="desc" placeholder="Description" required/>
                </div>
                <div class="form-group">
                    <select name="teacher" id="teacher" data-style="btn-primary" class="form-control input-sm">
                      <option value="">-- Select Teacher --</option>
                      <?php
                        $query = mysqli_query($con,"SELECT DISTINCT teacher_id,firstname,lastname FROM tbl_teachers ORDER BY lastname");
                        while($row = mysqli_fetch_array($query)){
                          echo '<option value="'.$row['teacher_id'].'">'.$row['lastname']. ', ' .$row['firstname'].'</option>';
                      }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="yrlevel" id="yrlevel" data-style="btn-primary" class="form-control input-sm" onchange="show_section()">
                      <option value="">-- Select Year Level --</option>
                      <?php
                        $query = mysqli_query($con,"SELECT DISTINCT year_level FROM tbl_class ORDER BY year_level");
                        while($row = mysqli_fetch_array($query)){
                          echo '<option value="'.$row['year_level'].'">'.$row['year_level'].'</option>';
                      }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="section" id="section" data-style="btn-primary" class="form-control input-sm">
                        <option value="">-- Select Year Level First --</option>
                    </select>
                </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="add_subject" class="btn btn-info btn-sm">Add</button>
            </form>
        </div>
        <script>
            function show_section(){
              var year = $('#yrlevel').val();
                  if(year){
                      $.ajax({
                          type:'POST',
                          url:'../admin/includes/dropdown.php',
                          data: 'year_id='+year,
                          success:function(html){
                              $('#section').html(html);
                          }
                      }); 
                  }
            }
          </script>
    </div>
  </div>
</div>


<!-- assign student -->
<div class="modal fade" id="assign_student" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
    <div class="modal-header">
    <?php $id = $_GET['view'];?>
            <h3><i class="now-ui-icons users_single-02"></i> Assign Student</h3>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
            <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id?>" required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lrn" placeholder="Enter LRN" required/>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="assign_student" class="btn btn-info btn-sm">Add</button>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- assign teacher -->
<div class="modal fade" id="assign_teacher" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
    <div class="modal-header">
    <?php $id = $_GET['view'];?>
            <h3><i class="now-ui-icons users_single-02"></i> Assign Teacher</h3>
        </div>
        <div class="modal-body">
            <form action="../admin/add_function.php" method="post"> 
            <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id?>" required/>
                </div>
            <div class="form-group">
                    <select name="teacher" id="teacher" data-style="btn-primary" class="form-control input-sm">
                      <option value="">-- Select Teacher --</option>
                      <?php
                        $query = mysqli_query($con,"SELECT DISTINCT firstname,lastname FROM tbl_teachers ORDER BY lastname");
                        while($row = mysqli_fetch_array($query)){
                          echo '<option value="'.$row['lastname'].'">'.$row['lastname'].', '.$row['firstname'].'</option>';
                      }
                      ?>
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="assign_teacher" class="btn btn-info btn-sm">Assign</button>
            </form>
        </div>
    </div>
  </div>
</div>



