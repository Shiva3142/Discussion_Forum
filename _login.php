<?php
include 'dbconnect.php';

$username=$_POST['username'];
$password=md5($_POST['password']);

$sql="SELECT*FROM users WHERE username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql);
if($rownum=mysqli_num_rows($result)>0)
{
    session_start();
    $_SESSION['username']=$username;
    $_SESSION['logincount']=1;
}
else
{
    session_start();
    $_SESSION['notlogin']=1;
}
header("location:index.php");
?>