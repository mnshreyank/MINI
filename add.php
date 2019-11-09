<?php
if (isset($_POST['submit'])) {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ResultAnalysis";

$stusn=$_POST['usn'];
$stname=$_POST['s_name'];
$stemail=$_POST['s_email'];
$gender = $_POST['gender'];
$tsubid=$_POST['t_sub'];
$sem = $_POST['class'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql='Insert into t_student(s_usn,s_name,s_email,s_gender,s_sem) values(?,?,?,?,?);';
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss",$stusn, $stname, $stemail,$gender,$sem);
$stmt->execute();

$stmt->close();
foreach(explode(",",$tsubid) as $eachSubject) {
    $eachSubject = trim($eachSubject, " ");
    // echo "$eachSubject </br>";
    // echo "";
    
    $sql3="INSERT INTO `t_subject_student`(`s_usn`, `sub_id`) VALUES ('".$stusn."','".$eachSubject."');";
    $result = $conn->query($sql3);
}
$conn->close();
}
else if (isset($_POST['submit1'])) {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ResultAnalysis";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$tid=$_POST['t_id'];
$tname=$_POST['t_name'];
$tpass=$_POST['t_pass'];
$tsem=$_POST['t_class'];
$tsubid=$_POST['t_sub'];

$sql='Insert into t_teacher(t_id,t_name,t_pass,t_sem) values(?,?,?,?);';
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss",$tid, $tname, $tpass,$tsem);
$stmt->execute();

$stmt->close();

foreach(explode(",",$tsubid) as $eachSubject) {
    $eachSubject = trim($eachSubject, " ");
    
    $sql4="UPDATE `t_subject` SET `tea_id`='".$tid."' WHERE `sub_id`='".$eachSubject."';";
    $result = $conn->query($sql4);

}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Details</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <button class="tablink" onclick="openPage('Home', this, '#002663')">Add Students</button>
    <button class="tablink" onclick="openPage('News', this, '#002663')" id="defaultOpen">Add Teachers</button>
    <button class="tablink" onclick="openPage('Contact', this, '#002663')">View Students</button>
    <button class="tablink" onclick="openPage('About', this, '#002663')">View Teachers</button>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" method="post">
        <div style="padding-left:40px" id="Home" class="tabcontent tst7">
            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">USN</label>
                <div class="form-group">
                    <input type="text" name="usn" class="form-control" id="s_usn1" required autocomplete="off" maxlength="10" placeholder>
                </div>
            </div>


            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">NAME</label>
                <div class="col-sm-10">
                    <input type="text" name="s_name" class="form-control" id="s_name" required autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">EMAIL</label>
                <div class="col-sm-10">
                    <input type="email" name="s_email" class="form-control" id="s_email" required autocomplete="off">
                </div>
            </div>


            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">Gender</label>
                <div class="col-sm-10">
                    <input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
                </div>
            </div>
            <span>
                <div class="form-group"> <label for="default" class="col-sm-2 control-label">SEM</label>
                    <div class="col-sm-10"> <select name="class" class="form-control" id="default" required="required">
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                </div>
            </span><br>
            <div>
            <label for="default" class="col-sm-2 control-label">SUBJECT ID</label>
                <div class="col-sm-10">
                    <input type="text" name="t_sub" class="form-control" id="t_sub" required autocomplete="off">
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </div>
            </div><br><br><br><br>
        </div>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div style="padding-left:40px" id="News" class="tabcontent tst7">

            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">TID</label>
                <div class="form-group">
                    <input type="text" name="t_id" class="form-control" id="t_tid" required autocomplete="off">
                </div>
            </div>


            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">NAME</label>
                <div class="col-sm-10">
                    <input type="text" name="t_name" class="form-control" id="t_name" required autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">PASSWORD</label>
                <div class="col-sm-10">
                    <input type="password" name="t_pass" class="form-control" id="t_pass" required autocomplete="off">
                </div>
            </div>

            <div class="form-group"> <label for="default" class="col-sm-2 control-label">SEM</label>
                <div class="col-sm-10"> <select name="t_class" class="form-control" id="default1" required="required">
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
            </div><br>
            <div>
            <label for="default" class="col-sm-2 control-label">SUBJECT ID</label>
                <div class="col-sm-10">
                    <input type="text" name="t_sub" class="form-control" id="t_sub" required autocomplete="off">
                </div>

            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button value="Submit" type="submit" name="submit1" class="btn btn-primary">Add</button>
                </div>
            </div><br><br><br><br><br><br>

        </div>
    </form>
    <div style="padding:80px"id="Contact" class="tabcontent">
        <table class="tbl1" style="width:80%">
            <caption>Student Information</caption>
            <tr>
                <th>USN</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>GENDER</th>
                <th>SEM</th>
            </tr>
            <?php
            $conn = new mysqli('localhost', 'root', '','ResultAnalysis');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql="Select * from t_student;";
            $result=$conn->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo"<tr><td>" . $row['s_usn'] . "</td><td>" . $row['s_name'] . "</td><td>" . $row['s_email'] . "</td><td>" . $row['s_gender'] . "</td><td>" . $row['s_sem'] . "</td></tr>";
                } 
                echo "</table>";
            }
            $conn->close();
            ?>
        </table>

    </div>

    <div style="padding:80px" id="About" class="tabcontent">
    
        <table class="tbl1" style="width:75%">
            <caption>Teacher Information</caption>
            <tr>
                <th>TID</th>
                <th>NAME</th>
                <th>SEM</th>
            </tr>
            <?php
            $conn = new mysqli('localhost', 'root', '','ResultAnalysis');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql="Select t_id,t_name,t_sem from t_teacher order by t_id asc;";
            $result=$conn->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo"<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>". $row['t_sem'] . "</td></tr>";
                } 
                echo "</table>";
            }
            $conn->close();
            ?>
        </table>

        
    </div>
    <script>
        function openPage(pageName, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

</body>

</html>