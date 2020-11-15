<?php
// Starting session
session_start();
 
// Accessing session data
echo 'Hi, ' . $_SESSION["fullname"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sidemenu{
            position : fixed;
            top : 0px ;
            left : 0px ;
            height : 100% ;
            width : 30% ;
            z-index : 1 ;
            overflow-x: hidden;
            padding-top: 60px;
        }
    </style>
</head>
<body>
    <div id="menu" class="sidemenu">
        <a href="">Employee information</a>
        <a href="">Salary information</a>
        <a href="">Leave Application</a>
        <a href="">Company Updates</a>
        <a href="">Projects Updates</a>
    </div>
</body>
</html>