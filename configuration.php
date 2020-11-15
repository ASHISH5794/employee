<?php

$servername = "localhost";
$username = "ashish";
$userpassword = "Ashu@321";
$userdb = "phpapp";

$conn = mysqli_connect($servername,$username,$userpassword,$userdb);

if(!$conn){
    die("Connection failed:" .mysqli_connect_error());
}else{
    echo "Successfully Connected";
}

?>