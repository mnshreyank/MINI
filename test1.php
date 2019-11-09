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
    <title>Test1</title>
    <link rel="stylesheet" href="main.css">
</head>

<body class="tst1">
<div class="top_ele" id="z1">
         <?php
         echo "<p >" . "USN :". $_SESSION['studUsn'] . "</p>";
         echo "<p>" . "NAME :" . $_SESSION['studName'] . "</p>";
         ?>
        
</div>
    <div style="padding:80px">
    <table class="tbl1" style="width:60%">
            <strong><caption>Test1 Marks: MAX 30</caption></strong>
            <tr>
                <th>Subject Id</th>
                <th>Subject Name</th>
                <th>Marks</th>
        <?php
        $sql = "SELECT t_subject_student.sub_id,t_subject.sub_name,t_subject_student.test1 from t_subject_student join t_subject on t_subject_student.sub_id=t_subject.sub_id where t_subject_student.s_usn='" . $_SESSION["studUsn"] . "';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['sub_id'] . "</td><td>" .$row['sub_name'] ."</td><td>" . $row['test1'] . "</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>

</body>

</html>