<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
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
    ?>
    <h1 class="text-center text-light p-3" style="font-size: 50px;">
        Help Section</h1>
    <div class="container bg-light py-2 mb-5">

        <div class="container">
            <ol>
                <li class="fw-bold fs-3">
                    <h3>Flow of Website
                </li>
                </h3>
                <ul>
                    <li class="py-2 fs-4">On homepage There are Discussion <strong>Categories</strong> of topics</li>
                    <li class="py-2 fs-4">After clicking the heading of that topics you will be redirected to an page where all Queries about that topics will be there which are Asked by certain users </li>
                    <li class="py-2 fs-4">On that thread page there is an link of <strong>Referance</strong> Documentation of that Topics</li>
                    <li class="py-2 fs-4">After the Clicking on the heading of that Query you will be redirected to an page where all reaction of users about that Query will be there </li>
                    <li class="py-2 fs-4">On that reaction page there are all the reactions will be display which are done by users </li>
                </ul>
                <li class="fw-bold fs-3 mt-5">
                    <h3> How to Ask an Query Or React on a Query</h3>
                </li>
                <ul>
                    <li class="py-2 fs-4">To ask an Query or React on a Query You have to <strong>LOGIN</strong> first </li>
                    <li class="py-2 fs-4">After login You will be able to React on a query or ask an Query </li>
                    <li class="py-2 fs-4">if you are <b>not</b> logged in then you will never see any type of options of input of Query or Reaction</li>
                    <li class="py-2 fs-4">After login all input option will be visible</li>
                    <li class="py-2 fs-4">hence <br>login -->fill the Query/Reaction Form--. your data will be saved</li>
                </ul>
                <li class="fw-bold fs-3 mt-5">
                    <h3> For further help </h3>
                </li>
                <ul>
                    <li class="py-2 fs-4">For further help please fill the contact to inform the developer in the section of "about" which is on the heading bar of page</li>
                    <li class="py-2 fs-4">Again for any <b> suggestion or Complaint </b> Fill Contact form</li>
                    <li class="py-2 fs-4">To read <b>terms and conditions</b>  Go to about</li>
                </ul>
            </ol>
        </div>
    </div>
    <?php
    include 'footer.php';
    mysqli_close($conn);
    ?>
</body>

</html>