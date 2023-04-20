<?php
    include('includes/header.php');
    include('includes/sidebar.php');
    include('../conn.php');
?>
<div id="content-wrapper" class="d-flex flex-column page">
            <div id="content">
                    <?php include('includes/navbar.php');?>
                    <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Grades</h1>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                <div class="card shadow mb-4" style="width:90%;">
                    <div class="card-header py-3">
                    <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                            <?php
                            $sy = $_GET['sy'];
                            $id = $_GET['view'];
                            $sql = "SELECT * FROM tbl_class WHERE class_id='$id'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_assoc($result);
                        ?>  
                            <li class="breadcrumb-item"><a href="javascript:history.back()"><i class="fas fa-backward"></i> Back</a></li>
                            <li class="breadcrumb-item"><?php echo $row['grade_level']. ' - Section ' .$row['section']; ?></li>
                        </ol>
                        </nav>   
                        <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size:15px">
                        <thead style="text-align: center" class="table">
                                <tr style="background-color: #F5F5F5">
                                    <th rowspan=2 style="vertical-align: middle;">LEARNING AREA</th>
                                    <th colspan=4>QUARTER</th>
                                    <th rowspan=2 style="vertical-align: middle;">Final Grade</th>
                                    <th rowspan=2 style="vertical-align: middle;">Remarks</th>      
                                </tr>
                                <tr style="background-color: #F5F5F5">
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                </tr>
                                <tr>
                                </thead>
                                    <tbody>
                                    <?php
                                        $sql2 = "SELECT tbl_subjects.subject_name, tbl_grades.class_id, tbl_grades.first,tbl_grades.second,tbl_grades.third,tbl_grades.fourth,tbl_grades.student_id,tbl_grades.sy_id
                                        FROM tbl_grades JOIN tbl_subjects ON tbl_subjects.subject_id = tbl_grades.subject_id
                                        WHERE tbl_grades.sy_id = '$sy' AND tbl_grades.student_id = '".$_SESSION['student_id']."' GROUP BY tbl_subjects.subject_name";

                                            $result2 = mysqli_query($con,$sql2);

                                            if (mysqli_num_rows($result2) > 0)
                                                {
                                                while ($row2 = $result2-> fetch_assoc())
                                                {
                                                    $subject = $row2['subject_name'];
                                                    $first = $row2['first'];
                                                    $second = $row2['second'];
                                                    $third = $row2['third'];
                                                    $fourth = $row2['fourth'];                         
                                        ?> 
                                        <tr style="text-align: center; background-color: #F5F3F3">
                                            <?php 
                                                    echo "<td>".$subject."</td>";
                                                    echo "<td>".$first."</td>";
                                                    echo "<td>".$second."</td>";
                                                    echo "<td>".$third."</td>";
                                                    echo "<td>".$fourth."</td>";
                                                    if($first > 0 && $second > 0 && $third > 0 && $fourth > 0){
                                                        $final = ($first + $second + $third + $fourth)/4;
                                                        echo "<td>".$final."</td>";
                                                        if($final >= 75 && $final <= 100){
                                                            echo "<td>Passed</td>";
                                                         }else{
                                                            echo "<td>Failed</td>";
                                                         }
                                                    }else{
                                                        echo "<td></td>";
                                                        echo "<td></td>";                                             
                                                       }
                                                    }
                                                    echo "<tr style='text-align: center; background-color: #F5F5F5'>";
                                                    echo "<td class='border-left-0 border-bottom-0'></td>";
                                                    echo "<td colspan=4><strong>GENERAL AVERAGE</strong></td>";
                                                 if($first > 0 && $second > 0 && $third > 0 && $fourth > 0){
                                                     $sql3 = "SELECT student_id,sy_id,ROUND(AVG(first+second+third+fourth)/4,2) AS average FROM tbl_grades WHERE student_id='".$_SESSION['student_id']."' AND sy_id='$sy'";
                                                     $result3 = mysqli_query($con,$sql3);
                                                     while ($row2 = $result3-> fetch_assoc())
                                                     {
                                                         $avg = $row2['average'];
                                                     }
                                                     echo "<td><strong>".$avg."</strong></td>";
                                                     if($avg >= 75 && $avg <= 100){
                                                         echo "<td><strong>Passed</strong></td>";
                                                     }else{
                                                         echo "<td><strong>Failed</strong></td>";
                                                     }
                                                 
                                             }else{
                                                echo "<td></td>";
                                                echo "<td></td>"; 
                                             }
                                             echo "</tr";
                                                }

                                            ?>                                        
                                            </tr>                                                
                                    </tbody>     
                                </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
<?php
    include('includes/scripts.php');
?>