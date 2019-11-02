<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ResultAnalysis";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Total</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
<div class="top_ele">
         <?php
         echo "<p>" . "USN :". $_SESSION['studUsn'] . "</p>";
         echo "<p>" . "NAME :" . $_SESSION['studName'] . "</p>";
         ?>
        
</div>
    <div>
    <table class="tbl1" style="width:50%">
            <caption>Total Marks</caption>
            <tr>
                <th>Subject Id</th>
                <th>Subject Name</th>
                <th>Test1</th>
                <th>Test2</th>
                <th>Test3</th>
                <th>Final</th>
        <?php
        $sql = "SELECT t_subject_student.sub_id,t_subject.sub_name,t_subject_student.test1,t_subject_student.test2,t_subject_student.test3,t_subject_student.final from t_subject_student join t_subject on t_subject_student.sub_id=t_subject.sub_id where t_subject_student.s_usn='" . $_SESSION["studUsn"] . "';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['sub_id'] ."</td><td>" . $row['sub_name'] . "</td><td>" . $row['test1'] ."</td><td>" . $row['test2'] . "</td><td>" . $row['test3'] . "</td><td>" . $row['final'] . "</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>

</body>

</html>