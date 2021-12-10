<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page Of Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
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
    <div class="container ">
        <?php
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == "Sksingh") {
                echo '<h1 class="text-center my-2">Your Files</h1>';
                $fileList = glob('temp/*');
                foreach ($fileList as $filename) {
                    echo '<div class="container d-flex justify-content-center"><a class="btn btn-primary my-1 r" href="' . $filename . '" download>' . substr($filename, 5) . '</a><br></div>';
                }
            }
        }
        ?>
        <?php
        include 'footer.php';
        ?>
</body>

</html>