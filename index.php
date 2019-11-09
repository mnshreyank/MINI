<?php
session_start();

if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ResultAnalysis";
    $_SESSION['studUsn'] = $_POST['sUsn'];
    $_SESSION['studName'] = $_POST['sName'];

    $susn = $_POST['sUsn'];
    $sname = $_POST['sName'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "Select s_usn,s_name from t_student where s_usn=? and s_name=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $susn, $sname);
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        echo "<script type='text/javascript'> document.location = 'find-result.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
    $conn->close();
} else if (isset($_POST['submit1'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ResultAnalysis";

    $_SESSION['teacherId']=$_POST['tId'];
    $_SESSION['teacherPass']=$_POST['tPass'];

    $tid = $_POST['tId'];
    $tpass = $_POST['tPass'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "Select t_id,t_pass from t_teacher where t_id=? and t_pass=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $tid, $tpass);
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        echo "<script type='text/javascript'> document.location = 'add-result.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="main.css">
</head>

<body class="cc1">
    <div class="main-wrapper">
        <div class="">
            <div class="row">
                <h1 class="header">Student Result Analysis</h1>
            </div>
            <div class="">
                <button onclick="alogin();" type="button" class="butt" id="but1">ADMIN</button>
            </div>
            <div class="both">
                <div class="stdLogin">
                    <h1 class="sheader">Student Login</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" method="POST">
                        <div class="form_group">
                            <input required onmouseover="textPress(id);" onmouseout="normal(id);" type="text" name="sUsn" id="s_usn" class="form_control" placeholder="Usn"><br>
                            <input type="text" name="sName" id="s_name" class="form_control" placeholder="Name">
                        </div>
                        <div class="form1">
                            <button name="submit" class="butt" type="submit">Check Result</button>
                        </div>
                    </form>
                </div>
                <div class="teaLogin">
                    <h1 class="sheader">Teacher Login</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal1" method="POST">
                        <div class="form_group">
                            <input type="text" id="tt1" name="tId" class="form_control" placeholder="Teacher Id"><br>
                            <input type="password" id="tt2" name="tPass" class="form_control" placeholder="Password">
                        </div>
                        <div class="form1">
                            <button class="butt" type="submit" name="submit1">Sign In</button>
                            <a href="">Change Password</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>

</body>

</html>