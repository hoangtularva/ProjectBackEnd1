<?php
    session_start();
    session_destroy();
    header("loccation:loginadmin.php");
    echo "You already logout admin!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout Admin</title>
</head>
<body>
    
</body>
</html>