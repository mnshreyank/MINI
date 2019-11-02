<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'ResultAnalysis');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $sql1 = "UPDATE `t_subject_student` SET test1='" . $_POST["test1"] . "',test2='" . $_POST["test2"] . "',test3='" . $_POST["test3"] . "',final='" . $_POST["final"] . "' where sub_id='15CS71' and s_usn='1BI16IS001';";
    $res1 = $conn->query($sql1);
    
    if ($conn->query($sql1) === TRUE) {
        echo $_POST["test1"];
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>