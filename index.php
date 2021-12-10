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
    <?php
    include 'header.php';
    include 'dbconnect.php';
    include 'loginmodal.php';
    include 'signupmodal.php';
    ?>
    <div id="carousel" class="carousel slide mb-2" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="html1.jpg" class="d-block w-100" alt="HTML">
                <div class="carousel-caption d-none d-md-block homecaption">
                    <h5>HYPER_TEXT_MARKUP_LANGUAGE</h5>
                    <p>This site mainly contains the HTML scripting for display of containt</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="css1.jpg" class="d-block w-100" alt="CSS">
                <div class="carousel-caption d-none d-md-block homecaption">
                    <h5 class="">CASCADING_STYLE_SHEET</h5>
                    <p>This site is styled by CSS scripting and It is created by BOOTSTRAP framework </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Javascript1.jpg" class="d-block w-100" alt="JavaScript">
                <div class="carousel-caption d-none d-md-block homecaption">
                    <h5>JavaScript and PHP</h5>
                    <p>This site uses the JavaScript for validation And PHP scripting for authunication and Database
                        handaling</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <h1 class="container text-center bg-light">Discussion Categories</h1>


    <div class="container mb-5">
        <div class="row">
            <?php
            $sql = "SELECT *FROM categories";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $thread_id = $row['thread_id'];
                    $thread_title = $row['thread_title'];
                    $thread_description = $row['thread_description'];
                    echo ' <div class="col-lg-4 col-sm-6 my-2">
                                <div class="card" style="width: 18rem;">
                                    <img src="https://source.unsplash.com/1600x900/?' . $thread_title . ',programming" class="card-img-top" alt="'.$thread_title.'">
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="threads.php?thread_id=' . $thread_id . '">' . $thread_title . '</a></h3>
                                        <p class="card-text">' . substr($thread_description, 0, 200) . '......</p>
                                    </div>
                                </div>
                            </div>';
                }
            }
            ?>
        </div>
    </div>
    <?php
    include 'footer.php';
    mysqli_close($conn);
    ?>
</body>

</html>