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
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $massage = $_POST['massege'];
        $sql = "SELECT*FROM contact WHERE email='$email' OR number=$phone";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>information with same email or number is already exist ,<br>It is due to you Refresh the page After the submitting the Information OR you entered same Information again <br>Please Don`t Refresh the page Again After the submitteng the Information</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        } else {
            $sql1 = "INSERT INTO contact(name,email,number,massege) VALUES('$name','$email',$phone,'$massage')";
            $result1 = mysqli_query($conn, $sql1);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Your information is Saved Successfully ,<br>Don`t Refresh the page </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
    ?>
    <div class="container mt-5 p-2 instructions">
        <h2 class="fs-1 text-center">Read the following instruction carefullly</h2>
        <ul class="fs-3">
            <li>This site is in the form of project</li>
            <li>This site contain the peer-to-peer forms</li>
            <li>Anyone can ask an query and anyone can react on any query</li>
            <li>Follow the following instructions</li>
            <ul>
                <li>No Spam / Advertising / Self-promote in the forums</li>
                <li>Do not post copyright-infringing material</li>
                <li>Do not post “offensive” posts, links </li>
                <li>Do not cross post questions</li>
                <li>Remain respectful of other members at all times</li>
                <li>DO NOT ASK for email addresses or phone numbers</li>
                <li>YOU SHOULD NOT POST :
                    Help me, Hello, Very urgent, I have a question</li>
                <li>Be DESCRIPTIVE and Don’t use “stupid” topic names</li>
                <li>Please use SEARCH first!</li>
                <li>Keep it legal</li>
            </ul>
            <li>To know more about this project fill the given contact form</li>
            <li>Please fill Correct informations in Contact form</li>
            <li>Wrong information Result in unability of Comunication</li>
        </ul>
    </div>

    <div class="contactform">
        <h1 class="formheading">Contact Us</h1>
        <p class="text-center">note: user can fill the form only one time for same number or email.</p>
        <form class="form" action="about.php" method="post">
            <input type="text" name="name" id="name" class="inputtext" placeholder="Enter Name" required>
            <input type="email" name="email" id="email" class="inputtext" placeholder="Enter Email" required>
            <input type="tel" name="phone" id="phone" class="inputtext" placeholder="Enter Number" required>
            <textarea name="massege" id="massage" class="inputtext" placeholder="Enter Massege" required></textarea>
            <input type="submit" class="contactformbutton">
        </form>
    </div>
    <?php
    include 'footer.php';
    mysqli_close($conn);
    ?>
</body>

</html>