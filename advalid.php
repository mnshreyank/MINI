<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ResultAnalysis";

$aname = $_POST['aName'];
$apass = $_POST['aPass'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "Select a_name,a_password from admin where a_name=? and a_password=?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $aname, $apass);
$stmt->execute();
$result=mysqli_stmt_get_result($stmt);
$rowCount = mysqli_num_rows($result);

if ($rowCount > 0) {
    echo "<script type='text/javascript'> document.location = 'add.php'; </script>";
} else {
    echo "<script>alert('Invalid Details');</script>";
    echo "<script type='text/javascript'> document.location = 'admin.php';</script>";

}

?>