<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="discussion_forum";
    $conn=mysqli_connect($server,$username,$password,$database);
    if(!$conn)
    {
        echo "error".mysqli_connect_error($conn);
    }
?>