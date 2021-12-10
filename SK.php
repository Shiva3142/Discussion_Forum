<?php
session_start();
?>

<?php
if (isset($_POST['submit'])) {
    $file_name=$_FILES['file']['name'];
    $temp_location=$_FILES['file']['tmp_name'];
    $location="temp/".$file_name;
    move_uploaded_file($temp_location,$location);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page Of Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js"></script> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</head>

<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

<body>
    <?php
    include 'header.php';
    include 'loginmodal.php';
    include 'signupmodal.php';
    ?>
    <?php
    if(isset($_SESSION['username']))
    {
        if ($_SESSION['username']=="Sksingh") {
            echo '<div class="container mt-5">
        <form action="?" class="form" method="POST" enctype="multipart/form-data">
            <h1 class="text-center">UPLOAD your File</h1>
            <div class="container d-flex justify-content-center my-5">
                <input type="file" name="file" id="file" required>

            </div>
            <div class="container d-flex justify-content-center my-5">
                <input class="btn btn-success" type="submit" value="submit" name="submit">

            </div>
        </form>
    </div>';
        }
    }
    ?>
    
    <?php
    include 'footer.php';
    ?>
</body>

</html>