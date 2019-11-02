<?php
session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Test</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="top_ele">
        <?php
        echo "<p>" . "USN :" . $_SESSION['studUsn'] . "</p>";
        echo "<p>" . "NAME :" . $_SESSION['studName'] . "</p>";
        ?>

    </div>
    <div class="test-container">
        <div class="fr_but" onclick="test1();">TEST 1</div>
        <div class="fr_but" onclick="test2();">TEST 2</div>
        <div class="fr_but" onclick="test3();">TEST 3</div>
        <div class="fr_but" onclick="final();">FINAL</div>
        <div class="fr_but" onclick="total();">TOTAL</div>
    </div>
    <script>
        function test1() {
            event.preventDefault();
            window.location = "test1.php";
        }

        function test2() {
            event.preventDefault();
            window.location = "test2.php";
        }

        function test3() {
            event.preventDefault();
            window.location = "test3.php";
        }

        function final() {
            event.preventDefault();
            window.location = "final.php";
        }

        function total() {
            event.preventDefault();
            window.location = "total.php";
        }
    </script>


</body>

</html>