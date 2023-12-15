<?php
$userName = $_POST["userName"];
$password = $_POST["password"];
$conn =mysqli_connect("localhost", "root", "" , "tg");
if (!$conn)
{
die ("could not connect: " . mysql_error());
}

$sql = "SELECT * FROM staff  WHERE userName = '$userName' AND password = '$password' ";
 $m= mysqli_query($conn, $sql);
//geting of numbers of rows for spacific email and apssword
$numberOfRow = mysqli_num_rows($m);
 
if ($numberOfRow>0){
    echo   "login success";
 header('location:upload.php');
}
else
{
    echo $conn -> error;
     echo   "login unsuccess";
} 
?> 