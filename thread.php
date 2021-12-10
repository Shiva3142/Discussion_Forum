<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thread Page Of Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
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
    $topic_id = $_GET['topic_id'];
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $reaction_description = $_POST['reaction_description'];
        $reaction_description = str_replace("<", "&lt;", $reaction_description);
        $reaction_description = str_replace(">", "&gt;", $reaction_description);
        $reaction_description = str_replace("'", "&apos;", $reaction_description);
        $reaction_description = str_replace('"', "&quot;", $reaction_description);
        $reaction_description = str_replace("\n", "<br>", $reaction_description);
        $posted_by = $_SESSION['username'];
        $sql = "SELECT*FROM thread WHERE discussion='$reaction_description' AND posted_by='$posted_by'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Are you trying to save duplicate reaction ,<br>It is due to you Refresh the page After the submitting the Reaction OR you entered same Reaction again <br>Please Don`t Refresh the page Again After the submitteng the Reaction</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        } else {
            $sql1 = "INSERT INTO thread(discussion,posted_by,topic_id) VALUES('$reaction_description','$posted_by','$topic_id')";
            $result1 = mysqli_query($conn, $sql1);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Your reaction is Saved Successfully ,<br>Don`t Refresh the page </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
    ?>
    <?php
    $sql = "SELECT*FROM threads WHERE topic_id=$topic_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $topic_title = $row['topic_title'];
    $topic_description = $row['topic_description'];
    $posted_by = $row['posted_by'];
    $timestamp = $row['timestamp'];
    echo '<div class="container my-5">
        <div class="card cardhead">
            <div class="card-header fs-3 cardheader">
            <b>
                ' . $topic_title . '</b>
            </div>
            <div class="card-body">
                <h5 class="card-title mb-3 fs-5 postedby">posted by <b>' . $posted_by . ' </b>at ' . $timestamp . '</h5><hr>
                <p class="card-text fs-4">' . $topic_description . '</p>
            </div>
        </div>
    </div>';
    ?>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<div class="container border border-dark p-2 my-5 col-md-5">
        <h2 class="text-center">React on a Query</h2>
        <form action="';
        echo $_SERVER['REQUEST_URI'];
        echo '" method="post">
            <label class="form-control mb-2 bg-info" for="reaction_description">Enter Your Description</label>
            <textarea class="form-control mb-2" type="text" name="reaction_description" id="reaction_description" required></textarea>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>

    </div>
    ';
    }
    ?>
    <div class="container mt-5">
        <h1 class="fs-2 border border-dark text-center bg-secondary">
            Reactions on Query
        </h1>
    </div>
    <div class="container bg-light rounded-2">
        <?php
        $sql = "SELECT*FROM thread WHERE topic_id=$topic_id ORDER BY discussion_id DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $discussion = $row['discussion'];
                $posted_by = $row['posted_by'];
                $timestamp = $row['timestamp'];
                echo '<div class="media my-5">
            <div class="media-left d-inline">
                <img class="media-object" src="https://thumbs.dreamstime.com/b/default-avatar-profile-trendy-style-social-media-user-icon-187599373.jpg" width="40" alt="...">
            </div>
            <h4 class="media-heading d-inline"> posted by <strong> ' . $posted_by . '</strong> at <strong>' . $timestamp . '</strong></h4>
            <div class="media-body fs-5">   ' . $discussion . '
            </div>
        </div>
        <hr>';
            }
        } else {
            echo '<div class="container p-2 my-5">
        <h3 class="text-primary text-center">
            None of the Reactions are found
            <br>¯\_(ツ)_/¯
        </h3>
        <hr>
        <p class="text-dark fs-5">
            be the first person to React on this Query
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