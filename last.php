<!-- <?php
session_start();
$sql;
$conn = new mysqli('localhost', 'root', '', 'resultanalysis');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submitt'])){
    print_r($_POST);
    $usns = array_keys($_POST['test3']);
    print_r($usns);

    foreach ($usns as $usn) {
       
        $test1   = mysqli_real_escape_string($conn,$_POST['test1'][$usn]);
        print_r($test1);
        $test2  = mysqli_real_escape_string($conn,$_POST['test2'][$usn]);
        print_r($test2);
        $test3  = mysqli_real_escape_string($conn,$_POST['test3'][$usn]);
        print_r($test3);
        $final = mysqli_real_escape_string($conn,$_POST['final'][$usn]);
        print_r($final);
        $usn1     = mysqli_real_escape_string($conn,$usn);
        print_r($usn1);
        // update data in mysql database 
        $sql="UPDATE `t_subject_student` SET test1=' $test1  ',test2='  $test2  ',test3='  $test3  ',final='  $final  ' where sub_id='" . $_COOKIE["selectedSubject"] . "' and s_usn='$usn1';";
        $res1=$conn->query($sql);
        
    }
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'> document.location = 'teacher.php'; </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    }

// if successfully updated. 










    // $sql = "Select t_subject_student.s_usn,t_student.s_name,t_subject_student.test1,t_subject_student.test2,t_subject_student.test3,t_subject_student.final from t_subject_student join t_student on t_subject_student.s_usn=t_student.s_usn join t_subject on t_subject_student.sub_id=t_subject.sub_id where t_subject.tea_id='" . $_SESSION["teacherId"] . "' and t_subject.sub_id='" . $_COOKIE["selectedSubject"] . "' order by t_subject_student.s_usn;";
    // $res = $conn->query($sql);
    // $sql1 = "UPDATE `t_subject_student` SET test1='" . $_POST["test1"] . "',test2='" . $_POST["test2"] . "',test3='" . $_POST["test3"] . "',final='" . $_POST["final"] . "' where sub_id='15CS71' and s_usn='1BI16IS050';";
    // $res1 = $conn->query($sql1);
    
    // if ($conn->query($sql1) === TRUE) {
    //     echo $_POST["test1"];
    // } else {
    //     echo "Error updating record: " . $conn->error;
    // }

?> -->