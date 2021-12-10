<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
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
    $search = $_GET['search'];
    ?>
    <div class="container bg-light rounded-3 my-2 py-2">
        <h1 class="text-center">
            Search results for "<?php echo $search; ?>"
        </h1>
    </div>

    <div class="container bg-light rounded-2">
        <?php

        $sql = "SELECT * FROM threads WHERE MATCH(topic_title,topic_description) against ('$search')";
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
            echo '<div class="container p-2 my-3">
            <h3 class="text-primary text-center">
                Discussion is Empty , did not match any documents.
                <br><br>¯\_(ツ)_/¯
            </h3>
                Suggestions:
                <ul>
                <li>Make sure that all words are spelled correctly.<li>
                <li>Try different keywords.<li>
                <li>Try more general keywords.<li>
                <li>Try fewer keywords.<li><ul>
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