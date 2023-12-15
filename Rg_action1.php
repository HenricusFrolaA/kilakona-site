<!DOCTYPE html>
<?php
$userName = $_POST["userName"];
$phoneNumber = $_POST["phoneNumber"];
$password = $_POST["password"];//angalia password kwenye frontend aikosawa
$Email = $_POST["Email"];
$company = $_POST["company"];
$conn =mysqli_connect("localhost", "root", "" , "tg");
if (!$conn)
{
die ("could not connect: " . mysql_error());
}

$sql = "INSERT INTO staff ( userName, password, phoneNumber, Email, company)
VALUES ( '$userName' ,  '$phoneNumber' , '$password' , '$Email ' , '$company')";
$my= mysqli_query($conn, $sql);
if ($my)
{
    // echo "record added";  
    header('location:login/login_page.html');

}
else
{
    echo "record is noadded". mysqli_error($conn);
} 
?>  
