<?php
include 'dbconnect.php';

$username=$_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);

$sql="SELECT*FROM users WHERE username='$username' OR email='$email'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    session_start();
    $_SESSION['nosignup']=1;
    header("location:index.php");
}
else
{
   $sql1="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
    $result1=mysqli_query($conn,$sql1);
    if($result1)
    {
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['signupresult']=1;
        header("location:index.php");
    }
    else{
        echo "not inserted";
    }
}
?>