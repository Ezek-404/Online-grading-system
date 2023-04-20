<?php
        include('../conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CAPSTONE</title>

    <link href="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.gstatic.com/s/nunito/v24/XRXV3I6Li01BKofIOuaBXso.woff2)"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="../startbootstrap-sb-admin-2-gh-pages/css/print.css" media="print">
</head>
<body onload="print()">
        <?php
            $sy = $_GET['print'];
            $stud = $_GET['grade'];

            $sql = "SELECT * FROM tbl_schoolyear JOIN tbl_class ON tbl_class.sy_id = tbl_schoolyear.sy_id JOIN tbl_section ON tbl_class.class_id = tbl_section.class_id WHERE tbl_class.sy_id='$sy' AND tbl_section.student_id='$stud'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);

            $sql2 = "SELECT * FROM tbl_students WHERE student_id='$stud'";
            $result2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
        ?>  
        <div class="card shadow mb-4">
                        <div class="card-header py-4"><strong>LRN: </strong><?php echo $row2['lrn']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Name: </strong>
                        <?php echo $row2['lastname'].', '.$row2['firstname'].' '.$row2['middle_initial']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <br><br><strong>Grade: </strong><?php echo $row['grade_level']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>Section: </strong><?php echo $row['section']?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>School Year: </strong><?php echo $row['schoolyear']?></strong>
                      </div>
                        <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable" width="95%" cellspacing="0" style="font-size:15px">
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
                                        WHERE tbl_grades.sy_id = '$sy' AND tbl_grades.student_id = '$stud' GROUP BY tbl_subjects.subject_name";

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
                                                         $sql3 = "SELECT student_id,sy_id,ROUND(AVG(first+second+third+fourth)/4,2) AS average FROM tbl_grades WHERE student_id='$stud' AND sy_id='$sy'";
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
                                                }else{
                                                   echo "<tr style='text-align: center'>"; 
                                                   echo "<td colspan=7><strong><i>~No Records~</i></strong></td>";
                                                   echo "</tr>";
                                                }
                                            ?>                                        
                                            </tr>                                                
                                    </tbody> 
                                </table>
                            </div>                           
</body>
</html>