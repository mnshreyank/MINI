<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Subject</title>
    <link rel="stylesheet" href="main.css">
</head>

<body class="b1">
<div class="ar1">
    <div class="top_ele">
        <?php


        echo "<p class='pp1'>TID :" . $_SESSION['teacherId'] . "</p>";
        echo "<p class='pp1'>NAME :</p>";
        ?>
    </div>
    <div>
        <p class="sub">Select the subject</p>
    </div>
    <form action="">
        <div class="col-sm-10"> <select name="subjects" id="selection" class="form-control" id="default1" required="required">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ResultAnalysis";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "Select sub_id,sub_name FROM  t_subject where tea_id='" . $_SESSION['teacherId'] . "';";
                $result = $conn->query($sql);


                while ($row = $result->fetch_assoc()) {
                    echo "<option>" . $row['sub_id'] . " " . $row['sub_name'] . "</option>";
                }

                ?>
            </select>
        </div><br>
        <div>
            <button class="btn" id="done" onclick="main();">Done</button>
        </div>
    </form>
</div>
    <script>
        
        function main() {
            event.preventDefault();
            var e = document.getElementById("selection");
            var ee = e.options[e.selectedIndex].text.split(" ")[0].trim();
            //localStorage.setItem("selectedSubject", ee);
            document.cookie = "selectedSubject=" + ee;
            window.location = "teacher.php";
        }
    </script>
</body>

</html>