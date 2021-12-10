<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>threads Page Of Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    include 'header.php';
    include 'dbconnect.php';
    include 'loginmodal.php';
    include 'signupmodal.php';
    $thread_id = $_GET['thread_id'];
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $topic_title = $_POST['topic'];
        $topic_title = str_replace("<", "&lt;", $topic_title);
        $topic_title = str_replace(">", "&gt;", $topic_title);
        $topic_title = str_replace("'", "&apos;", $topic_title);
        $topic_title = str_replace('"', "&quot;", $topic_title);
        $topic_title = str_replace("\n", "<br>", $topic_title);
        $topic_description = $_POST['topic_description'];
        $topic_description = str_replace("<", "&lt;", $topic_description);
        $topic_description = str_replace(">", "&gt;", $topic_description);
        $topic_description = str_replace("'", "&apos;", $topic_description);
        $topic_description = str_replace('"', "&quot;", $topic_description);
        $topic_description = str_replace("\n", "<br>", $topic_description);
        $posted_by = $_SESSION['username'];
        $sql = "SELECT * FROM threads WHERE topic_title='$topic_title' AND posted_by='$posted_by'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Are you tring to Ask duplicate Query ,<br>It is due to you Refresh the page After the submitting the Query OR you entered same query again <br>Please Don`t Refresh the page Again After the submitteng the Query</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        } else {
            $sql1 = "INSERT INTO threads(topic_title,topic_description,posted_by,thread_cat_id) VALUES('$topic_title','$topic_description','$posted_by','$thread_id')";
            $result1 = mysqli_query($conn, $sql1);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Query Asked Successfully ,<br>Don`t Refresh the page </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
    ?>
    <?php
    $sql = "SELECT*FROM categories WHERE thread_id=$thread_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $thread_title = $row['thread_title'];
        $thread_description = $row['thread_description'];
        $referance_documentation = $row['referance_documentation'];
        echo ' <div class="container mt-5">
        <div class="card cardhead">
            <div class="card-header fs-1 cardheader">
                ' . $thread_title . ' Discussion Forum
            </div>
            <div class="card-body">
                <p class="card-text">' . $thread_description . '</p>
                <a href="' . $referance_documentation . '" class="btn btn-primary">' . $thread_title . ' Referance Documentation</a>
            </div>
        </div>
    </div>';
    }
    if (isset($_SESSION['username'])) {
        echo '<div class="container border border-dark border-2 rounded-2 p-2 my-5 col-md-5">
        <h2 class="text-center">Ask A Query</h2>
        <form action="';
        echo $_SERVER['REQUEST_URI'];
        echo '" method="post">
            <label class="form-control mb-2 bg-info" for="topic">Enter Topic</label>
            <input class="form-control mb-2" type="text" name="topic" id="topic" required>
            <label class="form-control mb-2 bg-info" for="topic_description">Enter description</label>
            <textarea class="form-control mb-2" type="text" name="topic_description" id="topic_description" required></textarea>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>

    </div>
    ';
    }
    ?>
    <div class="container mt-5">
        <h1 class="fs-2 border border-dark text-center bg-secondary">
            Discussions
        </h1>
    </div>
    <div class="container bg-light rounded-2">
        <?php

        $sql = "SELECT* FROM threads WHERE thread_cat_id=$thread_id ORDER BY topic_id DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $topic_id = $row['topic_id'];
                $topic_title = $row['topic_title'];
                $topic_description = $row['topic_description'];
                $posted_by = $row['posted_by'];
                $timestamp = $row['timestamp'];
                echo '
                <div class="media my-5">
                        <div class="media-left d-inline">
                            <img class="media-object" src="https://thumbs.dreamstime.com/b/default-avatar-profile-trendy-style-social-media-user-icon-187599373.jpg" width="40" alt="...">
                        </div>
                        <h4 class="media-heading d-inline"> <a href="thread.php?topic_id=' . $topic_id . '"> <strong>' . $topic_title . '</strong></a></h4>
                        <div class="media-body">' . $topic_description . '
                        </div>
                        <div class="container mt-3">
                            posted by <strong> ' . $posted_by . '</strong> at <strong>' . $timestamp . '</strong>
                        </div>
                    </div>
                    <hr>';
            }
        } else {
            echo '<div class="container p-2 my-5">
            <h3 class="text-primary text-center">
                Discussion is Empty
                <br>¯\_(ツ)_/¯
            </h3>
            <hr>
            <p class="text-dark fs-5">
                be the first person to aske a Query
            </p>
            <p class="text-dark fs-5">
                go to help if Are you new here
            </p>
        </div>';
        }
        ?>
    </div>
    <?php
    include 'footer.php';
    mysqli_close($conn);
    ?>
</body>

</html>