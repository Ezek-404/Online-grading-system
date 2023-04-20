<!-- ===== STUDENT DELETE MODAL ==== -->
<div id="studentdeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_user_id">
            <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_student">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- ===== PERMANENT STUDENT DELETE MODAL ==== -->
<div id="pstudentdeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_student_id" class="delete_stud_id">
            <p>Are you sure you to delete Permanently?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_pstudent">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- ===== TEACHER DELETE MODAL ==== -->
<div id="teacherdeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_user_id">
            <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_teacher">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- ===== PERMANENT TEACHER DELETE MODAL ==== -->
<div id="pteacherdeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_teacher_id" class="delete_teach_id">
            <p>Are you sure you to delete Permanently?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_pteacher">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- ===== SUBJECT DELETE MODAL ==== -->
<div id="subjectdeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_subject_id">
            <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_subject">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- ===== PERMANENT TEACHER DELETE MODAL ==== -->
<div id="psubjectdeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_subject_id" class="delete_sub_id">
            <p>Are you sure you to delete Permanently?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_psubject">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>


<!-- ===== SECTION DELETE MODAL ==== -->
<div id="sectiondeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_class" class="delete_class_id">
            <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_section">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- ===== PERMANENT SECTION DELETE MODAL ==== -->
<div id="psectiondeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_section_id" class="delete_sec_id">
            <p>Are you sure you to delete Permanently?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_psection">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>


<!-- ===== SY DELETE MODAL ==== -->
<div id="sydeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_sy_id">
            <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_sy">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- ===== PERMANENT SY DELETE MODAL ==== -->
<div id="schoolyeardeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="delete_year_id" class="delete_year_id">
            <p>Are you sure you to delete Permanently?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_year">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- ===== ASSIGNED STUDENT DELETE MODAL ==== -->
<div id="assignedstuddeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
        <div class="form-group">
                    <input type="hidden" class="form-control" name="sy" value="<?php echo $sy?>" required/>
                </div>
                
                <div class="form-group">
                    <input type="hidden" class="form-control" name="view" value="<?php echo $id?>" required/>
                </div>

        <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_assign_id">
            <p>Are you sure you to remove this Student?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_assigned_student">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- ===== ASSIGNED SUBJECT DELETE MODAL ==== -->
<div id="assignedsubdeletemodal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="../admin/delete_function.php" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="sub" value="<?php echo $id?>" required/>
                </div>

        <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_assign_id">
            <p>Are you sure you to remove this Subject?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete_assigned_subject">Yes</button>
        </div>
        </form>
    </div>
  </div>
</div>
