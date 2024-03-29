<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'ResultAnalysis');
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
    <title>Add Details</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <button class="tablink" onclick="openPage('Home', this, '#002663')">Add/Update Results</button>
    <button class="tablink" onclick="openPage('News', this, '#002663')" id="defaultOpen">View Results</button>
    <button class="tablink" onclick="openPage('Contact', this, '#002663')">Visualise</button>
    <button class="tablink" onclick="openPage('About', this, '#002663')">Top 10</button>
    <div style="padding:80px" id="Home" class="tabcontent">

        <table class="tbl1" style="width:80%">
            <caption>Student Results</caption>
            <tr>
                <th>USN</th>
                <th>Name</th>
                <th>Test1</th>
                <th>Test2</th>
                <th>Test3</th>
                <th>Final</th>
            </tr>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'ResultAnalysis');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "Select t_subject_student.s_usn,t_student.s_name,t_subject_student.test1,t_subject_student.test2,t_subject_student.test3,t_subject_student.final from t_subject_student join t_student on t_subject_student.s_usn=t_student.s_usn join t_subject on t_subject_student.sub_id=t_subject.sub_id where t_subject.tea_id='" . $_SESSION["teacherId"] . "' and t_subject.sub_id='" . $_COOKIE["selectedSubject"] . "' order by t_subject_student.s_usn;";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $usn=$row['s_usn'];
                    $name=$row['s_name'];
                    $test1=$row['test1'];
                    $test2=$row['test2'];
                    $test3=$row['test3'];
                    $final=$row['final'];

                    echo "<tr><td>" . $usn . "</td><td>" . $name . "</td><td>" . "<form action='last.php' method='Post'>" . "<input name='test1[".$usn."]' placeholder='' value='" . $row["test1"] . "' class='form_control' type='text'>" . "</td><td>" . "<input name='test2[".$usn."]' placeholder='' value='" . $row["test2"] . "' class='form_control' type='text'>" . "</td><td>" . "<input name='test3[".$usn."]' placeholder='' value='" . $row["test3"] . "' class='form_control' type='text'>" . "</td><td>" . "<input placeholder='' value='" . $row["final"] . "' name='final[".$usn."]' class='form_control' type='text'>" . "</td></tr>";
                }
                echo "</table>";
                echo "<br>" . "<input type='submit' value='Save' name='submitt' class='btn'>";
                echo "</form>";
            }


            ?>

            <div>
            </div>
            </form>


    </div>

    <div id="Contact" class="tabcontent">
        <?php

        $sql21="Select t_subject_student.test1,t_subject_student.test2,t_subject_student.test3,t_subject_student.final from t_subject_student join t_student on t_subject_student.s_usn=t_student.s_usn join t_subject on t_subject_student.sub_id=t_subject.sub_id where t_subject.tea_id='" . $_SESSION["teacherId"] . "' and t_subject.sub_id='" . $_COOKIE["selectedSubject"] . "'";
        $result = $conn->query($sql21);

        $c1=0;
        $c2=0;
        $c3=0;
        $c4=0;
        $c5=0;
        $c6=0;
        $c7=0;
        
        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $finalResult=ceil(($row['test1']+$row['test2']+$row['test3'])/3+($row['final']));

                if($finalResult>=90){
                    $c1++;
                }
                else if($finalResult>=80 and $finalResult<90){
                    $c2++;
                }else if($finalResult>=70 and $finalResult<80){
                    $c3++;
                }else if($finalResult>=60 and $finalResult<70){
                    $c4++;
                }else if($finalResult>=50 and $finalResult<60){
                    $c5++;
                }else if($finalResult>=40 and $finalResult<50){
                    $c6++;
                
                }else{
                    $c7++;
                }
            }
        }
        $dataPoints = array(
            array("label" => "Above 90", "y" => $c1),
            array("label" => "80-90", "y" => $c2),
            array("label" => "70-80", "y" => $c3),
            array("label" => "60-70", "y" => $c4),
            array("label" => "50-60", "y" => $c5),
            array("label" => "40-50", "y" => $c6),
            array("label" => "Below 40(FAIL)", "y" => $c7),
            

        );
        

        ?>

        <!DOCTYPE HTML>
        <html>

        <head>

            <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        exportEnabled: true,
                        title: {
                            text: "Student Result"
                        },
                        subtitles: [{
                            text: "Final"
                        }],
                        data: [{
                            type: "pie",
                            showInLegend: "true",
                            legendText: "{label}",
                            indexLabelFontSize: 16,
                            indexLabel: "{label} - #percent%",
                            yValueFormatString: "฿#,##0",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();

                }
            </script>
        </head>

        <body>
            <div id="chartContainer" style="height: 370px; width: 70%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </body>

        </html>


    </div>


    <div style="padding:80px" id="News" class="tabcontent">
        <table class="tbl1" style="width:80%">
            <caption>Student Results</caption>
            <tr>
                <th>USN</th>
                <th>Name</th>
                <th>Test1</th>
                <th>Test2</th>
                <th>Test3</th>
                <th>Final</th>
            </tr>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'ResultAnalysis');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "Select t_subject_student.s_usn,t_student.s_name,t_subject_student.test1,t_subject_student.test2,t_subject_student.test3,t_subject_student.final from t_subject_student join t_student on t_subject_student.s_usn=t_student.s_usn join t_subject on t_subject_student.sub_id=t_subject.sub_id where t_subject.tea_id='" . $_SESSION["teacherId"] . "' and t_subject.sub_id='" . $_COOKIE["selectedSubject"] . "' order by t_subject_student.s_usn;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['s_usn'] . "</td><td>" . $row['s_name'] . "</td><td>" . $row['test1'] . "</td><td>" . $row['test2'] . "</td><td>" . $row['test3'] . "</td><td>" . $row['final'] . "</td></tr>";
                }
                echo "</table>";
            }
            ?>
        </table>
    </div>


    <div style="padding:80px" id="About" class="tabcontent">
        <table class="tbl1" style="width:75%">
            <caption>Top 10</caption>
            <tr>
                <th>USN</th>
                <th>Name</th>
                <th>Marks</th>

            </tr>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'ResultAnalysis');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT t_subject_student.s_usn,t_subject_student.test1,t_subject_student.test2,t_subject_student.test3,t_student.s_name,t_subject_student.final from t_subject_student join t_student  on t_subject_student.s_usn=t_student.s_usn JOIN t_subject on t_subject_student.sub_id=t_subject.sub_id where t_subject.tea_id='" . $_SESSION["teacherId"] . "' and t_subject.sub_id='" . $_COOKIE["selectedSubject"] . "' ORDER BY t_subject_student.final DESC;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $finalResult=ceil(($row['test1']+$row['test2']+$row['test3'])/3+($row['final']));

                    echo "<tr><td>" . $row['s_usn'] . "</td><td>" . $row['s_name'] . "</td><td>" . $finalResult. "</td></tr>";
                }
                echo "</table>";
            }
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