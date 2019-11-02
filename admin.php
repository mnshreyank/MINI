
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="complete">
        <div class="tot-container">
            <div class="ad-container">
                <h1 class="aH">ADMIN LOGIN</h1>
            </div>
            <div>
                <form action="advalid.php" class="form2" method="POST">
                    <div class="adminForm">
                        <input type="text" class="aform" name="aName" id="ad1" placeholder="Name"><br>
                        <input type="password" class="aform" name="aPass" id="ad2" placeholder="Password">
                    </div>
                    <div>
                        <button type="submit" id="ab2" class="but2">LOGIN</button>
                        <span><button onclick="goHome();" type="button" id="ab3" class="but2">HOME</button></span>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>