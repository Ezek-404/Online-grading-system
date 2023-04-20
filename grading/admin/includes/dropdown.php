<?php
	include ('../../conn.php');
	if(isset($_POST['year_id'])){

		$year_id = $_POST['year_id'];
		$query = mysqli_query($con,"select distinct section
									from tbl_class 
									where year_level = '$year_id' ") or die('Error: ' . mysqli_error($con));
		$rowCount = mysqli_num_rows($query);

		if($rowCount > 0){
			echo '<option value="section" disabled selected>-- Select Section -- </option>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<option value="'.$row['section'].'">'.$row['section'].'</option>';
			}
		}
		//else {
		//	echo '<option value="" disabled selected>-- All faculty was assigned --</option>';
		//	echo '<script>$("#subj_name").hide();document.getElementById("btn_add").disabled = true;</script>';
		//}
	}
?>