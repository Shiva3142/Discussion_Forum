<?php
if (isset($_SESSION['username'])) {
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid ">
      <a class="navbar-brand fs-1" href="index.php">Integer Pointer Forum</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5" href="help.php">Help</a>
          </li>';
  if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] == "Sksingh") {
      echo '<li class="nav-item">
          <a class="nav-link active fs-5" href="Sk.php">Upload files</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fs-5" href="extract.php">Download files</a>
        </li>
        ';
    }
  }
  echo '
        </ul>
        <form class="d-flex" action="search.php" method="get">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
          <button class="btn btn-success mx-3" type="submit" >Search</button>
        </form>
        <p class="nav-item text-light fs-4 my-auto">Hello ';
  echo $_SESSION["username"];
  echo '</p>
      <button type="button" class="btn btn-primary m-3" onclick="window.location=';
  echo "'";
  echo 'logout.php';
  echo "'";
  echo '">
          Log Out
      </button>
      </div>
    </div>
  </nav>';
} else {
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid ">
      <a class="navbar-brand fs-1" href="index.php">Integer Discussion</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5" href="help.php">Help</a>
          </li>
        </ul>
        <form class="d-flex" action="search.php" method="get">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
          <button class="btn btn-success mx-3" type="submit">Search</button>
        </form>
      <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#loginModal">
          Log In
      </button>
      <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#signupModal">
          Sign Up
      </button>
      </div>
    </div>
  </nav>';
}
if (isset($_SESSION['notlogin'])) {
  if ($_SESSION['notlogin'] == 1) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Invalid credentials </strong> please fill collect Username and Password
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    session_unset();
    session_destroy();
  }
}
if (isset($_SESSION['username'])) {
  if (isset($_SESSION['logincount'])) {
    if ($_SESSION['logincount']++ == 1) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Now are you Logged In Successfully </strong> So you can now Ask and Answer any Question
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
  }
}
if (isset($_SESSION['signupresult'])) {
  if ($_SESSION['signupresult']++ == 1) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Now are you signed In And Logged In  Successfully </strong> So you can now Ask and Answer any Question
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
}
if (isset($_SESSION['nosignup'])) {
  if ($_SESSION['nosignup'] == 1) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Email or Username is already exits </strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    session_unset();
    session_destroy();
  }
}
?>
<style>
  .author {
    position: fixed;
    bottom: 0;
    right: 0px;
    background-color: aqua;
    padding: 5px;
    font-size: 18px;
    z-index: 100;
  }
  @media (max-width:768px) {

    .author {
      position: fixed;
      bottom: 0;
      right: 0px;
      background-color: aqua;
      padding: 5px;
      font-size: 12px;
    }
  }
</style>
<div class="author">Created By : Shivkumar Chauhan</div>